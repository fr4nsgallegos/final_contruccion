<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Local\BulkDestroyLocal;
use App\Http\Requests\Admin\Local\DestroyLocal;
use App\Http\Requests\Admin\Local\IndexLocal;
use App\Http\Requests\Admin\Local\StoreLocal;
use App\Http\Requests\Admin\Local\UpdateLocal;
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

class LocalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLocal $request
     * @return array|Factory|View
     */
    public function index(IndexLocal $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Local::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre_local', 'sigla', 'tipo_local'],

            // set columns to searchIn
            ['id', 'nombre_local', 'sigla', 'tipo_local']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.local.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.local.create');

        return view('admin.local.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLocal $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLocal $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Local
        $local = Local::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/locals'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/locals');
    }

    /**
     * Display the specified resource.
     *
     * @param Local $local
     * @throws AuthorizationException
     * @return void
     */
    public function show(Local $local)
    {
        $this->authorize('admin.local.show', $local);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Local $local
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Local $local)
    {
        $this->authorize('admin.local.edit', $local);


        return view('admin.local.edit', [
            'local' => $local,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLocal $request
     * @param Local $local
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLocal $request, Local $local)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Local
        $local->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/locals'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/locals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLocal $request
     * @param Local $local
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLocal $request, Local $local)
    {
        $local->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLocal $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLocal $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Local::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
