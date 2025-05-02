all:
	@./vendor/bin/pint
	@./vendor/bin/phpstan analyse -c phpstan.neon
