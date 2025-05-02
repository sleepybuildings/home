DOCKER_COMPOSE := docker compose exec laravel.test

all:
	@php artisan typescript:transform
	@./vendor/bin/pint
	@./vendor/bin/phpstan analyse -c phpstan.neon

pi:
	@git pull --ff-only
	@$(DOCKER_COMPOSE) php artisan optimize
	@$(DOCKER_COMPOSE) php artisan db:seed --force
	@$(DOCKER_COMPOSE) php artisan migrate --force
	@$(DOCKER_COMPOSE) npm run build
