<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre_local'), 'has-success': fields.nombre_local && fields.nombre_local.valid }">
    <label for="nombre_local" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.local.columns.nombre_local') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre_local" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre_local'), 'form-control-success': fields.nombre_local && fields.nombre_local.valid}" id="nombre_local" name="nombre_local" placeholder="{{ trans('admin.local.columns.nombre_local') }}">
        <div v-if="errors.has('nombre_local')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre_local') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.local.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.local.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipo_local'), 'has-success': fields.tipo_local && fields.tipo_local.valid }">
    <label for="tipo_local" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.local.columns.tipo_local') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.tipo_local" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo_local'), 'form-control-success': fields.tipo_local && fields.tipo_local.valid}" id="tipo_local" name="tipo_local" placeholder="{{ trans('admin.local.columns.tipo_local') }}">
            <option value="" disabled selected>Tipo de Local</option>
            <option data-tokens="aula">Aula</option>
            <option data-tokens="laboratorio">Laboratorio</option>
        </select>
        <!--<input type="text" v-model="form.tipo_local" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo_local'), 'form-control-success': fields.tipo_local && fields.tipo_local.valid}" id="tipo_local" name="tipo_local" placeholder="{{ trans('admin.local.columns.tipo_local') }}">-->
        <div v-if="errors.has('tipo_local')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo_local') }}</div>
    </div>
</div>


