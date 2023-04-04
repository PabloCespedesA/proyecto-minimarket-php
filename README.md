Proyecto CRUD de gestión de productos con registro de usuarios
Este proyecto es un sistema CRUD (Crear, Leer, Actualizar, Eliminar) para la gestión de productos con sus respectivas características, así como un sistema de registro de usuarios. El proyecto está desarrollado utilizando el framework de PHP Laravel.

Características
Creación, lectura, actualización y eliminación de productos.
Registro de usuarios con autenticación de sesión.
Manejo de roles de usuario (administrador y usuario regular).
Diseño intuitivo y fácil de usar.
Requisitos del sistema
PHP >= 7.3
Composer
MySQL >= 5.7 o MariaDB >= 10.2
Servidor web (por ejemplo, Apache, Nginx)

Instalación
Clonar el repositorio:


git clone https://github.com/tu-usuario/proyecto-crud-productos.git
Instalar las dependencias con Composer:


cd proyecto-crud-productos
composer install
Crear una copia del archivo .env.example y renombrarla a .env:


cp .env.example .env
Generar una clave de aplicación:

php artisan key:generate
Editar el archivo .env y configurar las credenciales de la base de datos.

Ejecutar las migraciones y alimentar la base de datos con datos de ejemplo:

css
Copy code
php artisan migrate --seed
Iniciar el servidor de desarrollo:
Copy code
php artisan serve
Visitar la aplicación en el navegador web en la dirección http://localhost:8000.

Uso
Una vez que haya iniciado sesión, los usuarios pueden agregar, editar y eliminar productos. Los usuarios regulares solo pueden ver los productos, mientras que los administradores tienen acceso completo al sistema de gestión de productos.

Contribuyendo
Gracias por tu interés en contribuir al proyecto. Para contribuir, por favor sigue estos pasos:

Realiza un fork del repositorio.
Crea una rama con tu nueva funcionalidad (git checkout -b mi-nueva-funcionalidad).
Realiza los cambios necesarios y asegúrate de que las pruebas unitarias pasen.
Envía un pull request.
Licencia
Este proyecto está bajo la licencia MIT. Consulta el archivo LICENSE para más detalles.