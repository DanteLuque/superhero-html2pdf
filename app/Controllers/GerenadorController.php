<?php

namespace App\Controllers;

class GerenadorController extends BaseController
{
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index(): string
  {

    $query = "SELECT * FROM publisher;";
    $publishers = $this->db->query($query);

    $data = [
      "publishers" => $publishers->getResultArray(),
    ];

    return view('Generador', $data);
  }
}
