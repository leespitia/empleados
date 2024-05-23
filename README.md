## Prerequisitos y versiones

- Apache 2.4
- PHP >= 8.3.6
- MySQL 8.3
- Laravel 10.48.11
- Composer 2.7.6

## Configuracion Laravel

- Panel de administracion AdminLTE

Este Panel de administracion proporciona una plantilla para el panel de administracion de la aplicacion. Utiliza Bootstrap, JQuery

- Laravel Spatie

Paquete de administracion de permisos y roles para los usuarios.

## Desarrollo

- Diseño base de datos. Se adjunta modelo ER en la carpeta **docs**, en formato Mysql Workbench y PDF. 

- Se crearon las respectivas migraciones para la implementación de la base de datos correspondiente al diseño propuesto.

- Se alimentan los Seeders para el cargue de datos de prueba inicial.

- Se procede a crear el módulo Autorizaciones, el cual corresponde al sistema de usuarios, permisos, registro.

- Se crea el CRUD de Empleados y Departamentos.

## Despliegue

- Crear una base de datos MySQL

- Clonar el repositorio

$ git clone https://github.com/leespitia/empleados.git

- Instalar las dependencias

$ composer install

- Ajustar las variables de entorno en el archivo .env, nombre de la base de datos, usuario y contraseña

- Generar llave de seguridad

$ php artisan key:generate

- Ejecutar migraciones

$ php artisan migrate

- Ejecutar Seeders para alimentar datos de prueba

$ php artisan db:seed

- Si se despliega desde Apache, crear un VirtualHost para la carpeta public del proyecto, o si se despliega desde el servidor de pruebas de Laravel, ejecutar el comando

$ php artisan serve

## Datos de prueba de acceso

Acceder a la URL en el servidor de pruebas e ingresar los sigueintes datos:

- Usuario: leespitia@gmail.com
- Clave: 123123

## Observaciones

- Se desarrollaron la mayor cantidad de opciones posibles, teniendo en cuenta que se desarrollo todo el sistema de Permisos, Menus y Usuarios.

- Para lograr resultados en un menor tiempo, se puede utilizar una paquete como Open Admin https://open-admin.org/