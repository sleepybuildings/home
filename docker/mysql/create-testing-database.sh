#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS $DB_DATABASE;
    GRANT ALL PRIVILEGES ON \`$DB_DATABASE%\`.* TO '$MYSQL_USER'@'%';
EOSQL
