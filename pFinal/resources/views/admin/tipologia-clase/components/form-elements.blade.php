<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre_tipologia'), 'has-success': fields.nombre_tipologia && fields.nombre_tipologia.valid }">
    <label for="nombre_tipologia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tipologia-clase.columns.nombre_tipologia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre_tipologia" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre_tipologia'), 'form-control-success': fields.nombre_tipologia && fields.nombre_tipologia.valid}" id="nombre_tipologia" name="nombre_tipologia" placeholder="{{ trans('admin.tipologia-clase.columns.nombre_tipologia') }}">
        <div v-if="errors.has('nombre_tipologia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre_tipologia') }}</div>
    </div>
</div>


