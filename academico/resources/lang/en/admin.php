<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'malla-academica' => [
        'title' => 'Malla Academica',

        'actions' => [
            'index' => 'Malla Academica',
            'create' => 'Nueva Malla Academica',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'anio_creacion' => 'Anio creacion',
            'cantidad_anios' => 'Cantidad anios',
            'cantidad_semestre' => 'Cantidad semestre',
            
        ],
    ],

    'dia-semana' => [
        'title' => 'Dia de la Semana',

        'actions' => [
            'index' => 'Dia de la Semana',
            'create' => 'Nuevo Dia de la Semana',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'orden' => 'Orden',
            'sigla' => 'Sigla',
            
        ],
    ],

    'curso-academico' => [
        'title' => 'Curso Academico',

        'actions' => [
            'index' => 'Curso Academico',
            'create' => 'Nuevo Curso Academico',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'anio-academico' => [
        'title' => 'Año Academico',

        'actions' => [
            'index' => 'Año Academico',
            'create' => 'Nuevo Año Academico',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'orden' => 'Orden',
            
        ],
    ],

    'local' => [
        'title' => 'Local',

        'actions' => [
            'index' => 'Local',
            'create' => 'Nuevo Local',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sigla' => 'Sigla',
            'tipo' => 'Tipo',
            
        ],
    ],

    'sesion-clase' => [
        'title' => 'Sesion de Clase',

        'actions' => [
            'index' => 'Sesion de Clase',
            'create' => 'Nueva Sesion de Clase',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sigla' => 'Sigla',
            'turno' => 'Turno',
            'local_id' => 'Local',
            
        ],
    ],

    'tipologia-clase' => [
        'title' => 'Tipologia de Clase',

        'actions' => [
            'index' => 'Tipologia de Clase',
            'create' => 'Nueva Tipologia de Clase',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'asignatura' => [
        'title' => 'Asignatura',

        'actions' => [
            'index' => 'Asignatura',
            'create' => 'Nueva Asignatura',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sigla' => 'Sigla',
            'sesion_clase_id' => 'Sesion clase',
            
        ],
    ],

    'semestre-academico' => [
        'title' => 'Semestre Academico',

        'actions' => [
            'index' => 'Semestre Academico',
            'create' => 'Nuevo Semestre Academico',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'orden' => 'Orden',
            'sesion_clase_id' => 'Sesion clase',
            
        ],
    ],

    'profesor' => [
        'title' => 'Profesor',

        'actions' => [
            'index' => 'Profesor',
            'create' => 'Nuevo Profesor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'dni' => 'Dni',
            'usuario' => 'Usuario',
            'email' => 'Email',
            'password' => 'Password',
            
        ],
    ],

    'turno' => [
        'title' => 'Turno',

        'actions' => [
            'index' => 'Turno',
            'create' => 'Nuevo Turno',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sigla' => 'Sigla',
            'orden' => 'Orden',
            'hora_inicio' => 'Hora inicio',
            'hora_fin' => 'Hora fin',
            'dia_semana_id' => 'Dia semana',
            'sesion_clase_id' => 'Sesion clase',
            
        ],
    ],

    'local-tipologium' => [
        'title' => 'Local - Tipologia',

        'actions' => [
            'index' => 'Local Tipologia',
            'create' => 'Nuevo Local - Tipologia',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'local_id' => 'Local',
            'tipologia_clase_id' => 'Tipologia clase',
            
        ],
    ],

    'malla-curso' => [
        'title' => 'Malla - Asignatura',

        'actions' => [
            'index' => 'Malla - Asignatura',
            'create' => 'Nueva Malla - Asignatura',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cantidad_horas_tipologia' => 'Hrs tipologia',
            'cantidad_credito' => 'Credito',
            'malla_academica_id' => 'Malla academica',
            'asignatura_id' => 'Asignatura',
            'tipologia_clase_id' => 'Tipologia',
            'semestre_academico_id' => 'Semestre',
            'anio_academico_id' => 'Año academico',
            
        ],
    ],

    'admin-user' => [
        'title' => 'Admin Users',

        'actions' => [
            'index' => 'Admin Users',
            'create' => 'New Admin User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            
        ],
    ],

    'admin-user' => [
        'title' => 'Profesor',

        'actions' => [
            'index' => 'Profesor',
            'create' => 'Nuevo Profesor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'Nombre',
            'last_name' => 'Apellidos',
            'dni' => 'Dni',
            'usuario' => 'Usuario',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Confirmar Password',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Idioma',
            
        ],
    ],

    'malla-profesor' => [
        'title' => 'Malla - Profesor',

        'actions' => [
            'index' => 'Malla - Profesor',
            'create' => 'Nueva Malla - Profesor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'malla_academica_id' => 'Malla academica',
            'admin_users_id' => 'Profesor',
            'curso_academico_id' => 'Curso academico',
            
        ],
    ],

    'malla-profesor' => [
        'title' => 'Malla Profesor',

        'actions' => [
            'index' => 'Malla Profesor',
            'create' => 'New Malla Profesor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'malla_academica_id' => 'Malla academica',
            'admin_users_id' => 'Admin users',
            'curso_academico_id' => 'Curso academico',
            
        ],
    ],

    'sesion-clase' => [
        'title' => 'Sesion Clase',

        'actions' => [
            'index' => 'Sesion Clase',
            'create' => 'New Sesion Clase',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sigla' => 'Sigla',
            'turno' => 'Turno',
            'local_id' => 'Local',
            
        ],
    ],

    'turno' => [
        'title' => 'Turno',

        'actions' => [
            'index' => 'Turno',
            'create' => 'New Turno',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sigla' => 'Sigla',
            'orden' => 'Orden',
            'hora_inicio' => 'Hora inicio',
            'hora_fin' => 'Hora fin',
            'dia_semana_id' => 'Dia semana',
            'sesion_clase_id' => 'Sesion clase',
            
        ],
    ],

    'malla-profesor' => [
        'title' => 'Malla Profesor',

        'actions' => [
            'index' => 'Malla Profesor',
            'create' => 'New Malla Profesor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'asignatura_id' => 'Asignatura',
            'admin_users_id' => 'Admin users',
            'curso_academico_id' => 'Curso academico',
            
        ],
    ],

    'turno' => [
        'title' => 'Turno',

        'actions' => [
            'index' => 'Turno',
            'create' => 'New Turno',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sigla' => 'Sigla',
            'orden' => 'Orden',
            'hora_inicio' => 'Hora inicio',
            'hora_fin' => 'Hora fin',
            'sesion_clase_id' => 'Sesion clase',
            
        ],
    ],

    'sesion-clase' => [
        'title' => 'Sesion Clase',

        'actions' => [
            'index' => 'Sesion Clase',
            'create' => 'New Sesion Clase',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'sigla' => 'Sigla',
            'local_id' => 'Local',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];