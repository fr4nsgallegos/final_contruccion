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
            'create' => 'New Malla Academica',
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
        'title' => 'Dia Semana',

        'actions' => [
            'index' => 'Dia Semana',
            'create' => 'New Dia Semana',
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
            'create' => 'New Curso Academico',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            
        ],
    ],

    'anio-academico' => [
        'title' => 'Anio Academico',

        'actions' => [
            'index' => 'Anio Academico',
            'create' => 'New Anio Academico',
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
            'create' => 'New Local',
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

    'tipologia-clase' => [
        'title' => 'Tipologia Clase',

        'actions' => [
            'index' => 'Tipologia Clase',
            'create' => 'New Tipologia Clase',
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
            'create' => 'New Asignatura',
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
            'create' => 'New Semestre Academico',
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
            'create' => 'New Profesor',
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

    'local-tipologium' => [
        'title' => 'Local Tipologia',

        'actions' => [
            'index' => 'Local Tipologia',
            'create' => 'New Local Tipologium',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'local_id' => 'Local',
            'tipologia_clase_id' => 'Tipologia clase',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];