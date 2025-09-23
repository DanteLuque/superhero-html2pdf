<?php

namespace App\Models;
use CodeIgniter\Model;

class Race extends Model{
  protected $table = "race";
  protected $primaryKey = ["id"];
  protected $allowedFields = ["race"];
}