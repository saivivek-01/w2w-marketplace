FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable mod_rewrite if needed
RUN a2enmod rewrite

# Copy everything (flat structure)
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80