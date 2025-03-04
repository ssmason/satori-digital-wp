
# Satori Digital - WordPress build

## 📌 Description

**Satori Digital** is a wordpress theme built to deliver the satori website
 
# Deploy Wordpress on Localhost
You can automatically deploy a local docker wordpress site in 5 minutes
using the following commands:

``` bash
cd wp-satori-digital
composer install # Install theme and plugins
docker compose up -d # Build and start installation

```

**Useful set of commands to know**:

``` bash
# Stop and remove containers
docker-compose down
# Build, and start the wordpress website
docker-compose up -d --build
# Reset everything
docker-compose down
rm -rf certs/* certs-data/* logs/nginx/* mysql/* wordpress/*
```

