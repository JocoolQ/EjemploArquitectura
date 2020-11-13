# EjemploArquitectura
Ejemplo de Arquitectura de Microservicios usando Docker. El ejemplo cuenta con la integración de un API REST desarrollado con Django REST Framework, conexión a una base de datos en PostgreSQL y una vista implementada con Apache Server. 

## Instrucciones de instalación

- Iniciar el contenedor postgres
    ```console
    $ docker-compose up -d postgres
    ```

- Crear migraciones
    ```console
    $ docker-compose run minimal_django \
        /srv/minimal-django/minimal_django/manage.py \
        makemigrations api
    ```  
- Migrar el esquema
    ```console
    $ docker-compose run minimal_django \
        /srv/minimal-django/minimal_django/manage.py \
        migrate
    ```  
- Dar permisos sobre la carpeta de migraciones creada
    ```console
    $ chown -R $USER:$USER minimal_django
    ```
- Desplegar las aplicaciones
    ```console
    $ docker-compose up
    ```
## Probar funcionalidades
- Ingresar información (httpie):
    ```console
    $  http --form POST http://localhost:4001/usuarios/ nombre="Nombre Usuario"
    ``` 
- Consultar información (httpie)
    ```console
    $  http http://localhost:4001/usuarios/
    ```
- Consultar información (página web servidor Apache)
    - Ingrese a http://localhost:5000/ para ver la información en la página web del servidor Apache
    
- Consultar información (API REST Django)
    - Puede ingresar a http://localhost:4001/usuarios/ para ver la información proporcionada por el servicio Django REST Framework
