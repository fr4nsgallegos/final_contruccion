<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Turno\BulkDestroyTurno;
use App\Http\Requests\Admin\Turno\DestroyTurno;
use App\Http\Requests\Admin\Turno\IndexTurno;
use App\Http\Requests\Admin\Turno\StoreTurno;
use App\Http\Requests\Admin\Turno\UpdateTurno;
use App\Models\Turno;
use App\Models\SesionClase;
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

class TurnoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTurno $request
     * @return array|Factory|View
     */
    public function index(IndexTurno $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Turno::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'sigla', 'orden', 'hora_inicio', 'hora_fin', 'sesion_clase_id'],

            // set columns to searchIn
            ['id', 'nombre', 'sigla', 'orden']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.turno.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.turno.create');
        $sesiones = SesionClase:: all();
        return view('admin.turno.create')
        ->with(compact('sesiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTurno $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTurno $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Turno
        $turno = Turno::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/turnos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/turnos');
    }

    /**
     * Display the specified resource.
     *
     * @param Turno $turno
     * @throws AuthorizationException
     * @return void
     */
    public function show(Turno $turno)
    {
        $this->authorize('admin.turno.show', $turno);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Turno $turno
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Turno $turno)
    {
        $this->authorize('admin.turno.edit', $turno);

        $sesiones = SesionClase:: all();
        return view('admin.turno.edit', [
            'turno' => $turno,
        ])
        ->with(compact('sesiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTurno $request
     * @param Turno $turno
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTurno $request, Turno $turno)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Turno
        $turno->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/turnos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/turnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTurno $request
     * @param Turno $turno
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTurno $request, Turno $turno)
    {
        $turno->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTurno $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTurno $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Turno::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
