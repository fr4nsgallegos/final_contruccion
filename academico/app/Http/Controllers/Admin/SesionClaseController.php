<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SesionClase\BulkDestroySesionClase;
use App\Http\Requests\Admin\SesionClase\DestroySesionClase;
use App\Http\Requests\Admin\SesionClase\IndexSesionClase;
use App\Http\Requests\Admin\SesionClase\StoreSesionClase;
use App\Http\Requests\Admin\SesionClase\UpdateSesionClase;
use App\Models\SesionClase;
use App\Models\Local;
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

class SesionClaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSesionClase $request
     * @return array|Factory|View
     */
    public function index(IndexSesionClase $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SesionClase::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'sigla', 'local_id'],

            // set columns to searchIn
            ['id', 'nombre', 'sigla']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        $locals = Local:: all();
        return view('admin.sesion-clase.index', ['data' => $data])
        ->with(compact('locals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.sesion-clase.create');
        $locals = Local:: all();
        return view('admin.sesion-clase.create')
        ->with(compact('locals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSesionClase $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSesionClase $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SesionClase
        $sesionClase = SesionClase::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sesion-clases'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sesion-clases');
    }

    /**
     * Display the specified resource.
     *
     * @param SesionClase $sesionClase
     * @throws AuthorizationException
     * @return void
     */
    public function show(SesionClase $sesionClase)
    {
        $this->authorize('admin.sesion-clase.show', $sesionClase);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SesionClase $sesionClase
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SesionClase $sesionClase)
    {
        $this->authorize('admin.sesion-clase.edit', $sesionClase);

        $locals = Local:: all();
        return view('admin.sesion-clase.edit', [
            'sesionClase' => $sesionClase,
        ])
        ->with(compact('locals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSesionClase $request
     * @param SesionClase $sesionClase
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSesionClase $request, SesionClase $sesionClase)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SesionClase
        $sesionClase->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sesion-clases'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sesion-clases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySesionClase $request
     * @param SesionClase $sesionClase
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySesionClase $request, SesionClase $sesionClase)
    {
        $sesionClase->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySesionClase $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySesionClase $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SesionClase::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
