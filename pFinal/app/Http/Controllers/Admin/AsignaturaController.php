<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Asignatura\BulkDestroyAsignatura;
use App\Http\Requests\Admin\Asignatura\DestroyAsignatura;
use App\Http\Requests\Admin\Asignatura\IndexAsignatura;
use App\Http\Requests\Admin\Asignatura\StoreAsignatura;
use App\Http\Requests\Admin\Asignatura\UpdateAsignatura;
use App\Models\Asignatura;
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

class AsignaturaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAsignatura $request
     * @return array|Factory|View
     */
    public function index(IndexAsignatura $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Asignatura::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre_asignatura', 'sigla'],

            // set columns to searchIn
            ['id', 'nombre_asignatura', 'sigla']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.asignatura.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.asignatura.create');

        return view('admin.asignatura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAsignatura $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAsignatura $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Asignatura
        $asignatura = Asignatura::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/asignaturas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/asignaturas');
    }

    /**
     * Display the specified resource.
     *
     * @param Asignatura $asignatura
     * @throws AuthorizationException
     * @return void
     */
    public function show(Asignatura $asignatura)
    {
        $this->authorize('admin.asignatura.show', $asignatura);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Asignatura $asignatura
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Asignatura $asignatura)
    {
        $this->authorize('admin.asignatura.edit', $asignatura);


        return view('admin.asignatura.edit', [
            'asignatura' => $asignatura,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAsignatura $request
     * @param Asignatura $asignatura
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAsignatura $request, Asignatura $asignatura)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Asignatura
        $asignatura->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/asignaturas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/asignaturas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAsignatura $request
     * @param Asignatura $asignatura
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAsignatura $request, Asignatura $asignatura)
    {
        $asignatura->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAsignatura $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAsignatura $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Asignatura::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
