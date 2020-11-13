# EjemploArquitectura
Ejemplo de Arquitectura de Microservicios usando Docker. El ejemplo cuenta con la integración de un API REST desarrollado con Django REST Framework, conexión a una base de datos en PostgreSQL y una vista implementada con Apache Server. 

## Iniciar el contenedor postgres
$ docker-compose up -d postgres

## Crear migraciones
$ docker-compose run minimal_django \
    /srv/minimal-django/minimal_django/manage.py \
    makemigrations api
    
## Migrar el esquema
$ docker-compose run minimal_django \
    /srv/minimal-django/minimal_django/manage.py \
    migrate
    
## Dar permisos sobre la carpeta de migraciones creada
$ chown -R $USER:$USER minimal_django

## Desplegar las aplicaciones
$ docker-compose up