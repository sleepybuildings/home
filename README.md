# Home

## Building

Before building the docker images, add the following to the `.env` file for a raspberry pi:

```dotenv
MYSQL_IMAGE="arm64v8/mysql:8"
MYSQL_PLATFORM="linux/arm64/v8"
```

Otherwise, use

```dotenv
MYSQL_IMAGE="mysql/mysql-server:8.0"
MYSQL_PLATFORM="linux/amd64"
```

## Update

````shell
make pi
````
