DOCKER_COMPOSE := docker compose exec laravel.test

# ══ WSL ═══════════════════════════════════════════

all:
	@php artisan typescript:transform
	@./vendor/bin/pint
	@./vendor/bin/phpstan analyse -c phpstan.neon

setup-wsl:


# ══ PI ════════════════════════════════════════════

pi:
	@git pull --ff-only
	@$(DOCKER_COMPOSE) composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs
	@$(DOCKER_COMPOSE) php artisan optimize
	@$(DOCKER_COMPOSE) php artisan migrate --force
	@$(DOCKER_COMPOSE) php artisan db:seed --force
	@$(DOCKER_COMPOSE) npm install --no-dev
	@$(DOCKER_COMPOSE) npm run build
