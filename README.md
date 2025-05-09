## Installation

### Docker
 - Создайте .evn и скопируйте всё из .env.example,
 - Измените значение DOCKER_USER,
 - Для работы Docker необходим traefik (дефолтный домен test-moonshine.docker.dev)
 - Для работы картинок необходим minio 

**Settings.**

В .env.example измените
```
DOCKER_USER=laravel #OS user
LOCAL_WEB_PORT=80
LOCAL_MYSQL_PORT=3306
LOCAL_REDIS_PORT=6379
```

Параметры базы данных. База - moonshine-test-db
Default:
```
DB_DATABASE=moonshine_demo
DB_USERNAME=moonshine_demo
DB_PASSWORD=12345
```

### Manually
- Запускаем проект
- Выполняем composer install
- Добавляем .env and configure
- Выполняем php artisan key:generate
- Выполняем php artisan storage:link
- Выполняем php artisan migrate --seed
- Переходим в проект/admin