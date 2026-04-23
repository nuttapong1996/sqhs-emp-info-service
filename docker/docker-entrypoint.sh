#!/bin/sh

# สร้างโฟลเดอร์ที่จำเป็น (ถ้ามันยังไม่มี)
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/app/public

# ตั้งค่าสิทธิ์ให้ www-data (UID 82)
chown -R www-data:www-data /var/www/html/storage
chmod -R 775 /var/www/html/storage

# ส่งต่อคำสั่งรัน Service หลัก (php-fpm)
exec "$@"