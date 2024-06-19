# Festival Web application
This is a docker PHP project based around Haarlem Festival for Inholland University.

It contains a docker configuration with:
* NGINX webserver
* PHP FastCGI Process Manager with PDO MySQL support
* MariaDB (GPL MySQL fork)
* PHPMyAdmin

## Installation

### Startup

1. Install [Docker Desktop](https://www.docker.com/products/docker-desktop/).
2. Clone the project
3. At the root of the project, open a terminal and run:
```bash
docker-compose up --build
```
4. You can open http://localhost for the main page or localhost:8080 (PHPMyAdmin Database access)

### Close project

If you want to stop the containers, press Ctrl+C. 
Or run:
```bash
docker-compose down
```

### Testing Payment

1. First setup Stripe login in local environment, open another terminal and type:
```bash
docker run --rm -it stripe/stripe-cli login
```
2. 

## Login Credentials

Accounts available:

#### Admin - for editing pages, editing user credentials

* **Username:** _admin_
* **Password:** _admin_
