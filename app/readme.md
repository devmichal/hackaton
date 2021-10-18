To get into php container:

    docker exec -it php-fpm /bin/bash

Install all libraries:

    composer install --dev

Create jwt hash:

    openssl genrsa -out config/jwt/private.pem -aes256 x4096
      
    openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem

For testing app in docker run:

    ./vendor/bin/phpunit

Analyse clear code

    vendor/bin/phpstan analyse src