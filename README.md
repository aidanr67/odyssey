# Odyssey

## A web app that spits out random pages of Homer's Odyssey.

### Getting started

1. Copy env file: `cp .env.example .env` and update it if necessary but the defaults should suffice for local work.
2. Build the containers: `make build`
3. Run the containers: `make up`
4. Run migrations: `make shell` followed by `php artisan migrate`
5. Seed the database: `make seed-db`

### Running tests

Unit and integration test can be run with `make test`

### Auth
While currently not used for the app there is an Auth0 auth server. See `terraform/readme.md`
