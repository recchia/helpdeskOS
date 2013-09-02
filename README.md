Helpdesk Open Source
========================

Este proyecto tiene como objetivo la creación de un software para helpdesk 
sencillo y libre.

Esta siendo desarrollado en Symfony 2.2.x utilizando varios bundles y frameworks 
con trayectoria en css y javascript.

1) Instalación y configuración
------------------------------

Como puedes ver en la documentación de Symfony Standard Edition, tienes que 
cumplir con algunos requerimientos en tu maquina para la instalación y su 
correcto funcionamiento.

### Composer

El framework utiliza [Composer][1] para administrar sus dependencias, y será 
necesario tenerlo en tu equipo para poder instalar correctamente el software.

Si aun no tienes Composer, descargalo siguiendo las instrucciones en
http://getcomposer.org/ o ejecuta el siguiente comando:

    curl -s http://getcomposer.org/installer | php

Luego, usaremos el siguiente comando para descarga el código de la aplicación:

    git clone https://github.com/recchia/helpdeskOS.git ruta/del/proyecto

Esto creara una copia del proyecto en el directorio `ruta/del/proyecto`. Si 
lo prefieres puedes hacer un fork para contribuir al proyecto.

### Instalación

El siguiente paso sera instalar las dependencias del proyecto mediante el 
comando:

    php composer.phar install

### Configuración

Luego configurar las datos de acceso a la base de datos, esto lo puedes hacer 
en el archivo parameters.yml en app/config o o si lo prefieres en el navegador 
escribiendo la url http://helpdesk/app_dev.php/_configurator (Se asume la 
creación de un dominio helpdesk en este caso)

El siguiente paso es crear la base de datos y el schema mediante los comandos:

    php app/console doctrine:database:create

    php app/console doctrine:schema:create

Seguidamente creamos un usuario para acceder a la aplicación:

    php app/console fos:user:create admin admin@admin.com admin --super-admin

2) Ver la aplicación
--------------------

Estamos listos para probar la aplicación.

Tendremos 2 url de acceso, una al panel de administración y una a la aplicación 
en si:

Url de la aplicación

    http://helpdesk/app_dev.php/

Url del panel de adminisración

    http://helpdesk/app_dev.php/admin/dashboard

Componentes
-----------

Los componentes utilizados son:

  * [**FOSUserBundle**][2] - Bundle para la administración de usuarios

  * [**SonataAdminBundle**][3] - Bundle para generar backends

  * [**Bootstrap**][4] - Framework CSS creado por twitter

  * [**JQuery**][5] - Framework Javascript

Saludos!

[1]:  http://getcomposer.org/
[2]:  https://github.com/FriendsOfSymfony/FOSUserBundle
[3]:  https://github.com/sonata-project/SonataAdminBundle
[4]:  http://twitter.github.com/bootstrap/
[5]:  http://jquery.com/
