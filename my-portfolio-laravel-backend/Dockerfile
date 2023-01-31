# ==== NodeJS =====
FROM node:18.12.1-alpine3.15 AS node

WORKDIR /app

# COPY ../package.json           /app
# # COPY ../package-lock.json      /app
# # COPY ../webpack.mix.js         /app
# COPY ../resources             /app/resources

COPY ./src/package.json         .
COPY ./src/package-lock.json    .
# COPY ../webpack.mix.js        /app
COPY ./src/resources            ./resources

RUN npm install && npm run dev


# ==== Custom Php+NGINX Image =====
# [Forked from fhsinchy/php-nginx-base to aid in creating custom php-nginx base image]
FROM fhsinchy/php-nginx-base:php8.1.3-fpm-nginx1.20.2-alpine3.15


# ==== Composer =====
# set composer related environment variables
# [Superuser to 1, allow to run composer as superuser without warning]
# [Dir, set installed packages to var/www/vendor instad of vendor directory]
# [Do this to prevent vendor directory from overwritten, some use bind mount. This way is move it out of project directory]
# [If use this way need to update artisan and public/index.php, optional (need more study to know why do this)]
ENV PATH="/composer/vendor/bin:$PATH" \
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_VENDOR_DIR=/var/www/vendor \
    COMPOSER_HOME=/composer

# install composer
# [install inside /usr/local/bin with filename composer]
# [instruction from: https://getcomposer.org/download/]
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --ansi --version --no-interaction

# install application dependencies
# [using downloaded composer to install depencies]
# [copy both composer.json & composer.lock to workdir ./ = workdir]
# [lastly composer install to install dependencies in composer.json]
# [--no-scripts = not execute any post-installation scripts, --no-autoloader = prevent composer from generating autoload file, since dont have application code yet]
WORKDIR /var/www/app
COPY ./src/composer.json ./src/composer.lock* ./
RUN composer install --no-scripts --no-autoloader --ansi --no-interaction
# ==== Composer END =====

# ==== Environment Variables for PHP-FPM =====
# add custom php-fpm pool settings, these get written at entrypoint startup
ENV FPM_PM_MAX_CHILDREN=20 \
    FPM_PM_START_SERVERS=2 \
    FPM_PM_MIN_SPARE_SERVERS=1 \
    FPM_PM_MAX_SPARE_SERVERS=3

# set application environment variables
# ENV APP_NAME="Question Board" \
#     APP_ENV=production \
#     APP_DEBUG=false
ENV APP_NAME="My Portfolio Backend" \
    APP_ENV=production \
    APP_DEBUG=false
# ==== Environment Variables for PHP-FPM END =====

# copy entrypoint files
# [docker-php-entrypoint, default location for entrypoint script is /usr/loca/bin/ so copying to this path will replace default one]
# dos2unix converts CRLF line endings to LF line ending
COPY ./docker/docker-php-* /usr/local/bin/
RUN dos2unix /usr/local/bin/docker-php-entrypoint
RUN dos2unix /usr/local/bin/docker-php-entrypoint-dev

# copy nginx configuration
COPY ./docker/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/default.conf /etc/nginx/conf.d/default.conf

# copy application code
# [composer dump-autoload = generate autoload file]
# [chown -R :www-data /var/www/app = change owner group to www-data]
# [chmod -R 775 /var/www/app/storage /var/www/app/bootstrap/cache = make storage and cache writable]
# [persmission changes are necessary: https://adevait.com/laravel/deploying-laravel-applications-virtual-private-servers]
WORKDIR /var/www/app
COPY ./src .
RUN composer dump-autoload -o \
    && chown -R :www-data /var/www/app \
    && chmod -R 775 /var/www/app/storage /var/www/app/bootstrap/cache

# Expose port
EXPOSE 80

# run supervisor
# [Sets default command of this image to the conf, which starts NGINX and PHP-FPM parallel]
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisord.conf"]