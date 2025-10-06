# 🧾 Tarea07 – Sistema de Registro y Autenticación (CodeIgniter 4)

Aplicación de ejemplo construida con **PHP 8.1+**, **CodeIgniter 4**, **MySQL** y autenticación basada en **roles**.  
Incluye validaciones, carga de archivos (avatar), migraciones y seeders para inicializar los datos.

---

## 📖 Descripción

Este proyecto demuestra un flujo completo de **registro, inicio de sesión y control de acceso por roles**, utilizando las funcionalidades modernas de CodeIgniter 4.  
Está diseñado como base para sistemas administrativos o paneles de usuario, con gestión de sesiones y subida de imágenes.

---

## 🧩 Tecnologías utilizadas

- 🐘 **PHP 8.1+**
- ⚙️ **CodeIgniter 4.6.3**
- 🐬 **MySQL 8+**
- 🎨 **Bootstrap 5**
- 🔐 **Password Hashing (BCRYPT)**
- 📁 **Multer-like File Uploads (nativo de CI4)**

---

## 📅 Requisitos previos

- PHP **8.1 o superior** con extensiones `intl`, `mbstring` y `mysqli`.
- **Composer 2.x**
- Servidor local como **XAMPP** o **Laragon**.
- MySQL o MariaDB ejecutándose.

---

## ⚙️ Instalación y configuración

1. Clona el repositorio:
 ```bash
   git clone https://github.com/DanteLuque/superhero-html2pdf.git
   cd superhero-html2pdf
   git checkout --track origin/tarea07
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
database.default.database = miapp
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```
5. Ejecuta las migraciones para crear las tablas:
 ```bash
 php spark migrate
```
6. (Opcional) Inserta datos de ejemplo con el seeder:
 ```bash
php spark db:seed UsuarioSeeder
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


## 🧭 Rutas principales
| Método | Ruta                | Descripción                                      |
|--------|---------------------|--------------------------------------------------|
| GET    | `/`                 | Página principal (Home)                          |
| GET    | `/auth/login`       | Vista de inicio de sesión                        |
| POST   | `/auth/doLogin`     | Procesa el inicio de sesión                      |
| GET    | `/auth/register`    | Formulario de registro de usuarios               |
| POST   | `/usuarios/save_db` | Guarda un nuevo usuario en la base de datos      |
| GET    | `/auth/logout`      | Cierra la sesión actual                          |


## 📁 Estructura del proyecto
```bash
tarea07/
├── app/
│   ├── Controllers/
│   │   ├── AuthController.php         # Login, logout, register
│   │   ├── UsuarioController.php      # Manejo de usuarios
│   │   └── TestController.php         # Rutas protegidas por rol
│   ├── Filters/
│   │   ├── Auth.php
│   │   ├── AlreadyLoggedInFilter.php
│   │   └── Role.php
│   ├── Models/
│   │   ├── BaseModel.php
│   │   └── Usuario.php
│   ├── Database/
│   │   ├── Migrations/
│   │   │   └── CreateUsuariosTable.php
│   │   └── Seeds/
│   │       └── UsuarioSeeder.php
│   ├── Validations/
│   │   └── UsuarioValidation.php
│   ├── Views/
│   │   ├── auth/                     # Login y Register
│   │   ├── layouts/                  # Layouts base
│   │   └── common/                   # Mensajes y componentes compartidos
│   └── Routes/                       # Definición de rutas
├── public/
│   └── uploads/                      # Avatares de usuario
├── writable/
│   └── logs/
├── .env.example
└── composer.json
```

## 📝 Contribución

Si deseas contribuir a este proyecto:
1.  Haz un fork del repositorio
2.  Crea una rama (`git checkout -b feature/nueva-funcionalidad`)
3.  Realiza tus cambios
4.  Haz commit (`git commit -m 'Añadir nueva funcionalidad'`)
5.  Sube tus cambios (`git push origin feature/nueva-funcionalidad`)
6.  Abre un Pull Request