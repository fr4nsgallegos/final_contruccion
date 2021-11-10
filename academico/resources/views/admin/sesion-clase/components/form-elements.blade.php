<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sesion-clase.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.sesion-clase.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sigla'), 'has-success': fields.sigla && fields.sigla.valid }">
    <label for="sigla" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sesion-clase.columns.sigla') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sigla" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sigla'), 'form-control-success': fields.sigla && fields.sigla.valid}" id="sigla" name="sigla" placeholder="{{ trans('admin.sesion-clase.columns.sigla') }}">
        <div v-if="errors.has('sigla')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sigla') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('turno'), 'has-success': fields.turno && fields.turno.valid }">
    <label for="turno" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sesion-clase.columns.turno') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.turno" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('turno'), 'form-control-success': fields.turno && fields.turno.valid}" id="turno" name="turno" placeholder="{{ trans('admin.sesion-clase.columns.turno') }}">
            <option value="" disabled selected>Turno de clases</option>
            <option data-tokens="mañana">Mañana</option>
            <option data-tokens="tarde">Tarde</option>
            <option data-tokens="noche">Noche</option>
        </select>

        <!--<input type="text" v-model="form.turno" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('turno'), 'form-control-success': fields.turno && fields.turno.valid}" id="turno" name="turno" placeholder="{{ trans('admin.sesion-clase.columns.turno') }}"> -->

        <div v-if="errors.has('turno')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('turno') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('local_id'), 'has-success': fields.local_id && fields.local_id.valid }">
    <label for="local_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sesion-clase.columns.local_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.local_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('local_id'), 'form-control-success': fields.local_id && fields.local_id.valid}" id="local_id" name="local_id" placeholder="{{ trans('admin.sesion-clase.columns.local_id') }}">
            <option value=""> Escoga un local</option>
            @foreach ($locals as $local)
                <option value="{{$local[ 'id' ]}}">{{$local[ 'nombre' ]}}</option>

            @endforeach
        </select>
        
        <div v-if="errors.has('local_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('local_id') }}</div>
    </div>
</div>


