<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cantidad_horas_tipologia'), 'has-success': fields.cantidad_horas_tipologia && fields.cantidad_horas_tipologia.valid }">
    <label for="cantidad_horas_tipologia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-curso.columns.cantidad_horas_tipologia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cantidad_horas_tipologia" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cantidad_horas_tipologia'), 'form-control-success': fields.cantidad_horas_tipologia && fields.cantidad_horas_tipologia.valid}" id="cantidad_horas_tipologia" name="cantidad_horas_tipologia" placeholder="{{ trans('admin.malla-curso.columns.cantidad_horas_tipologia') }}">
        <div v-if="errors.has('cantidad_horas_tipologia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cantidad_horas_tipologia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cantidad_credito'), 'has-success': fields.cantidad_credito && fields.cantidad_credito.valid }">
    <label for="cantidad_credito" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-curso.columns.cantidad_credito') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cantidad_credito" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cantidad_credito'), 'form-control-success': fields.cantidad_credito && fields.cantidad_credito.valid}" id="cantidad_credito" name="cantidad_credito" placeholder="{{ trans('admin.malla-curso.columns.cantidad_credito') }}">
        <div v-if="errors.has('cantidad_credito')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cantidad_credito') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('malla_academica_id'), 'has-success': fields.malla_academica_id && fields.malla_academica_id.valid }">
    <label for="malla_academica_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-curso.columns.malla_academica_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.malla_academica_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('malla_academica_id'), 'form-control-success': fields.malla_academica_id && fields.malla_academica_id.valid}" id="malla_academica_id" name="malla_academica_id" placeholder="{{ trans('admin.malla-curso.columns.malla_academica_id') }}">

            @foreach ($malla_academicas as $malla_academica)
                <option value="" disabled=""> Escoga una Malla Academica</option>
                <option value="{{$malla_academica['id']}}">{{$malla_academica['nombre']}}</option>

            @endforeach
        </select>

        <div v-if="errors.has('malla_academica_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('malla_academica_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('asignatura_id'), 'has-success': fields.asignatura_id && fields.asignatura_id.valid }">
    <label for="asignatura_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-curso.columns.asignatura_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.asignatura_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('asignatura_id'), 'form-control-success': fields.asignatura_id && fields.asignatura_id.valid}" id="asignatura_id" name="asignatura_id" placeholder="{{ trans('admin.malla-curso.columns.asignatura_id') }}">

            @foreach ($asignatiuras as $asignatura)
                <option value="" disabled=""> Escoga una asignatura</option>
                <option value="{{$asignatura['id']}}">{{$asignatura['nombre']}}</option>

            @endforeach
        </select>
        <div v-if="errors.has('asignatura_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('asignatura_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipologia_clase_id'), 'has-success': fields.tipologia_clase_id && fields.tipologia_clase_id.valid }">
    <label for="tipologia_clase_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-curso.columns.tipologia_clase_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.tipologia_clase_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipologia_clase_id'), 'form-control-success': fields.tipologia_clase_id && fields.tipologia_clase_id.valid}" id="tipologia_clase_id" name="tipologia_clase_id" placeholder="{{ trans('admin.malla-curso.columns.tipologia_clase_id') }}">

            @foreach ($tipologias as $tipologia_clase)
                <option value="" disabled=""> Escoga una Tipologia de Clase</option>
                <option value="{{$tipologia_clase['id']}}">{{$tipologia_clase['nombre']}}</option>

            @endforeach
        </select>
        <div v-if="errors.has('tipologia_clase_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipologia_clase_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('semestre_academico_id'), 'has-success': fields.semestre_academico_id && fields.semestre_academico_id.valid }">
    <label for="semestre_academico_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-curso.columns.semestre_academico_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.semestre_academico_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('semestre_academico_id'), 'form-control-success': fields.semestre_academico_id && fields.semestre_academico_id.valid}" id="semestre_academico_id" name="semestre_academico_id" placeholder="{{ trans('admin.malla-curso.columns.semestre_academico_id') }}">

            @foreach ($semestres as $semestre_academico)
                <option value="" disabled=""> Escoga un Semestre Academico</option>
                <option value="{{$semestre_academico['id']}}">{{$semestre_academico['nombre']}}</option>

            @endforeach
        </select>

        <div v-if="errors.has('semestre_academico_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('semestre_academico_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('anio_academico_id'), 'has-success': fields.anio_academico_id && fields.anio_academico_id.valid }">
    <label for="anio_academico_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.malla-curso.columns.anio_academico_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.anio_academico_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('anio_academico_id'), 'form-control-success': fields.anio_academico_id && fields.anio_academico_id.valid}" id="anio_academico_id" name="anio_academico_id" placeholder="{{ trans('admin.malla-curso.columns.anio_academico_id') }}">

            @foreach ($anios as $anio_academico)
                <option value="" disabled=""> Escoga un Año Academico</option>
                <option value="{{$anio_academico['id']}}">{{$anio_academico['nombre']}}</option>

            @endforeach
        </select>
        <div v-if="errors.has('anio_academico_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('anio_academico_id') }}</div>
    </div>
</div>


