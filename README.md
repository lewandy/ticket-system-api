# Ticket system API

The basic idea behind the application is that an Employee can log in and create/update/delete tickets and also create time entries for each of the tickets. Later, a report can be generated to get the hours worked by an employee during a time frame.

  - Create employees
  - Create tickets and times entries
  - Reports (working)

### Tech

Ticket system API uses a laravel that provide a full features environment for large,scalable and maintainable applications or restful apis.

* [Laravel] - Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.!


### Usage

Default employee for authentication :

```
Email : admin@gmail.com
password : 12345
```

Documentation can be found on this site : [Documentation](https://documenter.getpostman.com/view/9665338/SWE27Ku1?version=latest)

### Installation

Ticket system api requires [Docker ](https://www.docker.com/) to run or a dedicated environment manually

```sh
git clone https://github.com/lewandy/ticket-system-api
cd docker 
docker-compose up
docker exec -it tickets_workspace_1 sh setup.sh   ---> now you are located in the container shell
```

The laravel config may be look like this.
note: The sample .env file in the laravel project already has this configuration, when it is copied to .env it must work if you change anything.

```
DB_CONNECTION=pgsql
DB_HOST=tickets_nginx_1
DB_PORT=3306
DB_DATABASE=tickets
DB_USERNAME=ntidev
DB_PASSWORD=toor
```

### Development

The project was developed with an environment dedicated to laravel using docker and docker compose so that the development experience is as good as possible.

You can check the project that i modified for setup a complete docker enviroment in this site.

[Docker ](https://laradock.io/)

### Docker

If you are using Docker Toolbox (VM), do one of the following:

Upgrade to Docker Native for Mac/Windows (Recommended). Check out Upgrading Laradock
Use Laradock v3.*. Visit the Laradock-ToolBox branch. (outdated)

We recommend using a Docker version which is newer than 1.13.

If you want to install Laravel as PHP project, see How to Install Laravel in a Docker Container.

source : [Documentation](https://laradock.io/getting-started/#2-3-usage)

### Todos

 - Write MORE Tests
 - Refactor time entries controller
 - refactor multiple assing employees to a ticket


