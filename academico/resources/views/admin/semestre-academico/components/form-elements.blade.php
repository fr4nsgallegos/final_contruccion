<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semestre-academico.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.semestre-academico.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orden'), 'has-success': fields.orden && fields.orden.valid }">
    <label for="orden" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semestre-academico.columns.orden') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orden" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orden'), 'form-control-success': fields.orden && fields.orden.valid}" id="orden" name="orden" placeholder="{{ trans('admin.semestre-academico.columns.orden') }}">
        <div v-if="errors.has('orden')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orden') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sesion_clase_id'), 'has-success': fields.sesion_clase_id && fields.sesion_clase_id.valid }">
    <label for="sesion_clase_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.semestre-academico.columns.sesion_clase_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <select v-model="form.sesion_clase_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sesion_clase_id'), 'form-control-success': fields.sesion_clase_id && fields.sesion_clase_id.valid}" id="sesion_clase_id" name="sesion_clase_id" placeholder="{{ trans('admin.semestre-academico.columns.sesion_clase_id') }}">
            <option value=""> Escoga una sesión de clase</option>
            @foreach ($sesiones as $sesion_clase)
                <option value="{{$sesion_clase[ 'id' ]}}">{{$sesion_clase[ 'nombre' ]}}</option>

            @endforeach
        </select>

        <!-- <input type="text" v-model="form.sesion_clase_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sesion_clase_id'), 'form-control-success': fields.sesion_clase_id && fields.sesion_clase_id.valid}" id="sesion_clase_id" name="sesion_clase_id" placeholder="{{ trans('admin.semestre-academico.columns.sesion_clase_id') }}"> -->

        <div v-if="errors.has('sesion_clase_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sesion_clase_id') }}</div>
    </div>
</div>


