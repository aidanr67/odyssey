FROM php:8.1-fpm

ENV HOME=/var/www/odyssey

WORKDIR ${HOME}

# match php user to local user permission on the volume.
RUN usermod -u 503 www-data

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory permissions
COPY --chown=www-data . ${HOME}

# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Publish livewire assets to the public directory
RUN php artisan livewire:publish --assets

RUN mkdir -p storage/logs && chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# Change current user to www-data
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
