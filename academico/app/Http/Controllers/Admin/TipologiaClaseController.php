<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TipologiaClase\BulkDestroyTipologiaClase;
use App\Http\Requests\Admin\TipologiaClase\DestroyTipologiaClase;
use App\Http\Requests\Admin\TipologiaClase\IndexTipologiaClase;
use App\Http\Requests\Admin\TipologiaClase\StoreTipologiaClase;
use App\Http\Requests\Admin\TipologiaClase\UpdateTipologiaClase;
use App\Models\TipologiaClase;
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

class TipologiaClaseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTipologiaClase $request
     * @return array|Factory|View
     */
    public function index(IndexTipologiaClase $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TipologiaClase::class)->processRequestAndGet(
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

        return view('admin.tipologia-clase.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tipologia-clase.create');

        return view('admin.tipologia-clase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTipologiaClase $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTipologiaClase $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TipologiaClase
        $tipologiaClase = TipologiaClase::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tipologia-clases'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tipologia-clases');
    }

    /**
     * Display the specified resource.
     *
     * @param TipologiaClase $tipologiaClase
     * @throws AuthorizationException
     * @return void
     */
    public function show(TipologiaClase $tipologiaClase)
    {
        $this->authorize('admin.tipologia-clase.show', $tipologiaClase);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TipologiaClase $tipologiaClase
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TipologiaClase $tipologiaClase)
    {
        $this->authorize('admin.tipologia-clase.edit', $tipologiaClase);


        return view('admin.tipologia-clase.edit', [
            'tipologiaClase' => $tipologiaClase,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTipologiaClase $request
     * @param TipologiaClase $tipologiaClase
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTipologiaClase $request, TipologiaClase $tipologiaClase)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TipologiaClase
        $tipologiaClase->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tipologia-clases'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tipologia-clases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTipologiaClase $request
     * @param TipologiaClase $tipologiaClase
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTipologiaClase $request, TipologiaClase $tipologiaClase)
    {
        $tipologiaClase->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTipologiaClase $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTipologiaClase $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TipologiaClase::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
