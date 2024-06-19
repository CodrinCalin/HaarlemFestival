FROM php:fpm

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install additional dependencies for Composer
RUN apt-get update && \
    apt-get install -y wget curl git zip unzip && \
    rm -rf /var/lib/apt/lists/*

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dotenv
RUN composer global require vlucas/phpdotenv:^5.4

WORKDIR /app