# Airlina Project set up

**Get Docker**
https://docs.docker.com/get-docker/

**Folder**
```
project
├── code    (php code)
├── devOps  (environment settng for docker)
```

**Build Docker Environment**

cd to devOps folder

```
docker-compose up -d nginx mysql phpmyadmin
```

**URL**

**Application home**
localhost:8000

**PhpMyadmin (MySQL online GUI)**
localhost:8004
