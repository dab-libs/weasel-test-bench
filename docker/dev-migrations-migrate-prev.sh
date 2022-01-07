#!/bin/bash
docker exec -it sprut-php-dev php bin/console doctrine:migrations:migrate prev
