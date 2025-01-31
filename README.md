# bank

Тестовое задание.

Сервис: БО Банк

Требуется простая версия АПИ сервиса, для управления пользователями и переводами средств между их аккаунтами. “БО Банк” должен включать в себя методы:
- Обновления пользователя (name, email, age)
- Пополнение баланса пользователя. Отрицательный баланс не может существовать
  -Перевода средств между пользователями

Для работы использовать:
- DB Postgres
- Laravel framework

Запуск приложения:

1. Копируем .env.example в .env
2. Запускаем docker-compose up
3. Запускаем миграции docker-compose exec php-fpm php artisan migrate
4. Запускаем сидер docker-compose exec php-fpm php artisan db:seed --class=UserSeeder
5. Запускаем сервер docker-compose exec php-fpm php artisan serve --host=0.0.0.0 --port=8000
