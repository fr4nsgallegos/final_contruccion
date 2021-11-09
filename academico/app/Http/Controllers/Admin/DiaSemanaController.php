<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiaSemana\BulkDestroyDiaSemana;
use App\Http\Requests\Admin\DiaSemana\DestroyDiaSemana;
use App\Http\Requests\Admin\DiaSemana\IndexDiaSemana;
use App\Http\Requests\Admin\DiaSemana\StoreDiaSemana;
use App\Http\Requests\Admin\DiaSemana\UpdateDiaSemana;
use App\Models\DiaSemana;
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

class DiaSemanaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDiaSemana $request
     * @return array|Factory|View
     */
    public function index(IndexDiaSemana $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(DiaSemana::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'orden', 'sigla'],

            // set columns to searchIn
            ['id', 'nombre', 'orden', 'sigla']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.dia-semana.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.dia-semana.create');

        return view('admin.dia-semana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDiaSemana $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDiaSemana $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the DiaSemana
        $diaSemana = DiaSemana::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/dia-semanas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/dia-semanas');
    }

    /**
     * Display the specified resource.
     *
     * @param DiaSemana $diaSemana
     * @throws AuthorizationException
     * @return void
     */
    public function show(DiaSemana $diaSemana)
    {
        $this->authorize('admin.dia-semana.show', $diaSemana);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DiaSemana $diaSemana
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(DiaSemana $diaSemana)
    {
        $this->authorize('admin.dia-semana.edit', $diaSemana);


        return view('admin.dia-semana.edit', [
            'diaSemana' => $diaSemana,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDiaSemana $request
     * @param DiaSemana $diaSemana
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDiaSemana $request, DiaSemana $diaSemana)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values DiaSemana
        $diaSemana->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/dia-semanas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/dia-semanas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDiaSemana $request
     * @param DiaSemana $diaSemana
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDiaSemana $request, DiaSemana $diaSemana)
    {
        $diaSemana->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDiaSemana $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDiaSemana $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DiaSemana::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
