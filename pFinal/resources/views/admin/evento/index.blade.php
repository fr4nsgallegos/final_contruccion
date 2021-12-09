@extends('admin.layout.app')

@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.evento.actions.index'))
  

@section('body')

    <!--<nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand"></a>
        <form class="d-flex">
          <a href="{{ url('admin/eventos/pdf') }}" class="btn btn-primary btn-sm">PDF</a>
        </form>
      </div>
    </nav>-->
        <div class="container">
            <div id="agenda">
            </div>
        </div>
    
        <!-- Button trigger modal -->
        <!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
          Launch
        </button>-->
        
        <!-- Modal -->
        <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Horario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="">
                            {!! csrf_field()  !!}
                            <div class="form-group">
                              <label for="id">ID</label>
                              <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Escribir un ID" disabled>
                            </div>
                            <div class="form-group">
                              <label for="title">Título</label>
                              <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribir un título">
                            </div>
                            <div class="form-group">
                              <label for="descripcion">Descripción</label>
                              <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Escribir una descripción">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <label for="start">Hora de Inicio</label>
                                <input type="datetime-local" value="2021-12-09T10:00:00" step="1" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="Escribir una hora de Inicio" validate="'required|date_format:HH:mm:ss'">
                                </div>
                                
                                <div class="col-md-6">
                                <label for="end">Hora de Fin</label>
                                <input type="datetime-local" value="2021-12-09T12:00:00" step="1" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="Escribir una hora de Fin" v-validate="'required|date_format:HH:mm:ss'">
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="malla_profesor_id">Asignatura</label>
                                <!--Select -->
                                <select class="form-control" name="malla_profesor_id" id="malla_profesor_id" aria-describedby="helpId" placeholder="Escribir un local">

                                    @foreach ($malla_profesores as $malla_profesor)
                                        <option value="" disabled=""> Escoga una asignatura</option>
                                        <option value="{{$malla_profesor['id']}}">{{$malla_profesor['id']}}</option>
                                    @endforeach
                                </select>
                              <!--<input type="text" class="form-control" name="malla_profesor_id" id="malla_profesor_id" aria-describedby="helpId" placeholder="Escribir un asignatura">-->
                            </div>
                            <div class="form-group">
                              <label for="local_id">Local</label>
                              <!--Select -->
                              <!--<input type="text" class="form-control" name="local_id" id="local_id" aria-describedby="helpId" placeholder="Escribir un local">-->
                              <select class="form-control" name="local_id" id="local_id" aria-describedby="helpId" placeholder="Escribir un local">

                                @foreach ($locals as $local)
                                    <option value="" disabled=""> Escoga un Local</option>
                                    <option value="{{$local['id']}}">{{$local['nombre_local']}}</option>

                                @endforeach
                            </select>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                        <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        
                    </div>
                </div>
            </div>
        </div>

@endsection