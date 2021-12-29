#!/bin/bash

cat ./yandex_key.json | docker login --username json_key --password-stdin cr.yandex/crp0br64q3cqvuu8u318

. ./test/env.sh

docker-compose -f ./docker-compose-test.yml build --pull