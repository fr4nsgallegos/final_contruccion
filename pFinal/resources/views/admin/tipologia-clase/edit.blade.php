@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tipologia-clase.actions.edit', ['name' => $tipologiaClase->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tipologia-clase-form
                :action="'{{ $tipologiaClase->resource_url }}'"
                :data="{{ $tipologiaClase->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tipologia-clase.actions.edit', ['name' => $tipologiaClase->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tipologia-clase.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tipologia-clase-form>

        </div>
    
</div>

@endsection