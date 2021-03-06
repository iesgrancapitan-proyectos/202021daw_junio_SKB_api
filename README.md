# Proyecto de Convivencia en Shikoba

## Descripción del proyecto
Este proyecto surge de la idea de digitalizar el proceso de **gestión de las cotutorías y los partes** en el IES Gran Capitán.

Su finalidad consiste en dar una solución al profesorado para que pueda llevar el control sobre sus alumnos cotutelados y a su vez, evaluar la actitud y el comportamiento de los alumnos a los que se les esté llevando un seguimiento por parte de un cotutor. Además, debe incluir también la gestión de partes, que actualmente se hace a través del backend de la herramienta **Shikoba**.

Para ello, se ha hecho uso de dos frameworks: **Slim y Angular**. Slim para la creación de una API que se encargará de dar respuesta a las peticiones y Angular para el desarrollo de la aplicación web (frontend).

## Despliegue
Para desplegar la API se necesitan **Apache**, **PHP**, **Composer** y **MySQL** (con la base de datos de Shikoba). Para instalar las dependencias del proyecto se utiliza el siguiente comando desde el directorio raíz:
```
composer install
```
Para desplegar la aplicación web (frontend) es necesario tener instalados **Node.js** y **Angular**. Se utiliza el siguiente comando desde el directorio raíz:
```
npm install
```
Y después, desde el directorio dist/proyectoShikoba:
```
http-server
```
Para ampliar más información, visitar el [manual de despliegue](https://github.com/iesgrancapitan-proyectos/202021daw_junio_SKB_api/wiki/Manual_Despliegue).

## Uso
Su uso está orientado a **dispositivos móviles**, tanto Android como iOS, donde la aplicación web se puede instalar como si fuera una aplicación nativa, ya que está adaptada para trabajar como **aplicación web progresiva** o PWA.

## Wiki
Puedes visitar la Wiki del proyecto en [este enlace](https://github.com/iesgrancapitan-proyectos/202021daw_junio_SKB_api/wiki).

## Autores
Rafael Jesús Nieto Cardador - [@rnicar245](https://github.com/rnicar245)  
Pablo Murillo Ávila - [@pxblx](https://github.com/pxblx)
