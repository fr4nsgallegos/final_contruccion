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

    'local' => [
        'title' => 'Local',

        'actions' => [
            'index' => 'Local',
            'create' => 'Nuevo Local',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre_local' => 'Nombre local',
            'sigla' => 'Sigla',
            'tipo_local' => 'Tipo local',
            
        ],
    ],

    'tipologia-clase' => [
        'title' => 'Tipologia Clase',

        'actions' => [
            'index' => 'Tipologia Clase',
            'create' => 'Nueva Tipologia Clase',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre_tipologia' => 'Nombre tipologia',
            
        ],
    ],

    'dia-semana' => [
        'title' => 'Dia Semana',

        'actions' => [
            'index' => 'Dia Semana',
            'create' => 'Nuevo Dia Semana',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre_dia_semana' => 'Nombre dia semana',
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
            'nombre_curso_academico' => 'Nombre curso academico',
            
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
            'nombre_anio_academico' => 'Nombre anio academico',
            'sigla' => 'Sigla',
            
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
            'nombre_malla_academica' => 'Nombre malla academica',
            'anio_creacion' => 'Año creacion',
            'cantidad_anios' => 'Cantidad años',
            'cantidad_semestre' => 'Cantidad semestre',
            
        ],
    ],

    'sesion-clase' => [
        'title' => 'Sesion Clase',

        'actions' => [
            'index' => 'Sesion Clase',
            'create' => 'Nueva Sesion de Clase',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre_sesion_clase' => 'Nombre sesion clase',
            'sigla' => 'Sigla',
            
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
            'nombre_asignatura' => 'Nombre asignatura',
            'sigla' => 'Sigla',
            
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
            'nombre_semestre' => 'Nombre del semestre',
            'orden' => 'Orden',
            'sesion_clase_id' => 'Sesion clase',
            
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
            'nombre_turno' => 'Nombre turno',
            'sigla' => 'Sigla',
            'orden' => 'Orden',
            'hora_inicio' => 'Hora inicio',
            'hora_fin' => 'Hora fin',
            'sesion_clase_id' => 'Sesion clase',
            
        ],
    ],

    'malla-curso' => [
        'title' => 'Malla-Asignatura',

        'actions' => [
            'index' => 'Malla-Asignatura',
            'create' => 'Nueva Malla-Asignatura',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cantidad_horas_tipologia' => 'Horas tipologia',
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
            'usuario' => 'Usuario',
            'dni' => 'Dni',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Confirmar Password',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            
        ],
    ],

    'malla-profesor' => [
        'title' => 'Malla Profesor',

        'actions' => [
            'index' => 'Malla Profesor',
            'create' => 'Nueva Malla-Profesor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'admin_users_id' => 'Admin users',
            'curso_academico_id' => 'Curso academico',
            'malla_curso_id' => 'Malla curso',
            
        ],
    ],

    'evento' => [
        'title' => 'Cronograma',

        'actions' => [
            'index' => 'Cronograma',
            'create' => 'Nuevo Cronograma',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Título',
            'descripcion' => 'Descripcion',
            'start' => 'Hora de inicio',
            'end' => 'Hora de Fin',
            'malla_profesor_id' => 'Malla Profesor',
            'local_id' => 'Local',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];