<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profesor\BulkDestroyProfesor;
use App\Http\Requests\Admin\Profesor\DestroyProfesor;
use App\Http\Requests\Admin\Profesor\IndexProfesor;
use App\Http\Requests\Admin\Profesor\StoreProfesor;
use App\Http\Requests\Admin\Profesor\UpdateProfesor;
use App\Models\Profesor;
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

class ProfesorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProfesor $request
     * @return array|Factory|View
     */
    public function index(IndexProfesor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Profesor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'apellido', 'dni', 'usuario', 'email'],

            // set columns to searchIn
            ['id', 'nombre', 'apellido', 'dni', 'usuario', 'email']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.profesor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.profesor.create');

        return view('admin.profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProfesor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProfesor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Profesor
        $profesor = Profesor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/profesors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/profesors');
    }

    /**
     * Display the specified resource.
     *
     * @param Profesor $profesor
     * @throws AuthorizationException
     * @return void
     */
    public function show(Profesor $profesor)
    {
        $this->authorize('admin.profesor.show', $profesor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Profesor $profesor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Profesor $profesor)
    {
        $this->authorize('admin.profesor.edit', $profesor);


        return view('admin.profesor.edit', [
            'profesor' => $profesor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfesor $request
     * @param Profesor $profesor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProfesor $request, Profesor $profesor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Profesor
        $profesor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/profesors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/profesors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProfesor $request
     * @param Profesor $profesor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProfesor $request, Profesor $profesor)
    {
        $profesor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProfesor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProfesor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Profesor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
