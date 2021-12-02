<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre_asignatura'), 'has-success': fields.nombre_asignatura && fields.nombre_asignatura.valid }">
    <label for="nombre_asignatura" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.asignatura.columns.nombre_asignatura') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre_asignatura" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre_asignatura'), 'form-control-success': fields.nombre_asignatura && fields.nombre_asignatura.valid}" id="nombre_asignatura" name="nombre_asignatura" placeholder="{{ trans('admin.asignatura.columns.nombre_asignatura') }}">
        <div v-if="errors.has('nombre_asignatura')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre_asignatura') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.asignatura.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.asignatura.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>


