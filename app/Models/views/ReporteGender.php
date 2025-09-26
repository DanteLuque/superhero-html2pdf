<?php

namespace App\Models\Views;
use CodeIgniter\Model;

class ReporteGender extends Model{
  protected $table = "view_superhero_gender";
  protected $primaryKey = "gender";
  protected $returnType = "array";
  protected $allowedFields = [];

  
}