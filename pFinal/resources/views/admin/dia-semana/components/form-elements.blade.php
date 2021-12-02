<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre_dia_semana'), 'has-success': fields.nombre_dia_semana && fields.nombre_dia_semana.valid }">
    <label for="nombre_dia_semana" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dia-semana.columns.nombre_dia_semana') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre_dia_semana" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre_dia_semana'), 'form-control-success': fields.nombre_dia_semana && fields.nombre_dia_semana.valid}" id="nombre_dia_semana" name="nombre_dia_semana" placeholder="{{ trans('admin.dia-semana.columns.nombre_dia_semana') }}">
        <div v-if="errors.has('nombre_dia_semana')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre_dia_semana') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orden'), 'has-success': fields.orden && fields.orden.valid }">
    <label for="orden" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dia-semana.columns.orden') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orden" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orden'), 'form-control-success': fields.orden && fields.orden.valid}" id="orden" name="orden" placeholder="{{ trans('admin.dia-semana.columns.orden') }}">
        <div v-if="errors.has('orden')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orden') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dia-semana.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.dia-semana.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>


