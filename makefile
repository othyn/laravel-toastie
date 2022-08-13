.PHONY: setup
setup: build composer-install

.PHONY: all
all: lint stan test

.PHONY: build
build:
	docker compose build

.PHONY: composer-install
composer-install:
	docker compose run --rm toastie-php composer install

.PHONY: lint
lint:
	docker compose run --rm toastie-php ./vendor/bin/pint

.PHONY: stan
stan:
	docker compose run --rm toastie-php ./vendor/bin/phpstan analyse

.PHONY: test
test:
	docker compose run --rm -e XDEBUG_MODE=coverage toastie-php ./vendor/bin/pest --coverage --min=100

.PHONY: shell
shell:
	docker compose run --rm toastie-php sh
