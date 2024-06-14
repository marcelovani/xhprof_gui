#!make
include .env
export $(shell sed 's/=.*//' .env)

build:
	@make start
	@make npm-install
	@make db-import

start:
	@echo "Starting up containers for $(PROJECT_NAME)..."
	docker-compose pull
	docker-compose up -d --build --remove-orphans

stop:
	@echo "Stopping containers for $(PROJECT_NAME)..."
	@docker-compose stop

open:
	open ${PROJECT_BASE_URL}:${PROJECT_PORT}

in:
	docker-compose exec php bash

DB_CONN=mysql -h$${DB_HOST} -u$${DB_USER} -p$${DB_PASSWORD} $${DB_NAME}
db-drop:
	docker-compose exec php sh -c "echo truncate details | $(DB_CONN)"

db-install:
	docker-compose exec php sh -c "cat /database/install.sql | $(DB_CONN)"

db-dummy-data:
	docker-compose exec php sh -c "cat /database/dummy.sql | $(DB_CONN)"

sqlc:
	docker-compose exec php sh -c "$(DB_CONN)"
