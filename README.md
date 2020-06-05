## Setup domain
In /etc/hosts write next line: \
127.0.0.1 docker.test.com

## .env parameters
APP_ENV=dev \
APP_SECRET=728cdb1cc33661d25d08b49ce822e3d6 \
DATABASE_URL=mysql://test:test@mysql:3306/test?serverVersion=5.7

## Run project
docker-compose up -d

## Up migrations
docker exec -i test-php bin/console doctrine:migrations:migrate