<?php

namespace App\Models\Views;
use CodeIgniter\Model;

class ReportePublisher extends Model{
  protected $table = "view_superhero_publisher";
  protected $primaryKey = "id";
  protected $returnType = "array";
  protected $allowedFields = [];

  
}