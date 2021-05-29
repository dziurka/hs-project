#!/bin/bash
set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE USER hstest WITH ENCRYPTED PASSWORD 'hstest';

    CREATE DATABASE hs_test;
    CREATE DATABASE hs_dev;

    GRANT ALL PRIVILEGES ON DATABASE hs_test TO hstest;
    GRANT ALL PRIVILEGES ON DATABASE hs_dev TO hstest;
EOSQL
