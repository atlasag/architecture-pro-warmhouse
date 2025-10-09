# Простейший базовый образ CLI
FROM php:8.2-cli

# Рабочая директория
WORKDIR /var/www/html

# Копируем файлы
COPY . /var/www/html

# Открыть порт
EXPOSE 8081

# Запуск встроенного web-сервера PHP на локальноым порту 8081
CMD ["php", "-S", "0.0.0.0:8081", "index.php"]