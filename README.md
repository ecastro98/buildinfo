# Buildinfo

Run `docker-compose up` to start the docker containers.

### Run migrations and seeds

1. Run `docker-compose exec php php artisan migrate`
2. Run `docker-compose exec php php artisan db:seed`

### Web local url
Once docker containers are up, you can enter the page in http://localhost:8080
