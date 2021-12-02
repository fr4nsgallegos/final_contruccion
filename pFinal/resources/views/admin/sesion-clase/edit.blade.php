@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.sesion-clase.actions.edit', ['name' => $sesionClase->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <sesion-clase-form
                :action="'{{ $sesionClase->resource_url }}'"
                :data="{{ $sesionClase->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.sesion-clase.actions.edit', ['name' => $sesionClase->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.sesion-clase.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </sesion-clase-form>

        </div>
    
</div>

@endsection