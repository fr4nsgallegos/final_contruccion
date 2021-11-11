<div class="form-group row align-items-center" :class="{'has-danger': errors.has('local_id'), 'has-success': fields.local_id && fields.local_id.valid }">
    <label for="local_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.local-tipologium.columns.local_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.local_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('local_id'), 'form-control-success': fields.local_id && fields.local_id.valid}" id="local_id" name="local_id" placeholder="{{ trans('admin.local-tipologium.columns.local_id') }}">
            <option value="" disabled=""> Escoga una sesion de clase</option>
            @foreach ($locals as $local)
            <option value="{{$local[ 'id' ]}}">{{$local[ 'nombre' ]}}</option>

            @endforeach
        </select>

        <div v-if="errors.has('local_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('local_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipologia_clase_id'), 'has-success': fields.tipologia_clase_id && fields.tipologia_clase_id.valid }">
    <label for="tipologia_clase_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.local-tipologium.columns.tipologia_clase_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <select v-model="form.tipologia_clase_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipologia_clase_id'), 'form-control-success': fields.tipologia_clase_id && fields.tipologia_clase_id.valid}" id="tipologia_clase_id" name="tipologia_clase_id" placeholder="{{ trans('admin.local-tipologium.columns.tipologia_clase_id') }}">
            <option value="" disabled=""> Escoga una sesion de clase</option>
            @foreach ($sesiones as $sesion_clase)
            <option value="{{$sesion_clase[ 'id' ]}}">{{$sesion_clase[ 'nombre' ]}}</option>

            @endforeach
        </select>

        <div v-if="errors.has('tipologia_clase_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipologia_clase_id') }}</div>
    </div>
</div>


