
# Satori Digital - WordPress build

## 📌 Description

**Satori Digital** is a wordpress theme built to deliver the satori website
 
# Clone the repo
Clone the repository 
``` bash
git clone https://github.com/ssmason/satori-digital-wp.git wp-satori-digital # Build and start installation

```
# Initialise build with composer and start up docker
``` bash
cd wp-satori-digital
# Install theme and plugins
composer install 
 # Build and start installation
docker compose up -d

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

# Deploy Wordpress on Localhost and in Production using Docker Compose

Related blog post:

  - [WordPress Local Development Using Docker
    Compose](https://www.datanovia.com/en/lessons/wordpress-local-development-using-docker-compose/):
    Deploy Wordpress on localhost using docker
  - [Docker WordPress Production
    Deployment](https://www.datanovia.com/en/lessons/docker-wordpress-production-deployment/):
    Step-by-step guide to deploy WordPress online using docker-compose
  - [Using Docker WordPress Cli to Manage WordPress
    Websites](https://www.datanovia.com/en/lessons/using-docker-wordpress-cli-to-manage-wordpress-websites/):
    Commande line interface for managing a WordPress website

The installation tool kit, provided here, include:

  - Nginx web server
  - MariaDB/MySQL used for Wordpress database
  - phpMyAdmin interface to connect to your MySQL database
  - WP-Cli: Wordpress Command Line Interface
  - Makefile directives for automatization.

You can automatically deploy a local docker wordpress site in 5 minutes
using the following commands:
