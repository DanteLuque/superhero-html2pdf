<?php

namespace App\Models;
use CodeIgniter\Model;

class Alignment extends Model{
  protected $table = "alignment";
  protected $primaryKey = ["id"];
  protected $allowedFields = ["alignment"];
}