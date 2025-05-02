all:
	@php artisan typescript:transform
	@./vendor/bin/pint
	@./vendor/bin/phpstan analyse -c phpstan.neon
