reinstall-db:
	bin/console doctrine:database:drop -f --if-exists
	bin/console doctrine:database:drop -f --env=test --if-exists

	bin/console doctrine:database:create
	bin/console doctrine:database:create --env=test

diff:
	bin/console doctrine:migrations:diff

mig:
	bin/console doctrine:migrations:migrate
	bin/console doctrine:migrations:migrate --env=test

fixtures:
	bin/console doctrine:fixtures:load -n --group 'Required'
	bin/console doctrine:fixtures:load -n --env=test --group 'Required'

fixtures-demo:
	bin/console doctrine:fixtures:load -n --group=Required --group=Demo

test:
	php bin/phpunit

analyse:
	php bin/phpunit

make commit:
	git add .
	@echo "Commit message?: "; \
    read AGE; \
	git commit -m "$$AGE"
	git push origin main