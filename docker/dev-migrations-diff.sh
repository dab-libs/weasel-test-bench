#!/bin/bash
docker exec -it weasel-php php bin/console doctrine:migrations:diff
