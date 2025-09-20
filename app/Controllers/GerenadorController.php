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

  public function tarea5(): string
  {
    
    return view('tarea5');
  }

  public function buscador(): string
  {
    $superhero_name = $this->request->getPost('superhero_name');

    $query = "SELECT * FROM view_superhero_info WHERE superhero_name LIKE '%" . $superhero_name . "%';";
    $rows = $this->db->query($query);

    $data = [
      "rows" => $rows->getResultArray(),
      "estilos" => view('reportes/estilos')
    ];

    return view('tarea5', $data);
  }
}
