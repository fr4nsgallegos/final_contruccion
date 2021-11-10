<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.asignatura.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.asignatura.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.asignatura.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.asignatura.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sesion_clase_id'), 'has-success': fields.sesion_clase_id && fields.sesion_clase_id.valid }">
    <label for="sesion_clase_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.asignatura.columns.sesion_clase_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <select v-model="form.sesion_clase_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sesion_clase_id'), 'form-control-success': fields.sesion_clase_id && fields.sesion_clase_id.valid}" id="sesion_clase_id" name="sesion_clase_id" placeholder="{{ trans('admin.asignatura.columns.sesion_clase_id') }}">
            <option value=""> Escoga una Sesion de Clase</option>
            @foreach ($sesiones as $sesion_clase)
                <option value="{{$sesion_clase[ 'id' ]}}">{{$sesion_clase[ 'nombre' ]}}</option>

            @endforeach
        </select>

        <div v-if="errors.has('sesion_clase_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sesion_clase_id') }}</div>
    </div>
</div>


