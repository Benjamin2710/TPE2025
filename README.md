 - D'Annunzio Benjamín, dannunzio98@gmail.com
 - Chatelain Francisco, franchatelain2000@gmail.com
 ----------------------------------------------------

Desplegar sitio en servidor con Apache y mySQL:

 1- Instalar XAMPP con los paquetes de Apache (nos dará acceso al servidor web) y MySQL ( nos permite crear y manejar bases de datos). 
 
 2- Guardar el proyecto "TPE2025-main" o cualquiera que quieras abrir dentro de la carpeta  "htdocs" donde instalaste el XAMPP (\xampp\htdocs\TPE2025-main\)
 
 3- Abrir el programa XAMPP, y dentro del Panel de Control activar los modulos "Apache" y "MySQL" para que entren en funcionamiento 
 
 4- Con MySQL activado ingresar en 'http://localhost/phpmyadmin' crear una base de datos e importar la base de datos dedl proyecto.
    *Asegurarse que dentro del archivo 'config.php' coincidan los nombres de la base de datos
 
 5- Ingresar en http://localhost/TPE2025-main/ para acceder a la aplicacion.

Credenciales:
 Para el inicio de sesion y tener las funciones ABM en este sitio web se requiere:
      usuario: webadmin 
      contraseña: admin 

----------------------------------------------------
Temática: Catálogo de jugadores de fútbol y equipos.
La página gestiona información sobre equipos de fútbol y sus jugadores, asignando atributos a cada uno, por los cuales se puede ordenar la información.

Relación 1 a N:
Un equipo puede tener muchos jugadores; cada jugador pertenece solo a un equipo.

Diagrama Entidad-Relación (DER):

<img width="599" height="422" alt="image" src="https://github.com/user-attachments/assets/70842335-4a74-4804-955c-ed3fc18f0bb8" />



