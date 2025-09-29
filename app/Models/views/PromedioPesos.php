<?php

namespace App\Models\Views;

use CodeIgniter\Model;

class PromedioPesos extends Model
{
    protected $table = "promedio_pesos_heroes";
    protected $primaryKey = "publisher_name";
    protected $returnType = "array";
    protected $allowedFields = [
        "publisher_name",
        "peso_promedio"
    ];
}
