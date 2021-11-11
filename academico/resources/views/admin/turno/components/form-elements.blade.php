<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.turno.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.turno.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orden'), 'has-success': fields.orden && fields.orden.valid }">
    <label for="orden" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno.columns.orden') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orden" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orden'), 'form-control-success': fields.orden && fields.orden.valid}" id="orden" name="orden" placeholder="{{ trans('admin.turno.columns.orden') }}">
        <div v-if="errors.has('orden')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orden') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hora_inicio'), 'has-success': fields.hora_inicio && fields.hora_inicio.valid }">
    <label for="hora_inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno.columns.hora_inicio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.hora_inicio" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('hora_inicio'), 'form-control-success': fields.hora_inicio && fields.hora_inicio.valid}" id="hora_inicio" name="hora_inicio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('hora_inicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hora_inicio') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hora_fin'), 'has-success': fields.hora_fin && fields.hora_fin.valid }">
    <label for="hora_fin" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno.columns.hora_fin') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.hora_fin" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('hora_fin'), 'form-control-success': fields.hora_fin && fields.hora_fin.valid}" id="hora_fin" name="hora_fin" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('hora_fin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hora_fin') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dia_semana_id'), 'has-success': fields.dia_semana_id && fields.dia_semana_id.valid }">
    <label for="dia_semana_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno.columns.dia_semana_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.dia_semana_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('dia_semana_id'), 'form-control-success': fields.dia_semana_id && fields.dia_semana_id.valid}" id="dia_semana_id" name="dia_semana_id" placeholder="{{ trans('admin.turno.columns.dia_semana_id') }}">
            <option value=""> Escoga un dia de la semana</option>
            @foreach ($dias as $dia_semana)
                <option value="{{$dia_semana[ 'id' ]}}">{{$dia_semana[ 'nombre' ]}}</option>

            @endforeach
        </select>

        <!--<input type="text" v-model="form.dia_semana_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('dia_semana_id'), 'form-control-success': fields.dia_semana_id && fields.dia_semana_id.valid}" id="dia_semana_id" name="dia_semana_id" placeholder="{{ trans('admin.turno.columns.dia_semana_id') }}">-->

        <div v-if="errors.has('dia_semana_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dia_semana_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sesion_clase_id'), 'has-success': fields.sesion_clase_id && fields.sesion_clase_id.valid }">
    <label for="sesion_clase_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno.columns.sesion_clase_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.sesion_clase_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sesion_clase_id'), 'form-control-success': fields.sesion_clase_id && fields.sesion_clase_id.valid}" id="sesion_clase_id" name="sesion_clase_id" placeholder="{{ trans('admin.turno.columns.sesion_clase_id') }}">
            <option value=""> Escoga una sesion de clase</option>
            @foreach ($sesiones as $sesion_clase)
                <option value="{{$sesion_clase[ 'id' ]}}">{{$sesion_clase[ 'nombre' ]}}</option>

            @endforeach
        </select>

        <!--<input type="text" v-model="form.sesion_clase_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sesion_clase_id'), 'form-control-success': fields.sesion_clase_id && fields.sesion_clase_id.valid}" id="sesion_clase_id" name="sesion_clase_id" placeholder="{{ trans('admin.turno.columns.sesion_clase_id') }}"> -->

        <div v-if="errors.has('sesion_clase_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sesion_clase_id') }}</div>
    </div>
</div>


