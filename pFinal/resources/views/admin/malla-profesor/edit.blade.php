@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.malla-profesor.actions.edit', ['name' => $mallaProfesor->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <malla-profesor-form
                :action="'{{ $mallaProfesor->resource_url }}'"
                :data="{{ $mallaProfesor->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.malla-profesor.actions.edit', ['name' => $mallaProfesor->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.malla-profesor.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </malla-profesor-form>

        </div>
    
</div>

@endsection