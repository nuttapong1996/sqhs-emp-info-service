# Stage 1: Build PHP dependencies ด้วย Composer
FROM composer:2 AS vendor
WORKDIR /app
COPY database/ database/
COPY composer.json composer.lock ./
# ติดตั้ง package โดยละเว้น dev requirement และ platform req ชั่วคราว
RUN composer install --no-dev --ignore-platform-reqs --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Stage 2: Build Frontend assets ด้วย Node.js
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .

COPY --from=vendor /app/vendor/ ./vendor/

RUN npm run build

# Stage 3: Production Image (ใช้ PHP 8.3 FPM)
FROM php:8.3-fpm-alpine
WORKDIR /var/www/html

# ติดตั้ง System Dependencies และ PostgreSQL extension
RUN apk add --no-cache libpq-dev postgresql-client tzdata icu-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql intl

# Copy source code ของโปรเจกต์
COPY . .

# Copy vendor จาก Stage 1
COPY --from=vendor /app/vendor/ ./vendor/

# Copy public/build (Vite assets) จาก Stage 2
COPY --from=frontend /app/public/build/ ./public/build/

# ตั้งค่าสิทธิ์โฟลเดอร์ให้ Nginx/PHP-FPM เขียนได้
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# ก๊อปปี้ไฟล์ entrypoint เข้าไปและให้สิทธิ์รัน (execute)
COPY docker/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]