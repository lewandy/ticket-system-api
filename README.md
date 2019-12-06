# Ticket system API

The basic idea behind the application is that an Employee can log in and create/update/delete tickets and also create time entries for each of the tickets. Later, a report can be generated to get the hours worked by an employee during a time frame.

  - Create employees
  - Create tickets and times entries
  - Reports

### Tech

Ticket system API uses a laravel that provide a full features environment for large,scalable and maintainable applications or restful apis.

* [Laravel] - Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.!


### Usage

Documentation can be found on this site : [Documentation](https://documenter.getpostman.com/view/9665338/SWE27Ku1?version=latest)

### Installation

Ticket system api requires [Docker ](https://www.docker.com/) to run or a dedicated environment manually

```sh
git clone https://github.com/lewandy/ticket-system-api
cd docker 
docker-compose up
docker exec -it tickets_workspace_1 bash   ---> now you are located in the container shell
sh setup.sh  ---> This command execute a script("/src/setup.sh") that will be setup the project
```

The laravel config may be look like this
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



Warning: If you used an older version of Laradock it’s highly recommended to rebuild the containers you need to use see how you rebuild a container in order to prevent as much errors as possible.



1 - Enter the laradock folder and copy env-example to .env

```
cp env-example .env
```

You can edit the .env file to choose which software’s you want to be installed in your environment. You can always refer to the docker-compose.yml file to see how those variables are being used.

Depending on the host’s operating system you may need to change the value given to COMPOSE_FILE. When you are running Laradock on Mac OS the correct file separator to use is :. When running Laradock from a Windows environment multiple files must be separated with ;.

By default the containers that will be created have the current directory name as suffix (e.g. laradock_workspace_1). This can cause mixture of data inside the container volumes if you use laradock in multiple projects. In this case, either read the guide for multiple projects or change the variable COMPOSE_PROJECT_NAME to something unique like your project name.

2 - Build the environment and run it using docker-compose

In this example we’ll see how to run NGINX (web server) and MySQL (database engine) to host a PHP Web Scripts:

```
docker-compose up -d nginx mysql
```
Note: All the web server containers nginx, apache ..etc depends on php-fpm, which means if you run any of them, they will automatically launch the php-fpm container for you, so no need to explicitly specify it in the up command. If you have to do so, you may need to run them as follows: docker-compose up -d nginx php-fpm mysql.

You can select your own combination of containers from this list.

(Please note that sometimes we forget to update the docs, so check the docker-compose.yml file to see an updated list of all available containers).


3 - Enter the Workspace container, to execute commands like (Artisan, Composer, PHPUnit, Gulp, …)

docker-compose exec workspace bash
Alternatively, for Windows PowerShell users: execute the following command to enter any running container:

docker exec -it {workspace-container-id} bash
Note: You can add --user=laradock to have files created as your host’s user. Example:

docker-compose exec --user=laradock workspace bash
You can change the PUID (User id) and PGID (group id) variables from the .env file)


4 - Update your project configuration to use the database host

Open your PHP project’s .env file or whichever configuration file you are reading from, and set the database host DB_HOST to mysql:

```
DB_HOST=pgsql
```
You need to use the Laradock’s default DB credentials which can be found in the .env file (ex: MYSQL_USER=). Or you can change them and rebuild the container.

If you want to install Laravel as PHP project, see How to Install Laravel in a Docker Container.

source : [Documentation](https://laradock.io/getting-started/#2-3-usage)

### Todos

 - Write MORE Tests
 - Refactor time entries controller
 - refactor multiple assing employees to a ticket


