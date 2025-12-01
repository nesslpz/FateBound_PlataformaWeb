# FateBound PlataformaWeb
Plataforma web de reflexión y comunidad para el proyecto FateBound, usando PHP y MySQL.

Este repositorio contiene el código fuente de la plataforma web complementaria para el proyecto FateBound. El objetivo principal de esta aplicación es crear un foro de consecuencias y una biblioteca de dilemas para la reflexión ética, demostrando el dominio del desarrollo Backend y la seguridad de la base de datos.

## Enlace al Proyecto Publicado

La aplicación web está desplegada de forma permanente en:
[http://fatebound.wuaze.com/FateBound/]

## Tecnologías y Componentes

| Componente | Tecnología | Enfoque de Ingeniería |
| **Backend/Lógica** | **PHP** | Manejo de formularios, conexión a la DB y lógica de servidor. |
| **Base de Datos** | **MySQL** | Almacenamiento de datos dinámicos (personajes, historias). |
| **Seguridad DB** | **PDO / Sentencias Preparadas** | Implementado para prevenir ataques de Inyección SQL. |
| **Frontend/Diseño** | HTML5, CSS3, **Bootstrap** | Diseño responsivo y coherente con la identidad del juego. |

## Estructura del Repositorio

La carpeta `FateBound/` contiene la siguiente estructura de archivos:

* `db_connect.php`: Archivo de conexión con credenciales de ejemplo por seguridad (el archivo real contiene el host de InfinityFree).
* `fatebound_db.sql`: Archivo SQL con el esquema de la base de datos y los datos iniciales de la tabla `personajes`.
* `personajes.php`: Módulo que realiza la consulta PDO y el despliegue dinámico de datos.
* `img/`: Contiene los archivos `.png` de los personajes.


## Desarrollado por

* Natalia Rodríguez 
* Katherin Cobos
