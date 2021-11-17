<div class="form-group row align-items-center" :class="{'has-danger': errors.has('asignatura_id'), 'has-success': fields.asignatura_id && fields.asignatura_id.valid }">
    <label for="asignatura_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-profesor.columns.asignatura_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.asignatura_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('asignatura_id'), 'form-control-success': fields.asignatura_id && fields.asignatura_id.valid}" id="asignatura_id" name="asignatura_id" placeholder="{{ trans('admin.malla-profesor.columns.asignatura_id') }}">

            @foreach ($asignaturas as $asignatura)
                <option value="" disabled=""> Escoga una Asignatura</option>
                <option value="{{$asignatura['id']}}">{{$asignatura['nombre']}}</option>

            @endforeach
        </select>

        <!--<input type="text" v-model="form.asignatura_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('asignatura_id'), 'form-control-success': fields.asignatura_id && fields.asignatura_id.valid}" id="asignatura_id" name="asignatura_id" placeholder="{{ trans('admin.malla-profesor.columns.asignatura_id') }}">-->
        <div v-if="errors.has('asignatura_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('asignatura_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('admin_users_id'), 'has-success': fields.admin_users_id && fields.admin_users_id.valid }">
    <label for="admin_users_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-profesor.columns.admin_users_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.admin_users_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('admin_users_id'), 'form-control-success': fields.admin_users_id && fields.admin_users_id.valid}" id="admin_users_id" name="admin_users_id" placeholder="{{ trans('admin.malla-profesor.columns.admin_users_id') }}">

                <option value="" disabled=""> Escoga un Profesor</option>
            @foreach ($admins as $admin_users)
                <option value="{{$admin_users['id']}}">{{$admin_users['first_name']}}</option>

            @endforeach
        </select>

        <!--<input type="text" v-model="form.admin_users_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('admin_users_id'), 'form-control-success': fields.admin_users_id && fields.admin_users_id.valid}" id="admin_users_id" name="admin_users_id" placeholder="{{ trans('admin.malla-profesor.columns.admin_users_id') }}">-->
        <div v-if="errors.has('admin_users_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('admin_users_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('curso_academico_id'), 'has-success': fields.curso_academico_id && fields.curso_academico_id.valid }">
    <label for="curso_academico_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-profesor.columns.curso_academico_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.curso_academico_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('curso_academico_id'), 'form-control-success': fields.curso_academico_id && fields.curso_academico_id.valid}" id="curso_academico_id" name="curso_academico_id" placeholder="{{ trans('admin.malla-profesor.columns.curso_academico_id') }}">

            @foreach ($cursos as $curso_academico)
                <option value="" disabled=""> Escoga un Curso Academico</option>
                <option value="{{$curso_academico['id']}}">{{$curso_academico['nombre']}}</option>

            @endforeach
        </select>
        <!--<input type="text" v-model="form.curso_academico_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('curso_academico_id'), 'form-control-success': fields.curso_academico_id && fields.curso_academico_id.valid}" id="curso_academico_id" name="curso_academico_id" placeholder="{{ trans('admin.malla-profesor.columns.curso_academico_id') }}">-->
        <div v-if="errors.has('curso_academico_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('curso_academico_id') }}</div>
    </div>
</div>


