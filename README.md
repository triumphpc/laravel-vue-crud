### Laravel + Vue CRUD service example

Implement example service for Laravel 9 + Vue 2.6 implementation CRUD service.
Include several Vue components for example. 
Application implemented on docker images, you can see instruction how to install below.

1. BACK part - implement on Laravel, standard layout MVC. Here use Controllers and Model for back logic. src/app
2. FRONT part - implement standard layout, source in src/resources

### Application contain logic
1. List of products
2. Create, Update, Delete product 
3. Auth by default user: admin/123

### Install with Docker
- docker-compose up -d
- docker-compose run --rm server_service  php /var/www/artisan key:generate
- Check in DB "laravel" database 
- Setup .env for Laravel:
````  
DB_CONNECTION=mysql
DB_HOST=mysql_service
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
````
- docker-compose run --rm server_service php /var/www/artisan migrate 
- Open localhost:80



### Tips
```
- docker-compose run --rm server_service php /var/www/artisan route:clear (clear laravel routes)
- docker-compose run --rm server_service php /var/www/artisan jwt:secret (kwt auth secret generator)
```