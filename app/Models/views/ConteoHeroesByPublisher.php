<?php

namespace App\Models\Views;

use CodeIgniter\Model;

class ConteoHeroesByPublisher extends Model
{
    protected $table = "view_cantidad_heroes_publisher";
    protected $primaryKey = "publisher_name";
    protected $returnType = "array";
    protected $allowedFields = [
        "publisher_name",
        "total"
    ];

    public function getAllByPublisher($publishers)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        if (!empty($publishers)) $builder->whereIn('publisher_name', $publishers);

        $query = $builder->get();
        return $query->getResultArray();
    }
}
