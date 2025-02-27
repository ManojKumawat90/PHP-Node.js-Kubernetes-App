FROM php:8.1-fpm

# Install Nginx
RUN apt-get update && apt-get install -y nginx && apt install net-tools

# Copy application files
COPY index.php /var/www/html/
COPY styles.css /var/www/html/
COPY script.js /var/www/html/

# Set permissions
RUN chmod -R 755 /var/www/html/

# Copy Nginx config
RUN rm /etc/nginx/sites-enabled/default
COPY default.conf /etc/nginx/conf.d/default.conf

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "service nginx start && exec php-fpm"]
