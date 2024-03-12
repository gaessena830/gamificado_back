# gamificado_back

Apis and endpoints for backend of gamificado app

## Api de usuarios

# read user
GET /gamificado_back/readUser.php para obtener todos los usuarios
GET /gamificado_back/readUser.php?username= para obtener todos los usuarios
GET /gamificado_back/readUser.php?username=xxxxx para obtener un usuario en particular

# create user

POST /gamificado_back/createUser.php

{
    "nombre": "aurelio",
    "apellidos":"suarez",
    "identificacion":"1030299838",
    "correo":"aursua@correo.com",
    "telefono":"3003330000",
    "rol":"docente",
    "username":"doc_aursua",
    "password":"PassSinSHA"
}
# login

POST /gamificado_back/login.php 

{
    "user":"doc_aursua",
    "pass":"PassSinSHA"
}

# update user

PUT /gamificado_back/updateUser.php 

{
    "nombre": "aurelio",
    "apellidos":"suarez",
    "identificacion":"1030299838",
    "correo":"aursua@correo.com",
    "telefono":"3003333000",
    "username":"doc_aursua",
}

# delete user

DELETE /gamificado_back/deleteUser.php
{
    "username":"doc_aursua",
    "identificacion":"1030299838"
}

## Api de actividades

