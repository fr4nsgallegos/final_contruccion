<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre_sesion_clase'), 'has-success': fields.nombre_sesion_clase && fields.nombre_sesion_clase.valid }">
    <label for="nombre_sesion_clase" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sesion-clase.columns.nombre_sesion_clase') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre_sesion_clase" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre_sesion_clase'), 'form-control-success': fields.nombre_sesion_clase && fields.nombre_sesion_clase.valid}" id="nombre_sesion_clase" name="nombre_sesion_clase" placeholder="{{ trans('admin.sesion-clase.columns.nombre_sesion_clase') }}">
        <div v-if="errors.has('nombre_sesion_clase')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre_sesion_clase') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sesion-clase.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.sesion-clase.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>


