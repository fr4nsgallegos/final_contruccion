@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.local-tipologium.actions.edit', ['name' => $localTipologium->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <local-tipologium-form
                :action="'{{ $localTipologium->resource_url }}'"
                :data="{{ $localTipologium->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.local-tipologium.actions.edit', ['name' => $localTipologium->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.local-tipologium.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </local-tipologium-form>

        </div>
    
</div>

@endsection