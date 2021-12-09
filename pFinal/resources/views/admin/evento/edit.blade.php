@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.evento.actions.edit', ['name' => $evento->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <evento-form
                :action="'{{ $evento->resource_url }}'"
                :data="{{ $evento->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.evento.actions.edit', ['name' => $evento->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.evento.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </evento-form>

        </div>
    
</div>

@endsection