# 🦸 Superhero – HTML2PDF (CodeIgniter 4)

Aplicación de ejemplo construida con **PHP 8.1+**, **CodeIgniter 4**, **MySQL** y el paquete **spipu/html2pdf** para generar reportes en PDF a partir de vistas HTML.

## 🔄 Características

-   Generación de reportes en PDF desde vistas personalizadas.
-   Organización de scripts SQL para inicializar la base de datos.
-   Controladores dedicados a reportes y generadores.
-   Configuración de Virtual Host para entorno local.

## 📅 Requisitos previos
-   🐘 PHP **8.1 o superior** (con extensiones **intl** y **mbstring** habilitadas).
-   🛠️ Composer 2.x
-   🐬 MySQL 5.7+ / MariaDB
-   📦 Servidor local (XAMPP/Laragon) con vhost apuntando a `public/`.

## 📚 Instalación
1.  Clona el repositorio:
```bash
git clone https://github.com/DanteLuque/superhero-html2pdf.git
cd superhero-html2pdf
```
2.  Instala dependencias con Composer:
```bash
composer install
```
3.  Copia el archivo de entorno:
```bash
cp .env.example .env
```
4. Configura las variables de conexión en `.env`:
```bash
database.default.hostname = localhost
database.default.database = superhero
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```
5. Crea la base de datos `superhero` e importa los scripts:
```bash
app/Database/db_superhero/01_reference_data.sql
app/Database/db_superhero/02_hero_attribute.sql
app/Database/db_superhero/03_hero_power.sql
app/Database/db_superhero/views/superhero_info.sql
app/Database/db_superhero/views/superhero_powers.sql
```
## ⚙️ Configuración del entorno local

1.  Edita tu archivo `hosts` de Windows:
```bash
C:\Windows\System32\drivers\etc\hosts
```
y agrega:
```bash
127.0.0.1   superhero.test
```
2. Edita el archivo de Virtual Hosts de Apache:
```bash
C:\Program Files\xampp\apache\conf\extra\httpd-vhosts.conf
```
y agrega:
```bash
<VirtualHost *:80>
    DocumentRoot "C:/Program Files/xampp/htdocs/superhero-html2pdf/public"
    ServerName superhero.test

    <Directory "C:/Program Files/xampp/htdocs/superhero-html2pdf/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
## 🚀 Ejecución
Una vez configurado el vhost y la base de datos, reinicia Apache desde el panel de XAMPP y accede a:
```bash
http://superhero.test
```
## 🧭 Rutas principales
| Método | Ruta                          | Descripción                                 |
|--------|-------------------------------|---------------------------------------------|
| GET    | `/`                           | Página de inicio (Home)                     |
| GET    | `/reportes/r1`                | Generar reporte PDF #1                      |
| GET    | `/reportes/r2`                | Generar reporte PDF #2                      |
| GET    | `/reportes/r3`                | Generar reporte PDF #3                      |
| POST   | `/reportes/r4`                | Generar reporte PDF #4 (requiere POST)      |
| GET    | `/generador`                  | Formulario del generador de PDFs            |
| GET    | `/tarea5`                     | Vista de la tarea 5 (buscador de héroes)    |
| POST   | `/tarea5/buscador`            | Acción de búsqueda en tarea 5               |
| GET    | `/tarea5/poderes/(:num)`      | Generar reporte PDF #5 según ID de héroe    |


## 📁 Estructura del proyecto
```bash
danteluque-superhero-html2pdf/
├── app/
│   ├── Controllers/        # Controladores (Generador, Reportes, Home)
│   ├── Database/
│   │   └── db_superhero/   # Scripts SQL de base e inserts
│   │       ├── 01_reference_data.sql
│   │       ├── 02_hero_attribute.sql
│   │       └── views/      # Vistas SQL
│   ├── Routes/             # Definición de rutas
│   └── Views/              # Vistas HTML y reportes PDF
├── public/                 # Punto de entrada (index.php, .htaccess)
├── composer.json           # Dependencias PHP
└── .env.example            # Configuración de entorno
```
## 📝 Contribución

Si deseas contribuir a este proyecto:
1.  Haz un fork del repositorio
2.  Crea una rama (`git checkout -b feature/nueva-funcionalidad`)
3.  Realiza tus cambios
4.  Haz commit (`git commit -m 'Añadir nueva funcionalidad'`)
5.  Sube tus cambios (`git push origin feature/nueva-funcionalidad`)
6.  Abre un Pull Request