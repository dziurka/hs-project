# HS Project
This is a simple project based on Laravel 8 and PHP 8 that allows you 
to import Star Wars characters by communicating with an external API - [swapi.dev](https://swapi.dev). 

Once the characters are saved in the database, we can display them through our internal API.

The application has a basic authentication mechanism based on [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum) package.

The application architecture is domain-oriented.

## Development
### Stack

- PHP 8.0
- Laravel >= 8.x
- PostgreSQL >= 13.x
- docker && docker-compose

### Installation

Configure your local environmental variables, such as the access data to the postgres database instance
or xdebug connection parameters in the _.env_ file.

```bash
$ cp .env.example .env
$ cp docker/.env.example docker/.env
```

Clone the repository and inside `docker` directory type:

```bash
$ docker-compose up -d
```

Install necessary dependencies and migrate the database

```bash
$ docker-compose exec hs_app bash
$ composer install && php artisan migrate
```

Docker provides us few endpoints:

- _http://localhost:8000_ - hs backend app
- _http://localhost:8080_ - adminer tool for database management
- _http://localhost:8085_ - mailnag front tool to check sent mails
- _http://localhost:8000/telescope_ - telescope debugging tool



### Code formatting

The code written in PHP should be written in accordance with PSR standards.

## Documentation

### Available Commands

In `hs_app` container:
- `artisan` - alias for `php artisan`
- `artisan hs:import` - import people and films from swapi.dev

### Available Endpoints

The `hs_insomnia.json` file contains a backup of the endpoint collection from the [Insomnia app](https://insomnia.rest).
An additional plugin is required - [laravel csrf](https://insomnia.rest/plugins/insomnia-plugin-laravel-csrf).

#### General
- `GET /csrf-cookie` - csrf token (must be done before first POST request)
- `GET /echo` - test endpoint

#### Auth
- `POST /auth/register` - user registration
  - required fields: _name_, _email_, _password_, _password_confirmation_
- `POST /auth/login` - user login
    - required fields: _email_, _password_
- `POST /auth/logout` - logging out the user
    - no body

#### User
- `GET /user/me` - returns logged in user

#### StarWars
- `GET /sw/people` - returns star wars characters (swapi.dev)
    - returns also related movies
    - pagination support (`?page=2` etc)
    - support for filters and sorting according to the json api standard, eg:
        - `?filter[name]=skywalker`
        - `?filter[name]=skywalker&filter[gender]=female`
        - `?filter[name]=skywalker&sort=-name`

### Authentication

Authentication in HS Project is based on the official Laravel Sanctum package 
with cookie-based session mechanism.

#### Required headers
 - `Content-Type: application/json`
 - `Accept: application/json`
 - `Referer: http://localhost:4200/` (or another SPA application URL defined in the `.env` file)
 - `X-XSRF-TOKEN: some_token_from_cookie` (previously requested csrf token)

