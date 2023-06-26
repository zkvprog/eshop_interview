# Installation & Setup

### Install composer dependencies
`
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs
`

### Start docker container
`
./vendor/bin/sail up -d
`

### Run migration with seed
`
./vendor/bin/sail artisan migrate --seed
`

### Install npm dependencies
`
./vendor/bin/sail npm install
`

### Executing Node / NPM Commands
`
./vendor/bin/sail npm run dev
`
