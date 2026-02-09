FROM php:8.2-cli-bookworm

RUN apt update && apt install -y \
    curl \
    git \
    unzip \
    libzip-dev \
    libxml2-dev \
    libsqlite3-dev \
    && docker-php-ext-install \
        bcmath \
        pdo \
        pdo_sqlite \
        zip \
    && docker-php-ext-enable \
        pdo_sqlite \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app