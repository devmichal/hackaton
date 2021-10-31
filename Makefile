shell:
	docker exec -it php-fpm-hack /bin/sh

test:
	./vendor/bin/phpunit

cache:
	php bin/console cache:clear

reload-nginx:
	docker exec -it nginx-hack nginx -s reload