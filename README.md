# FateBound PlataformaWeb
Plataforma web de reflexión y comunidad para el proyecto FateBound, usando PHP y MySQL.

Este repositorio contiene el código fuente de la plataforma web complementaria para el proyecto FateBound. El objetivo principal de esta aplicación es crear un foro de consecuencias y una biblioteca de dilemas para la reflexión ética, demostrando el dominio del desarrollo Backend y la seguridad de la base de datos.

## Enlace al Proyecto Publicado

La aplicación web está desplegada de forma permanente en:
[http://fatebound.wuaze.com/FateBound/]

## Tecnologías y Componentes

Backend/Lógica: Se utilizó PHP para el manejo de formularios, la lógica del servidor y la orquestación de la conexión con la base de datos.

Base de Datos: Se implementó MySQL para el almacenamiento seguro y la gestión de datos dinámicos del proyecto, como la información de los personajes y el contenido futuro del foro/historias.

Seguridad de la Base de Datos: Se utilizó PDO (Objetos de Datos de PHP) y Sentencias Preparadas en el archivo db_connect.php para implementar un enfoque de seguridad proactivo y prevenir ataques de Inyección SQL.

Frontend/Diseño: Se combinó HTML5 y CSS3 con el framework Bootstrap. Esto aseguró un diseño responsivo, moderno y coherente con el estilo visual oscuro del proyecto, permitiendo que la interfaz se vea bien en cualquier dispositivo.

## Estructura del Repositorio

La carpeta `FateBound/` contiene la siguiente estructura de archivos:

* `db_connect.php`: Archivo de conexión con credenciales de ejemplo por seguridad (el archivo real contiene el host de InfinityFree).
* `fatebound_db.sql`: Archivo SQL con el esquema de la base de datos y los datos iniciales de la tabla `personajes`.
* `personajes.php`: Módulo que realiza la consulta PDO y el despliegue dinámico de datos.
* `img/`: Contiene los archivos `.png` de los personajes.


## Desarrollado por

* Natalia Rodríguez 
* Katherin Cobos
