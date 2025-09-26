<?php

namespace App\Models\Views;
use CodeIgniter\Model;

class ReporteAlignment extends Model{
  protected $table = "view_superhero_alignment_count";
  protected $primaryKey = "alignment"; //el unico campo unico (la idea es no generar redundancia)
  protected $returnType = "array";
  protected $allowedFields = []; // es una vista, no vamos a modificar ningun campo, solo leerlo

  
}