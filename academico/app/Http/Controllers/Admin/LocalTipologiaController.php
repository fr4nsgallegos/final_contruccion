<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocalTipologium\BulkDestroyLocalTipologium;
use App\Http\Requests\Admin\LocalTipologium\DestroyLocalTipologium;
use App\Http\Requests\Admin\LocalTipologium\IndexLocalTipologium;
use App\Http\Requests\Admin\LocalTipologium\StoreLocalTipologium;
use App\Http\Requests\Admin\LocalTipologium\UpdateLocalTipologium;
use App\Models\LocalTipologium;
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

class LocalTipologiaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLocalTipologium $request
     * @return array|Factory|View
     */
    public function index(IndexLocalTipologium $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(LocalTipologium::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'local_id', 'tipologia_clase_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.local-tipologium.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.local-tipologium.create');
        $sesiones = SesionClase:: all();
        $locals = Local:: all();
        return view('admin.local-tipologium.create', compact('sesiones'), compact('locals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLocalTipologium $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLocalTipologium $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the LocalTipologium
        $localTipologium = LocalTipologium::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/local-tipologia'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/local-tipologia');
    }

    /**
     * Display the specified resource.
     *
     * @param LocalTipologium $localTipologium
     * @throws AuthorizationException
     * @return void
     */
    public function show(LocalTipologium $localTipologium)
    {
        $this->authorize('admin.local-tipologium.show', $localTipologium);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LocalTipologium $localTipologium
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(LocalTipologium $localTipologium)
    {
        $this->authorize('admin.local-tipologium.edit', $localTipologium);

        $sesiones = SesionClase:: all();
        $locals = Local:: all();
        return view('admin.local-tipologium.edit', [
            'localTipologium' => $localTipologium,
        ], compact('sesiones'), compact('locals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLocalTipologium $request
     * @param LocalTipologium $localTipologium
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLocalTipologium $request, LocalTipologium $localTipologium)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values LocalTipologium
        $localTipologium->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/local-tipologia'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/local-tipologia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLocalTipologium $request
     * @param LocalTipologium $localTipologium
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLocalTipologium $request, LocalTipologium $localTipologium)
    {
        $localTipologium->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLocalTipologium $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLocalTipologium $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    LocalTipologium::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
