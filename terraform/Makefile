.PHONY: help
.PHONY: help

PROJECT_NAME ?= terraform
DOCKER_APP_IMAGE ?= ${PROJECT_NAME}-app

DIR := ${CURDIR}

.EXPORT_ALL_VARIABLES:
DOCKER_BUILDKIT = 1
COMPOSE_DOCKER_CLI_BUILD = 1

define docker_mounted_run_terraform
	docker run --rm \
		--env-file .env \
		--mount type=bind,source="${DIR}/",target="/app" \
		--entrypoint /bin/terraform \
        ${DOCKER_APP_IMAGE}:latest $(1)
endef

define docker_mounted_run_shell
	docker run --rm -it \
		--env-file .env \
		--mount type=bind,source="${DIR}/",target="/app" \
		--entrypoint /bin/sh \
        ${DOCKER_APP_IMAGE}:latest $(1)
endef

help:
	@echo "make build - Builds Terraform image"
	@echo "make init - Runs terraform init"
	@echo "make plan - Runs terraform plan -out terraform.plan"
	@echo "make apply - Runs terraform apply terraform.plan"
	@echo "make shell - Shell into Terraform container"
	@echo "make show - Runs terraform show"
	@echo "make version - Runs terraform version"

build:
	docker build \
		--tag ${DOCKER_APP_IMAGE}:latest \
		-f ./Dockerfile .

init:
	$(call docker_mounted_run_terraform,init)

shell:
	$(call docker_mounted_run_shell)

plan:
	$(call docker_mounted_run_terraform,plan -out "terraform.plan")

apply:
	$(call docker_mounted_run_terraform,apply "terraform.plan")

show:
	$(call docker_mounted_run_terraform,show)

version:
	$(call docker_mounted_run_terraform,version)

destroy:
	$(call docker_mounted_run_terraform,destroy)

destroy-force:
	$(call docker_mounted_run_terraform,destroy -auto-approve)

clean:
	@echo "Formatting files..."
	$(call docker_mounted_run,fmt)
	@echo "Validating files..."
	$(call docker_mounted_run,validate)
