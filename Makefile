.PHONY: build
build:
	docker build -t limited-public-profile-web:15.2 ./docker/nginx
	docker build -t limited-public-profile-php:8.3 ./docker/php
	docker build -t limited-public-profile-db:16 ./docker/postgresql

.PHONY: up
up:
	docker compose up -d

.PHONY: down
down:
	docker compose down
