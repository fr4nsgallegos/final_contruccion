@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.malla-academica.actions.edit', ['name' => $mallaAcademica->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <malla-academica-form
                :action="'{{ $mallaAcademica->resource_url }}'"
                :data="{{ $mallaAcademica->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.malla-academica.actions.edit', ['name' => $mallaAcademica->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.malla-academica.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </malla-academica-form>

        </div>
    
</div>

@endsection