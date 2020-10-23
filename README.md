# Airlina Project set up

**1. Install PHP 7.4.***
```
curl -s http://php-osx.liip.ch/install.sh | bash -s 7.4
```
**2. Install Composer(globlally)**
https://getcomposer.org/doc/00-intro.md



**3. Get Docker**
https://docs.docker.com/get-docker/

**4. clone project from github**
https://github.com/williamliao777/Airline_Project/tree/master

**4. install node js**
https://nodejs.org/en/



**Folder**
```
project
├── code    (php code)
├── devOps  (environment settng for docker)
```

**Build Laravel framework**
cd to code folder
copy .env.example  named .env

* install laravel dependencies.
composer will use the **code/composer.json**   install module setted in this file 

```
composer install
```
* If you need to update your dependencies
```
composer update
```
* Install front-end module
```
npm install && npm run dev
```

**Build Docker Environment**

cd to devOps folder
copy .env.example  named .env

```
docker-compose up -d nginx mysql phpmyadmin
```

**URL**

**Application home**
localhost:8000

**PhpMyadmin (MySQL online GUI)**
localhost:8004
