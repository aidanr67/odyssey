.PHONY: help build up down logs shell sync-local

DOCKER_APP_IMAGE = odyssey-app
DOCKER_NODE_IMAGE = odyssey-node

help: ## Show this help message
	@echo "Available make commands:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-15s\033[0m %s\n", $$1, $$2}'

define sync_local
	@echo "Syncing local environment with Docker containers..."
	@docker run --name temp-odyssey-app $(DOCKER_APP_IMAGE) php artisan inspire
	@docker cp temp-odyssey-app:/var/www/odyssey/vendor ./vendor
	@docker cp temp-odyssey-app:/var/www/odyssey/composer.lock ./composer.lock
	@docker stop temp-odyssey-app
	@docker rm temp-odyssey-app

	@echo "Syncing local environment with Docker containers for Node..."
	@docker run --name temp-odyssey-node -d $(DOCKER_NODE_IMAGE) sleep infinity
	@docker cp temp-odyssey-node:/var/www/odyssey/node_modules ./node_modules
	@docker cp temp-odyssey-node:/var/www/odyssey/package-lock.json ./package-lock.json
	@docker stop temp-odyssey-node
	@docker rm temp-odyssey-node
endef

build: ## Builds the app container image
	docker build \
		--platform linux/amd64 \
		--tag ${DOCKER_APP_IMAGE}:latest \
		-f deploy/app/Dockerfile .
	docker build \
    		--platform linux/amd64 \
    		--tag ${DOCKER_NODE_IMAGE}:latest \
    		-f deploy/node/Dockerfile .
#	$(call sync_local)

up: ## Start the containers using docker-compose
	docker-compose up

down: ## Stop and remove the containers defined in docker-compose
	docker-compose down

logs: ## Display the logs for the containers
	docker-compose logs

shell: ## Connect to the shell on the app container
	docker exec -u root -it odyssey-app bash

.DEFAULT_GOAL := help
