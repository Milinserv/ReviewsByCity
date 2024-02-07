#!/bin/bash
set -o pipefail

echo "Введите логин пользователя БД:"
read -s USER

echo "Подключение к БД"
mysql -u $USER -p basic < ./migrations/sql/city.sql
if [[ $? -eq 0 ]]; then
  echo "Дамп успешно установлен"
else
  echo "Дамп не установлен"
fi