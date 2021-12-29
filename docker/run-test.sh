#!/bin/bash

. ./test/env.sh

{
docker-compose -f ./docker-compose-test.yml up -d

## Wait for postgres init
sleep 3s

docker-compose -f ./docker-compose-test.yml run weasel-php-test php bin/console --no-interaction doctrine:migrations:migrate
docker-compose -f ./docker-compose-test.yml run weasel-php-test php ./vendor/bin/phpunit
docker-compose -f ./docker-compose-test.yml down
} || docker-compose -f ./docker-compose-test.yml down