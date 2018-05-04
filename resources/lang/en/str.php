<?php

return [


  'login' => [
    'icono'   => url('img/logo.png'),
    'titulo'  => 'Inicio de sesión',
    'fondo'   => url('img/background.jpg')
  ],

  //Capacitaciones -> menu 9
  'capacitaciones' => [
    'titulo' => 'Editar capacitación',
    'pestana1' => 'Temas',
    'pestana2' => 'Capacitación',
    'addDocument' => 'Agregar documento',
    'modifyTopic' => 'Editar tema',
    'addVideo' => 'Agregar video',
    'modifyQuiz' => 'Editar quiz',
    'deleteVideo' => 'Eliminar video',
    'deleteTopic' => 'Eliminar tema',
    'deleteDocument' => 'Eliminar documento',
    'deleteQuiz' => 'Eliminar quiz',
    'document' => 'Documento',
    'cancel' => 'Cancelar',
    'videoLink' => 'Link del video',
    'labelTittle' => 'Título',
    'description' => 'Descripción',
    'deleteTopicMessage' => '¿Desea eliminar este tema?',
    'confirm' => 'Confirmar',
    'deleteElementMessage' => '¿Desea eliminar este tema?',
    'modifyVideo' => 'Editar video',
    'image' => 'Imagen',
    'public' => 'Público',
    'placeHolder' => 'Por favor escribe algunas letras',
    'allowedUsers' => 'Usuarios permitidos',
    'allowedUser' => 'Usuario permitido',
    'id' => 'ID',
    'quit' => 'Quitar',
    'save' => 'Guardar',
    'noTopics' => 'No se encontraron temas, para agregar uno presione el botón +',
  ],




  'menu' => [




    'home' => [
      'titulo'  => 'Inicio',
      'url'     => url('inicio'),
      'icono'   => url('img/logo.png'),
    ],


    'general' => [
      'placeholder_buscar' => 'Buscar...'
    ],





    'menu_1' => [
      'titulo' => 'Usuarios',
      'url'    => url('usuarios'),
      'tabla'  => [
        'error'=> 'No hay datos',
        'col0' => 'Código',
        'col1' => 'Nombre',
        'col2' => 'Apellido Paterno',
        'col3' => 'Apellido Materno',
        'col4' => 'CURP',
        'col5' => 'Correo electrónico',
        'col6' => 'Teléfono',
        'col7' => 'Rol',
        'col8' => 'Puesto',
      ],
      'registro' => [
        'titulo' => 'Nuevo Usuario',
      ],
    ],

    'menu_2' => [
      'url'    => url('empresarios'),
      'tabla'  => [
        'error'=> 'No hay datos',
        'col0' => 'Código',
        'col1' => 'Nombre',
        'col2' => 'Apellido Paterno',
        'col3' => 'Apellido Materno',
        'col4' => 'CURP',
        'col5' => 'Correo electrónico',
        'col6' => 'Género',
        'col7' => 'Edad',
        'col8' => 'Fecha de registro',
        'col9' => 'Editar',
        'col10' => 'Eliminar',
      ],
    ],




    'menu_servicios' => [
      'titulo' => 'Servicios',
      'url'    => url('servicios'),
      'tabla'  => [
        'error'=> 'No hay datos',
        'col0' => 'ID',
        'col1' => 'Fecha inicio',
        'col2' => 'Área',
        'col3' => 'Ejecutivo de atención',
        'col4' => 'Joven Atendido',
        'col5' => 'Curp',
        'col6' => 'Email',
        'col7' => 'Título',
        'col8' => 'Editar',
        'col9' => 'Eliminar',
      ],
    ],





    'menu_3' => [
      'titulo' => 'Eventos',
      'url'    => url('eventos/inicio'),
      'tabla'  => [
        'error'=> 'No hay datos',
        'col0' => 'Título',
        'col1' => 'Descripción',
        'col2' => 'Inicia',
        'col3' => 'Termina',
        'col4' => 'Estadísticas',
        'col5' => 'Editar',
        'col6' => 'Eliminar',
      ],
      'detalles' => [
        'titulo' => 'Evento :nombre',
        'tabla' => [
          'titulo' => 'Lista de asistentes',
          'error' => 'No hay datos',
          'col0' => '#',
          'col1' => '',
          ]
      ],
    ],



    'menu_4' => [
      'titulo' => 'Publicidad',
      'url'    => url('publicidad'),
      'tabla' => [
          'col0' => 'ID',
          'col1' => 'Título',
          'col2' => 'Descripción',
          'col3' => 'Enlace',
          'col4' => 'Fecha inicio',
          'col5' => 'Fecha fin',
          'col6' => 'Estadísticas',
          'col7' => 'Editar',
          'col8' => 'Eliminar',
      ]
    ],









    'menu_5' => [
      'titulo' => 'Convocatorias',
      'url'    => url('convocatorias'),
    ],










    'menu_6' => [
      'titulo' => 'Promociones',
      'url'    => url('empresas'),
    ],









    'menu_7' => [
      'titulo' => 'Notificaciones',
      'url'    => url('notificaciones'),
    ],










    'menu_8' => [
      'titulo' => 'Chat',
      'url'    => url('chat'),
    ],





      'menu_9' => [
          'titulo' => 'Capacitaciones',
          'url'    => url('capacitaciones'),
          'tabla'  => [
            'error'=> 'No hay datos',
            'col0' => 'Título ',
            'col1' => 'Descripción',
            'col2' => 'Inscritos',
            'col3' => 'Aprobados',
            'col4' => 'Estadísticas',
            'col5' => 'Editar',
            'col6' => 'Eliminar',
          ],
      ],

      'menu_10' => [
          'titulo' => 'Listas control de acceso',
          'url'    => url('listascontrolacceso'),
          'tabla'  => [
            'error'=> 'No hay datos',
            'col0' => 'Título',
            'col1' => 'Fecha Inicio',
            'col2' => 'Fecha Fin',
            'col3' => 'Estadisticas',
            'col4' => 'Editar',
            'col5' => 'Eliminar',
          ],
          'deleteMessage' => 'Desea eliminar esta lista?'
      ],





    'cerrar' => [
      'titulo' => 'Cerrar sesión',
      'url'    => url('usuarios/logout'),
    ],



  ]

];
