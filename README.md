# Instrucciones para levantar el proyecto Laravel

## Requisitos previos

### Asegúrate de tener instalados los siguientes requisitos en tu máquina:

- PHP >= 8.2
- Composer
- MySQL

## Clonar el repositorio

### Clona el repositorio del proyecto:

git clone https://github.com/caholguin/prueba-tecnica.git

## Instalar dependencias

### Accede al directorio del proyecto o abre el proyecto en un editor de codigo de tu preferencia e instala las dependencias de PHP utilizando Composer ejecutando el siguiente comando:

- cd prueba-tecnica
- composer install

## Configuración de la base de datos

### 1- Crea una base de datos en MySQL:

- CREATE DATABASE nombre_base_de_datos;

### 2- Configura las credenciales de la base de datos en el archivo .env:

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=nombre_base_de_datos
- DB_USERNAME=tu_usuario
- DB_PASSWORD=tu_contraseña


### 3- Ejecuta las migraciones para crear las tablas en la base de datos:

php artisan migrate

## Levanta el servidor

php artisan serve

