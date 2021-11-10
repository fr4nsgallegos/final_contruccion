<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/malla-academicas') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.malla-academica.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/dia-semanas') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.dia-semana.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/curso-academicos') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.curso-academico.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/anio-academicos') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.anio-academico.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/locals') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.local.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/sesion-clases') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.sesion-clase.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tipologia-clases') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.tipologia-clase.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/asignaturas') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.asignatura.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/semestre-academicos') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.semestre-academico.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
