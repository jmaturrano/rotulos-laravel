<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## ROTULOS LARAVEL en Laravel 5

Uso de DOMPDF para Laravel

## Instalación

Verificar previamente tener instalado composer. Descargar el proyecto.

- Instalar composer
- Descargar el proyecto
- Ejecutar el comando install para cargar las dependencias del proyecto

	composer install

- Crear su archivo .env y completar los accesos a su servidor

	DB_DATABASE=homestead
	DB_USERNAME=homestead
	DB_PASSWORD=secret

- Ejecutar el comando migrate y seed para cargar los datos en las tablas

	php artisan migrate:refresh --seed

La tabla productos se cargará a partir del archivo CSV ubicado en la dirección `/public/files/products.csv`. Cargar su archivo con la misma estructura de columnas.

- Ejecute el proyecto y disfrute

	```
	php artisan serve
	```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
