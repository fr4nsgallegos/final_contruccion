@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.profesor.actions.edit', ['name' => $profesor->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <profesor-form
                :action="'{{ $profesor->resource_url }}'"
                :data="{{ $profesor->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.profesor.actions.edit', ['name' => $profesor->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.profesor.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </profesor-form>

        </div>
    
</div>

@endsection