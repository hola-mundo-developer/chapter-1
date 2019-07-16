# VARIABLES

IMAGE := php-simple-chapter
CONTAINER_NAME := php-chapter-1
WORKDIR := /app

# SCRIPTS

build:
	docker build -t $(IMAGE) .

bash:
	docker run --rm -it --name $(CONTAINER_NAME) -v $(PWD):$(WORKDIR):delegated -w $(WORKDIR) $(IMAGE) /bin/bash

install:
	docker run --rm --name $(CONTAINER_NAME) -v $(PWD):$(WORKDIR):delegated -w $(WORKDIR) $(IMAGE) composer install

test:
	docker run --rm --name $(CONTAINER_NAME) -v $(PWD):$(WORKDIR):delegated -w $(WORKDIR) $(IMAGE) php ./vendor/bin/phpunit --do-not-cache-result --filter="${ARGS}"

tests:
	docker run --rm --name $(CONTAINER_NAME) -v $(PWD):$(WORKDIR):delegated -w $(WORKDIR) $(IMAGE) php ./vendor/bin/phpunit --do-not-cache-result ${ARGS}

# CONFIGS

.PHONY: test tests
