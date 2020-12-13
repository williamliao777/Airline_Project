# Airlina Project set up

**software and tools**

**1. Install PHP 7.4.***
```
curl -s http://php-osx.liip.ch/install.sh | bash -s 7.4
```
**2. Install Composer(globlally)**
https://getcomposer.org/doc/00-intro.md

**3. Get Docker**
https://docs.docker.com/get-docker/

**4. install node js**
https://nodejs.org/en/

**sclone project from github***
https://github.com/williamliao777/Airline_Project/tree/master

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
* Generate APP_KEY
```
php artisan key:generate
```

**Build Docker Environment**

cd to devOps folder
copy .env.example  named .env 
```
docker-compose build
```
After build done
```
docker-compose up -d nginx
```

**URL**

**Application home**
localhost:8000

**PhpMyadmin (MySQL online GUI)**
localhost:8004
