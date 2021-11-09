<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MallaAcademica\BulkDestroyMallaAcademica;
use App\Http\Requests\Admin\MallaAcademica\DestroyMallaAcademica;
use App\Http\Requests\Admin\MallaAcademica\IndexMallaAcademica;
use App\Http\Requests\Admin\MallaAcademica\StoreMallaAcademica;
use App\Http\Requests\Admin\MallaAcademica\UpdateMallaAcademica;
use App\Models\MallaAcademica;
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

class MallaAcademicaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMallaAcademica $request
     * @return array|Factory|View
     */
    public function index(IndexMallaAcademica $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MallaAcademica::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'anio_creacion', 'cantidad_anios', 'cantidad_semestre'],

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

        return view('admin.malla-academica.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.malla-academica.create');

        return view('admin.malla-academica.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMallaAcademica $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMallaAcademica $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MallaAcademica
        $mallaAcademica = MallaAcademica::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/malla-academicas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/malla-academicas');
    }

    /**
     * Display the specified resource.
     *
     * @param MallaAcademica $mallaAcademica
     * @throws AuthorizationException
     * @return void
     */
    public function show(MallaAcademica $mallaAcademica)
    {
        $this->authorize('admin.malla-academica.show', $mallaAcademica);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MallaAcademica $mallaAcademica
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MallaAcademica $mallaAcademica)
    {
        $this->authorize('admin.malla-academica.edit', $mallaAcademica);


        return view('admin.malla-academica.edit', [
            'mallaAcademica' => $mallaAcademica,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMallaAcademica $request
     * @param MallaAcademica $mallaAcademica
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMallaAcademica $request, MallaAcademica $mallaAcademica)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MallaAcademica
        $mallaAcademica->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/malla-academicas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/malla-academicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMallaAcademica $request
     * @param MallaAcademica $mallaAcademica
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMallaAcademica $request, MallaAcademica $mallaAcademica)
    {
        $mallaAcademica->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMallaAcademica $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMallaAcademica $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MallaAcademica::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
