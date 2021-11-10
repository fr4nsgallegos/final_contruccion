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

    // Do not delete me :) I'm used for auto-generation
];