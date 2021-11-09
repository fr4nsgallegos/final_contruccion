@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.local.actions.edit', ['name' => $local->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <local-form
                :action="'{{ $local->resource_url }}'"
                :data="{{ $local->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.local.actions.edit', ['name' => $local->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.local.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </local-form>

        </div>
    
</div>

@endsection