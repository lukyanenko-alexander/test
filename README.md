Установите необходимые библиотеки:
php composer.phar install

Создайте env файл на основе env.example и укажите настройки подключения с базой данных

Обновите кэш:
php artisan config:cache

Запустите миграции:
php artisan migrate

Вставьте данные:
php artisan db:seed

Запустите сервер:
php artisan serve
