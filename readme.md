# TEMPLATE INICIAL DE LARAVEL CON ADMINLTE
## ROLES Y PERMISOS PERSONALIZADOS

### INTRODUCCION
El siguiente proyecto es un template inicial de laravel integrando AdminLTE para su panel de administracion, ademas que contiene dos modulos iniciales como ser:

- **MODULO DE USUARIOS:** Este modulo inicial contiene las vistas y funcionalidad como ser:listar usuarios, crear usuarios con diferentes roles, editar, y cambiar password.
- **MODULOS DE ROLES:** Este modulo inicial contiene las vistas y funcionalidad como ser: listar roles, crear roles(con permisos personalizados), editar roles.

### INSTALACION
Para empezar a usar el siguiente proyecto puedes clonar el proyecto desde github o descargarlo del mismo.

Una vez descargado (o clonado), cambiarlo el nombre del proyecto al que necesite.

El proyecto esta realizado con el framework Laravel 5.5 que necesita los siguiente requerimientos:

- PHP >= 7.0.0
- MySQL
- Apache
- Las siguientes extensiones de PHP: GD PHP Extension(para el generador de PDF, Simple QR) PDO PHP Extension, Mbstring PHP Extension ,Tokenizer PHP Extension, XML PHP Extension

**Dar Permisos**
Si estas trabajando en algun sistema operativo Linux, la documentacion de laravel dice que se debe dar permisos a dos archivo: `bootstrap/cache` y `storage`

**DESCARGAR LA CARPETA vendor**
Al subir el proyecto a git no se suele subir la carpeta vendor donde contiene toda la funcionalidad de laravel por lo cual se debe ejecutar el siguiente comando desde la terminal `componser update`

**COPIAR EL ARCHIVO `.env`**
Se debe copiar el archivo `.env-example` y renombrarlo con el nombre `.env`.

Atraves de la terminal dirigirnos donde esta el proyecto y ejecutar el siguiente comando de laravel

```
php artisan key:generate
```
Este comando generara una llave(key) para el proyecto

**Configuracion del archivo `.env`**
Abrir el archivo `.env` del proyecto y realizar las siguientes configuraciones:

```
APP_NAME=[Laravel]
APP_SUB=[LARA]

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[Nombre-base-datos]
DB_USERNAME=[usuario]
DB_PASSWORD=[password]
```

Donde:
- **[Laravel]** Nombre completo del proyecto
- **[LARA]** Nombre abreviado del proyecto (max: 4)
- **[Nombre-base-datos]** Nombre de la base de datos
- **[usuario]** Nombre de usuario (por defecto es root)
- **[password]** Contrasena del usuario de la base de datos

### MODO DE USO DEL TEMPLATE
El sistema contiene los siguiente plugins para su uso dirijase a su documentacion respectiva

- [Datatables con Laravel](http://yajrabox.com/docs/laravel-datatables/master)
- [Dompdf con Laravel](https://github.com/barryvdh/laravel-dompdf)
- [Simple-QRcode con Laravel](https://www.simplesoftware.io/docs/simple-qrcode)
- [Laravel collective](https://laravelcollective.com/docs/master/html)
- [Roles y Permisos personalizados (Shinobi)](https://github.com/caffeinated/shinobi)

La plantilla de administracion usa AdminLTE con bootstrap v3 para su uso revise su documentacion oficial

- [Pagina Oficial de Boostrap 3](https://getbootstrap.com/docs/3.3/)
- [Pagina Oficial de AdminLTE2](https://adminlte.io/)