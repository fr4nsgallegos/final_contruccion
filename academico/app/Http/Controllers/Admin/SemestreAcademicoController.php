<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SemestreAcademico\BulkDestroySemestreAcademico;
use App\Http\Requests\Admin\SemestreAcademico\DestroySemestreAcademico;
use App\Http\Requests\Admin\SemestreAcademico\IndexSemestreAcademico;
use App\Http\Requests\Admin\SemestreAcademico\StoreSemestreAcademico;
use App\Http\Requests\Admin\SemestreAcademico\UpdateSemestreAcademico;
use App\Models\SemestreAcademico;
use App\Models\SesionClase;
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

class SemestreAcademicoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSemestreAcademico $request
     * @return array|Factory|View
     */
    public function index(IndexSemestreAcademico $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SemestreAcademico::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'orden', 'sesion_clase_id'],

            // set columns to searchIn
            ['id', 'nombre', 'orden']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.semestre-academico.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.semestre-academico.create');
        $sesiones = SesionClase:: all();
        return view('admin.semestre-academico.create', compact('sesiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSemestreAcademico $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSemestreAcademico $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SemestreAcademico
        $semestreAcademico = SemestreAcademico::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/semestre-academicos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/semestre-academicos');
    }

    /**
     * Display the specified resource.
     *
     * @param SemestreAcademico $semestreAcademico
     * @throws AuthorizationException
     * @return void
     */
    public function show(SemestreAcademico $semestreAcademico)
    {
        $this->authorize('admin.semestre-academico.show', $semestreAcademico);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SemestreAcademico $semestreAcademico
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SemestreAcademico $semestreAcademico)
    {
        $this->authorize('admin.semestre-academico.edit', $semestreAcademico);

        $sesiones = SesionClase:: all();
        return view('admin.semestre-academico.edit', [
            'semestreAcademico' => $semestreAcademico,
        ], compact('sesiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSemestreAcademico $request
     * @param SemestreAcademico $semestreAcademico
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSemestreAcademico $request, SemestreAcademico $semestreAcademico)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SemestreAcademico
        $semestreAcademico->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/semestre-academicos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/semestre-academicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySemestreAcademico $request
     * @param SemestreAcademico $semestreAcademico
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySemestreAcademico $request, SemestreAcademico $semestreAcademico)
    {
        $semestreAcademico->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySemestreAcademico $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySemestreAcademico $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SemestreAcademico::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
