# Dockerfile
FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    zip \
    libzip-dev \
    && docker-php-ext-install zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Create app directory
WORKDIR /var/www/html

# Copy app
COPY . .

# Install Jigsaw
RUN composer global require tightenco/jigsaw

# Make global composer bin available
ENV PATH="/root/.composer/vendor/bin:$PATH"

# Build site
RUN jigsaw build production

CMD ["php", "-S", "0.0.0.0:8000", "-t", "build_local"]

