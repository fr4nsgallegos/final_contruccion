<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CursoAcademico\BulkDestroyCursoAcademico;
use App\Http\Requests\Admin\CursoAcademico\DestroyCursoAcademico;
use App\Http\Requests\Admin\CursoAcademico\IndexCursoAcademico;
use App\Http\Requests\Admin\CursoAcademico\StoreCursoAcademico;
use App\Http\Requests\Admin\CursoAcademico\UpdateCursoAcademico;
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

class CursoAcademicoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCursoAcademico $request
     * @return array|Factory|View
     */
    public function index(IndexCursoAcademico $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CursoAcademico::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre'],

            // set columns to searchIn
            ['id', 'nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.curso-academico.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.curso-academico.create');

        return view('admin.curso-academico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCursoAcademico $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCursoAcademico $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CursoAcademico
        $cursoAcademico = CursoAcademico::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/curso-academicos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/curso-academicos');
    }

    /**
     * Display the specified resource.
     *
     * @param CursoAcademico $cursoAcademico
     * @throws AuthorizationException
     * @return void
     */
    public function show(CursoAcademico $cursoAcademico)
    {
        $this->authorize('admin.curso-academico.show', $cursoAcademico);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CursoAcademico $cursoAcademico
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CursoAcademico $cursoAcademico)
    {
        $this->authorize('admin.curso-academico.edit', $cursoAcademico);


        return view('admin.curso-academico.edit', [
            'cursoAcademico' => $cursoAcademico,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCursoAcademico $request
     * @param CursoAcademico $cursoAcademico
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCursoAcademico $request, CursoAcademico $cursoAcademico)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CursoAcademico
        $cursoAcademico->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/curso-academicos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/curso-academicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCursoAcademico $request
     * @param CursoAcademico $cursoAcademico
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCursoAcademico $request, CursoAcademico $cursoAcademico)
    {
        $cursoAcademico->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCursoAcademico $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCursoAcademico $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CursoAcademico::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
