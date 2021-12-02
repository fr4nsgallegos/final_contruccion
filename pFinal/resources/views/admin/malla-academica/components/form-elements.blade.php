<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre_malla_academica'), 'has-success': fields.nombre_malla_academica && fields.nombre_malla_academica.valid }">
    <label for="nombre_malla_academica" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-academica.columns.nombre_malla_academica') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre_malla_academica" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre_malla_academica'), 'form-control-success': fields.nombre_malla_academica && fields.nombre_malla_academica.valid}" id="nombre_malla_academica" name="nombre_malla_academica" placeholder="{{ trans('admin.malla-academica.columns.nombre_malla_academica') }}">
        <div v-if="errors.has('nombre_malla_academica')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre_malla_academica') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('anio_creacion'), 'has-success': fields.anio_creacion && fields.anio_creacion.valid }">
    <label for="anio_creacion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-academica.columns.anio_creacion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.anio_creacion" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('anio_creacion'), 'form-control-success': fields.anio_creacion && fields.anio_creacion.valid}" id="anio_creacion" name="anio_creacion" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('anio_creacion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('anio_creacion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cantidad_anios'), 'has-success': fields.cantidad_anios && fields.cantidad_anios.valid }">
    <label for="cantidad_anios" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-academica.columns.cantidad_anios') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cantidad_anios" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cantidad_anios'), 'form-control-success': fields.cantidad_anios && fields.cantidad_anios.valid}" id="cantidad_anios" name="cantidad_anios" placeholder="{{ trans('admin.malla-academica.columns.cantidad_anios') }}">
        <div v-if="errors.has('cantidad_anios')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cantidad_anios') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cantidad_semestre'), 'has-success': fields.cantidad_semestre && fields.cantidad_semestre.valid }">
    <label for="cantidad_semestre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-academica.columns.cantidad_semestre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cantidad_semestre" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cantidad_semestre'), 'form-control-success': fields.cantidad_semestre && fields.cantidad_semestre.valid}" id="cantidad_semestre" name="cantidad_semestre" placeholder="{{ trans('admin.malla-academica.columns.cantidad_semestre') }}">
        <div v-if="errors.has('cantidad_semestre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cantidad_semestre') }}</div>
    </div>
</div>


