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

## Testing:

### Shopping cart:

###### In case ticket adding to cart doesn't work from individual pages, you can go to these pages for working adding of tickets 

* [All tickets](http://localhost/ticket)
* [Yummy tickets](http://localhost/ticket?category=YUMMY)
* [History tickets](http://localhost/ticket?category=HISTORY)
* [Dance tickets](http://localhost/ticket?category=DANCE)

### Order preview:

###### In case you do not retrieve an email, existing order preview

* [Existing order preview](http://localhost/order?unique_code=98203c75c0763280a176c35997632734)

## Login Credentials

Accounts available:

#### Admin - for editing pages, editing user credentials

* **Username:** _admin_
* **Password:** _admin_

## Authors and Credits

### Authors:

- [Codrin Calin](https://github.com/CodrinCalin)
- [Jonathan Mauricio](https://github.com/jonathan-mauricio)
- [Ignas Montvydas](https://github.com/IgnasMon)
- [Kim van Schagen](https://github.com/KimvanSchagen)

### Credits:

- Initial [PHP MVC Basic](https://github.com/ahrnuld/php-mvc-basic) project startup - [Mark de Haan](https://github.com/ahrnuld)