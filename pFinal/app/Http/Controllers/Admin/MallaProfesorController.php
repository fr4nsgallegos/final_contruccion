<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MallaProfesor\BulkDestroyMallaProfesor;
use App\Http\Requests\Admin\MallaProfesor\DestroyMallaProfesor;
use App\Http\Requests\Admin\MallaProfesor\IndexMallaProfesor;
use App\Http\Requests\Admin\MallaProfesor\StoreMallaProfesor;
use App\Http\Requests\Admin\MallaProfesor\UpdateMallaProfesor;
use App\Models\MallaProfesor;
use App\Models\MallaCurso;
use App\Models\AdminUser;
use App\Models\CursoAcademico;
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

class MallaProfesorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMallaProfesor $request
     * @return array|Factory|View
     */
    public function index(IndexMallaProfesor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MallaProfesor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'admin_users_id', 'curso_academico_id', 'malla_curso_id', 'admin_users.first_name', 'curso_academico.nombre_curso_academico', 'malla_curso.malla_academica_id'],

            // set columns to searchIn
            ['id', 'admin_users.first_name', 'curso_academico.nombre_curso_academico', 'malla_curso.malla_academica_id'],
            function ($query) use ($request) {
                $query->with(['admin_users', 'curso_academico', 'malla_curso', 'asignatura']);

                // add this line if you want to search by admin_users attributes
                $query->join('admin_users', 'admin_users.id', '=', 'malla_profesor.admin_users_id');

                // add this line if you want to search by curso_academico attributes
                $query->join('curso_academico', 'curso_academico.id', '=', 'malla_profesor.curso_academico_id');

                // add this line if you want to search by malla_curso attributes
                $query->join('malla_curso', 'malla_curso.id', '=', 'malla_profesor.malla_curso_id')
                        ->join('asignatura', 'asignatura.id', '=', 'malla_curso.asignatura_id')
                        ;

                if($request->has('malla_profesor')){
                    $query->whereIn('malla_profesor_id', $request->get('malla_profesor'));
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

        return view('admin.malla-profesor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.malla-profesor.create');
        $admins = AdminUser:: all();
        $cursos = CursoAcademico:: all();
        $malla_cursos = MallaCurso:: all();
        return view('admin.malla-profesor.create')
        ->with(compact('admins'))
        ->with(compact('cursos'))
        ->with(compact('malla_cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMallaProfesor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMallaProfesor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MallaProfesor
        $mallaProfesor = MallaProfesor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/malla-profesors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/malla-profesors');
    }

    /**
     * Display the specified resource.
     *
     * @param MallaProfesor $mallaProfesor
     * @throws AuthorizationException
     * @return void
     */
    public function show(MallaProfesor $mallaProfesor)
    {
        $this->authorize('admin.malla-profesor.show', $mallaProfesor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MallaProfesor $mallaProfesor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MallaProfesor $mallaProfesor)
    {
        $this->authorize('admin.malla-profesor.edit', $mallaProfesor);

        $admins = AdminUser:: all();
        $cursos = CursoAcademico:: all();
        $malla_cursos = MallaCurso:: all();
        return view('admin.malla-profesor.edit', [
            'mallaProfesor' => $mallaProfesor,
        ])
        ->with(compact('admins'))
        ->with(compact('cursos'))
        ->with(compact('malla_cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMallaProfesor $request
     * @param MallaProfesor $mallaProfesor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMallaProfesor $request, MallaProfesor $mallaProfesor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MallaProfesor
        $mallaProfesor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/malla-profesors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/malla-profesors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMallaProfesor $request
     * @param MallaProfesor $mallaProfesor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMallaProfesor $request, MallaProfesor $mallaProfesor)
    {
        $mallaProfesor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMallaProfesor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMallaProfesor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MallaProfesor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
