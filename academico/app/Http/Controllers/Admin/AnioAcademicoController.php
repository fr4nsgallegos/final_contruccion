<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnioAcademico\BulkDestroyAnioAcademico;
use App\Http\Requests\Admin\AnioAcademico\DestroyAnioAcademico;
use App\Http\Requests\Admin\AnioAcademico\IndexAnioAcademico;
use App\Http\Requests\Admin\AnioAcademico\StoreAnioAcademico;
use App\Http\Requests\Admin\AnioAcademico\UpdateAnioAcademico;
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

class AnioAcademicoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAnioAcademico $request
     * @return array|Factory|View
     */
    public function index(IndexAnioAcademico $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(AnioAcademico::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'orden'],

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

        return view('admin.anio-academico.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.anio-academico.create');

        return view('admin.anio-academico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAnioAcademico $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAnioAcademico $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the AnioAcademico
        $anioAcademico = AnioAcademico::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/anio-academicos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/anio-academicos');
    }

    /**
     * Display the specified resource.
     *
     * @param AnioAcademico $anioAcademico
     * @throws AuthorizationException
     * @return void
     */
    public function show(AnioAcademico $anioAcademico)
    {
        $this->authorize('admin.anio-academico.show', $anioAcademico);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AnioAcademico $anioAcademico
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(AnioAcademico $anioAcademico)
    {
        $this->authorize('admin.anio-academico.edit', $anioAcademico);


        return view('admin.anio-academico.edit', [
            'anioAcademico' => $anioAcademico,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAnioAcademico $request
     * @param AnioAcademico $anioAcademico
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAnioAcademico $request, AnioAcademico $anioAcademico)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values AnioAcademico
        $anioAcademico->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/anio-academicos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/anio-academicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAnioAcademico $request
     * @param AnioAcademico $anioAcademico
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAnioAcademico $request, AnioAcademico $anioAcademico)
    {
        $anioAcademico->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAnioAcademico $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAnioAcademico $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    AnioAcademico::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
