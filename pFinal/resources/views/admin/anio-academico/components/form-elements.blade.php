<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre_anio_academico'), 'has-success': fields.nombre_anio_academico && fields.nombre_anio_academico.valid }">
    <label for="nombre_anio_academico" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.anio-academico.columns.nombre_anio_academico') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre_anio_academico" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre_anio_academico'), 'form-control-success': fields.nombre_anio_academico && fields.nombre_anio_academico.valid}" id="nombre_anio_academico" name="nombre_anio_academico" placeholder="{{ trans('admin.anio-academico.columns.nombre_anio_academico') }}">
        <div v-if="errors.has('nombre_anio_academico')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre_anio_academico') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.anio-academico.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.anio-academico.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>


