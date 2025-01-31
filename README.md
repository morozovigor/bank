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


Запросы к апи:

1. Необходим Bearer токен. Лежит в .env файле

**PATCH /api/users/{id}/** - Обновление пользователя

Пример тела запроса:

`{
  "name": "Igor",
  "email": "email@example.com",
  "age": 10
}`

**POST /api/users/{id}/deposit** - Пополнение баланса

Пример тела запроса:

`{
  "amount": 10.1
}`

**POST /api/transfer** - Перевод средств между пользователями

Пример тела запроса:

`{
    "from_user_id": "9e184f75-3c86-4b29-b447-a453b889d6d9",
    "to_user_id": "9e184f75-465e-46e5-8844-88b9c3740b57",
    "amount": 3.39
 }`