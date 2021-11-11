@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.malla-curso.actions.edit', ['name' => $mallaCurso->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <malla-curso-form
                :action="'{{ $mallaCurso->resource_url }}'"
                :data="{{ $mallaCurso->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.malla-curso.actions.edit', ['name' => $mallaCurso->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.malla-curso.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </malla-curso-form>

        </div>
    
</div>

@endsection