Тестовое задание на Laravel 
======================


### При развороте:

Создаём дубликат **include/app_config.default.php** с именем **app_config.php**
Создаём дубликат **include/db_config.default.php** с именем **db_config.php**

### Параметры сервера:
*  PHP 7.4
*  mysql 5.7

### сборка:
*  `composer install`

### Сборка через Docker

1. `cp .env.example .env`
2. указать настроки подключения к БД для механизма миграций в файле

### Управление

* `php artisan serve` - Запуск приложения
* `php artisan migrate` - Применить миграции
