<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MallaCurso\BulkDestroyMallaCurso;
use App\Http\Requests\Admin\MallaCurso\DestroyMallaCurso;
use App\Http\Requests\Admin\MallaCurso\IndexMallaCurso;
use App\Http\Requests\Admin\MallaCurso\StoreMallaCurso;
use App\Http\Requests\Admin\MallaCurso\UpdateMallaCurso;
use App\Models\MallaCurso;
use App\Models\MallaAcademica;
use App\Models\Asignatura;
use App\Models\TipologiaClase;
use App\Models\SemestreAcademico;
use App\Models\AnioAcademico;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MallaCursoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMallaCurso $request
     * @return array|Factory|View
     */
    public function index(IndexMallaCurso $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MallaCurso::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'cantidad_horas_tipologia', 'cantidad_credito', 'malla_academica_id', 'asignatura_id', 'tipologia_clase_id', 'semestre_academico_id', 'anio_academico_id', 'malla_academica.nombre_malla_academica',  'asignatura.nombre_asignatura', 'tipologia_clase.nombre_tipologia', 'semestre_academico.nombre_semestre', 'anio_academico.nombre_anio_academico'],

            // set columns to searchIn
            ['id', 'malla_academica.nombre_malla_academica',  'asignatura.nombre_asignatura', 'tipologia_clase.nombre_tipologia', 'semestre_academico.nombre_semestre', 'anio_academico.nombre_anio_academico'],

            function ($query) use ($request) {
                $query->with(['malla_academica', 'asignatura', 'tipologia_clase', 'semestre_academico', 'anio_academico']);

                // add this line if you want to search by malla_academica attributes
                $query->join('malla_academica', 'malla_academica.id', '=', 'malla_curso.malla_academica_id');

                // add this line if you want to search by asignatura attributes
                $query->join('asignatura', 'asignatura.id', '=', 'malla_curso.asignatura_id');

                // add this line if you want to search by tipologia_clase attributes
                $query->join('tipologia_clase', 'tipologia_clase.id', '=', 'malla_curso.tipologia_clase_id');

                // add this line if you want to search by semestre attributes
                $query->join('semestre_academico', 'semestre_academico.id', '=', 'malla_curso.semestre_academico_id');

                // add this line if you want to search by año attributes
                $query->join('anio_academico', 'anio_academico.id', '=', 'malla_curso.anio_academico_id');

                if($request->has('malla_curso')){
                    $query->whereIn('malla_curso_id', $request->get('malla_curso'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.malla-curso.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.malla-curso.create');
        $malla_academicas = MallaAcademica:: all();
        $asignaturas = Asignatura:: all();
        $tipologias = TipologiaClase:: all();
        $semestres = SemestreAcademico:: all();
        $anios = AnioAcademico:: all();
        return view('admin.malla-curso.create')
        ->with(compact('malla_academicas'))
        ->with(compact('asignaturas'))
        ->with(compact('tipologias'))
        ->with(compact('semestres'))
        ->with(compact('anios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMallaCurso $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMallaCurso $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MallaCurso
        $mallaCurso = MallaCurso::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/malla-cursos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/malla-cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param MallaCurso $mallaCurso
     * @throws AuthorizationException
     * @return void
     */
    public function show(MallaCurso $mallaCurso)
    {
        $this->authorize('admin.malla-curso.show', $mallaCurso);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MallaCurso $mallaCurso
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MallaCurso $mallaCurso)
    {
        $this->authorize('admin.malla-curso.edit', $mallaCurso);

        $malla_academicas = MallaAcademica:: all();
        $asignaturas = Asignatura:: all();
        $tipologias = TipologiaClase:: all();
        $semestres = SemestreAcademico:: all();
        $anios = AnioAcademico:: all();
        return view('admin.malla-curso.edit', [
            'mallaCurso' => $mallaCurso,
        ])
        ->with(compact('malla_academicas'))
        ->with(compact('asignaturas'))
        ->with(compact('tipologias'))
        ->with(compact('semestres'))
        ->with(compact('anios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMallaCurso $request
     * @param MallaCurso $mallaCurso
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMallaCurso $request, MallaCurso $mallaCurso)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MallaCurso
        $mallaCurso->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/malla-cursos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/malla-cursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMallaCurso $request
     * @param MallaCurso $mallaCurso
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMallaCurso $request, MallaCurso $mallaCurso)
    {
        $mallaCurso->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMallaCurso $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMallaCurso $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MallaCurso::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
