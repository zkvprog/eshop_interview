# Installation & Setup

## 1. Install composer dependencies
`
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs
`

## 2. Start docker container
`
./vendor/bin/sail up -d
`

## 3. Run migration with seed
`
./vendor/bin/sail artisan migrate --seed
`

## 4. Install npm dependencies
`
./vendor/bin/sail npm install
`

## 5. Executing Node / NPM Commands
`
./vendor/bin/sail npm run dev
`

### In result the application will be accessible in your web browser at
[http://localhost/](http://localhost/)
