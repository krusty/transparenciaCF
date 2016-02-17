# Portal Transparencia - CIUDAD FUTURA

1) Copiar el archivo .env.example a .env, y editar los datos de
conexión (la base de datos debe crearse manualmente).

2) Ejecutar los comandos:

    composer install
    php artisan key:generate
    php artisan panel:install
    php artisan migrate
    php artisan db:seed

3) Para ejecutar la aplicación

    php artisan serve
