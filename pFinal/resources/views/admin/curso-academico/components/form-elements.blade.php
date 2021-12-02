<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre_curso_academico'), 'has-success': fields.nombre_curso_academico && fields.nombre_curso_academico.valid }">
    <label for="nombre_curso_academico" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.curso-academico.columns.nombre_curso_academico') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre_curso_academico" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre_curso_academico'), 'form-control-success': fields.nombre_curso_academico && fields.nombre_curso_academico.valid}" id="nombre_curso_academico" name="nombre_curso_academico" placeholder="{{ trans('admin.curso-academico.columns.nombre_curso_academico') }}">
        <div v-if="errors.has('nombre_curso_academico')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre_curso_academico') }}</div>
    </div>
</div>


