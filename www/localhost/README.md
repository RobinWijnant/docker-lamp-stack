# Lamp stack using docker-compose

A 2018 updated lamp stack using docker-compose v3.

## Features

* Apache 2
    * Config file available
    * Vhost support
* PHP 7
    * php.ini file available
    * PDO_MYSQL extension
    * XDebug extension
    * ImageMagick extension
* MySQL 8
    * Config file available
    * Execute SQL on build
* phpMyAdmin
    * Config file available

## Requirements

Docker Engine 1.13.0+ (support for docker-compose v3)

## Installation

Clone the repository:

```Shell
git clone https://github.com/RobinWijnant/docker-lamp-stack.git
```

Execute in the root of the repository:

```Shell
docker-compose up -d
```

**Note:** Warnings that occur during the docker build are related to the image, not to this lamp stack.

## Usage

### MySQL

When installed, MySQL 8 uses by default the caching_sha2_password plugin. This requires SSL/TLS. A valid SSL certificate on localhost is not possible. This is why this MySQL container is setup to use mysql_native_password authentication by default.

Normal mysql_native_password authentication:

```Shell
username: root
password: root (.env)
```

caching_sha2_password authentication:

```Shell
username: root_sha2
password: root
```

PhpMyAdmin is available on: [http://phpmyadmin.localhost](http://phpmyadmin.localhost)

### Sending mail

It is recommended to use PHP Mailer (available through composer) to send mails in PHP. You can check out this [example](/www/localhost/tests/mailer.php). A live test is available on [http://localhost/tests/mailer.php](http://localhost/tests/mailer.php)

## Configuration

Basic settings can be changed in [`.env`](/.env). All services are also configurable through an additional config file for each service. These additional config files only require a restart of the containers in order to take effect.

### Making a virtualhost

Add the following line to [`/webserver/apache/vhosts.conf`](/webserver/apache/vhosts.conf) and create a new folder `/www/example.localhost`

```ApacheConf
Use VHost example.localhost
```

**Note:** Using *.localhost is recommended because it does not require to add an entry in the hosts file of your PC. Other domains like example.com work as well after modifying your hosts file.

### Configure Visual Studio Code for PHP Debugging

1. Install [PHP Debug Extension](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) by Felix Becker.

2. Download PHP on your host machine.

3. Set the path to the executable. For example:
    ```Json
    "php.validate.executablePath": "C:\\php-7\\php.exe",
    ```

**Note:** A seperate php version on the host machine is nessecary for PHP linting in VS Code. It is not a good solution but it is the only way to have linting.

### Bash cli on a service

```Shell
docker-compose exec webserver sh
```

All service names:

* webserver
* mysql
* phpmyadmin