all:
	@./vendor/bin/phpstan analyse -c phpstan.neon
	@./vendor/bin/pint
