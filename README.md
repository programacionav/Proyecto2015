Aplicación Basada en Yii 2 Basic Application Template
================================
Sistema de Gestión para un Equipo de Desarrollo. Desarrollado por los alumnos de la materia Programación Web Avanzada de la Tecnicatura en Universitario en Desarrollo Web de la Universidad Nacional del Comahue. 1er Cuatrimestre 2014 

INSTALACIÓN
-----------
###Descargar el framework de https://github.com/yiisoft/yii2/releases/download/2.0.0-beta/yii-basic-app-2.0.0-beta.tgz

###Descomprimirlo en una carpeta pública del apache yii/YiiShePuede/

###Descargar los fuentes del presente repositorio y pisar el proyecto base.



BASE DE DATOS
-------------
Crear una Base de datos en base al archivo que esta en la carpeta /data del proyecto.

Editar el archivo `config/db.php` 

```php
return [
	'class' => 'yii\db\Connection',
	'dsn' => 'mysql:host=localhost;dbname=YiiShePuede',
	'username' => 'root',
	'password' => '1234',
	'charset' => 'utf8',
];
```
