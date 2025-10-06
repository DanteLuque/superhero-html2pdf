### Requisito
- Descomentar la extension extension=mysqli en el php.ini

### Crear las migraciones
- php spark make:migration CreateCiSessionsTable
- php spark make:migration CreateUsuariosTable

### Ejecutar las migraciones
- php spark migrate

### Consejos:
Debes crear las migraciones en el orden correcto basado en al estructura de tu db en sql, ya que al momento de ejecutar 
las migraciones, se realizarán en ese orden, esto se verá reflejado en la tabla adicional que crea codeigniter llamada
`migrations`

### Crear un seeder:
- php spark make:seeder UsuarioSeeder

### Ejecutar un seeder:
- php spark db:seed UsuarioSeeder

### Actualización de migraciones
#### Opcion 1 - Resetear todas las migraciones y volver a correrlas:
Esto borra todas las tablas migradas y las recrea desde cero (solo usar en desarrollo)
- **php spark migrate:refresh**
Esto ejecuta down() y luego up() de todas tus migraciones.
Te deja la DB limpia y actualizada con tus últimos cambios.

#### Opcion 2 - Revertir una migración específica:
si quieres revertir solo una tabla y no todo:
- **php spark migrate:rollback**  ->Esto ejecuta los down()
Luego la vuelves a ejecutar:
- **php spark migrate**  -> Esto ejecuta los up()

#### Opcion 3 - Crear una nueva migración:
Si tu base ya está en producción o con datos importantes, no edites la vieja migración, crea una nueva, por ejemplo:
- **php spark make:migration AddTelefonoToUsuarios**
Y ahí agregas solo los cambios (por ejemplo, una nueva columna).

la **opción 3** nos ayuda a mantener un **historial de cambios estructurales** sobre la base de datos. Cada migración representa una modificación incremental del esquema —así nunca tocas el pasado, solo agregas “capas” nuevas.


### Cómo se ve una migración tipo `AddTelefonoToUsuarios`

No es igual a la de `CreateUsuariosTable`.  
Acá ya **no creas toda la tabla**, sino que aplicas un _ALTER TABLE_ usando `$this->forge->addColumn()`.

```php
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTelefonoToUsuarios extends Migration
{
    public function up()
    {
        $fields = [
            'telefono' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'after'      => 'apellidos',
            ],
        ];

        $this->forge->addColumn('usuarios', $fields);
    }

    public function down()
    {
        // rollback: eliminamos la columna si revertimos esta migración
        $this->forge->dropColumn('usuarios', 'telefono');
    }
}
```


**Consejo general:**

-   En desarrollo → `migrate:refresh`
    
-   En producción → crear una nueva migración incremental.

### Otros comandos utiles
| Comando                            | Qué hace                                                                            |
| ---------------------------------- | ----------------------------------------------------------------------------------- |
| `php spark migrate`                | Ejecuta todos los `up()` pendientes.                                                |
| `php spark migrate --all`          | Aplica *todas* las migraciones en todos los namespaces.                             |
| `php spark migrate:rollback`       | Revierte **solo el último grupo** de migraciones.                                   |
| `php spark migrate:rollback --all` | Revierte **todas** las migraciones (vuelve todo al inicio).                         |
| `php spark migrate:refresh`        | Hace un **rollback completo** y luego ejecuta `migrate` (reinicia todo el esquema). |
| `php spark migrate:status`         | Muestra qué migraciones ya se aplicaron y cuáles faltan.                            |
