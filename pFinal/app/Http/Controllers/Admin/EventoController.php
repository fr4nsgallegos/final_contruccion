<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Evento\BulkDestroyEvento;
use App\Http\Requests\Admin\Evento\DestroyEvento;
use App\Http\Requests\Admin\Evento\IndexEvento;
use App\Http\Requests\Admin\Evento\StoreEvento;
use App\Http\Requests\Admin\Evento\UpdateEvento;
use App\Models\Evento;
use App\Models\Local;
use App\Models\MallaProfesor;
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
use PDF;
class EventoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEvento $request
     * @return array|Factory|View
     */
    public function index(IndexEvento $request)
    {
        // create and AdminListing instance for a specific model and
        /*$data = AdminListing::create(Evento::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'descripcion', 'start', 'end', 'malla_profesor_id', 'local_id'],

            // set columns to searchIn
            ['id', 'title', 'descripcion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.evento.index', ['data' => $data]);*/

        $locals=Local::all();
        $malla_profesores=MallaProfesor::all();
        return view('admin.evento.index')
        ->with(compact('locals'))
        ->with(compact('malla_profesores'));
    }

        public function pdf()
    {
        $eventos=Evento::paginate();
        //$eventos= Evento::all();

        $pdf = PDF::loadView('admin.evento.pdf',['eventos'=>$eventos]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        $locals=Local::all();
        $malla_profesores=MallaProfesor::all();
        return view('admin.evento.pdf')
        ->with(compact('locals'))
        ->with(compact('malla_profesores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.evento.create');

        return view('admin.evento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEvento $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEvento $request)
    {
        //$locals = Local:: all();
        $evento = Evento::create($request->all());

        //->with(compact('locals'));
    }

    /**
     * Display the specified resource.
     *
     * @param Evento $evento
     * @throws AuthorizationException
     * @return void
     */
    public function show(Evento $evento)
    {
        $evento= Evento::all();
        
        //$evento->start = Carbon::createFromFormat('Y-m-d H:i:s', $event->start)->format('Y-m-d');
        //$evento->end = Carbon::createFromFormat('Y-m-d H:i:s', $event->end)->format('Y-m-d');
        return response()-> json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Evento $evento
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit($id)
    {
        $evento=Evento::find($id);
        //$evento->start = Carbon::createFromFormat('Y-m-d H:i:s', $event->start)->format('Y-m-d H:i:s');
        //$evento->end = Carbon::createFromFormat('Y-m-d H:i:s', $event->end)->format('Y-m-d H:i:s');
        return response()-> json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEvento $request
     * @param Evento $evento
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEvento $request, Evento $evento)
    {
        $evento->update($request->all());
        /*if($request->start !== null){
            $evento->start= $request->start;}
        if($request->end !== null){
            $evento->end= $request->end;}*/

        return response()-> json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEvento $request
     * @param Evento $evento
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy($id)
    {
        $evento=Evento::find($id)->delete();
        return response()-> json($evento);
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEvento $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEvento $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Evento::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
