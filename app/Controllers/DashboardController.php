<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Views\ReporteAlignment;
use App\Models\Views\ReporteGender;
use App\Models\Views\ReportePublisher;

class DashboardController extends BaseController
{
  public function getInforme1()
  {
    return view('dashboard/informe1');
  }

  public function getInforme2()
  {
    return view('dashboard/informe2');
  }

  public function getDataInforme2()
  {
    $this->response->setContentType('application/json');

    //reporte de popularidad
    $data = [
      ["superhero" => "Batman", "popularidad" => 70],
      ["superhero" => "Ben 10", "popularidad" => 50],
      ["superhero" => "Goku", "popularidad" => 100],
      ["superhero" => "Spiderman", "popularidad" => 90],
      ["superhero" => "Puka", "popularidad" => 20],
    ];

    // en caso no encontramos datos...
    if (!$data) {
      return $this->response->setJSON([
        "success" => false,
        "message" => "No se encontraron superheroes",
        "resumen" => []
      ]);
    }
    sleep(3); // no enviara los datos hasta 3 segundos despues, es tolerancia

    return $this->response->setJSON([
      "success" => true,
      "message" => "Popularidad",
      "resumen" => $data
    ]);
  }

  public function getInforme3()
  {
    return view('dashboard/informe3');
  }

  public function getDataInforme3()
  {
    $this->response->setContentType('application/json');
    $reporteAlignment = new ReporteAlignment();
    $data = $reporteAlignment->findAll();

    if (!$data) {
      return $this->response->setJSON([
        "success" => false,
        "message" => "No se encontraron superheroes",
        "resumen" => []
      ]);
    }

    return $this->response->setJSON([
      "success" => true,
      "message" => "Alineaciones",
      "resumen" => $data
    ]);
  }

  //memoria cache = CPU, HDD, SOFTWARE
  public function getDataInforme3Cache()
  {
    $this->response->setContentType('application/json');

    //clave unica = Identificar al conjunto de datos
    $cacheKey = 'resumenAligment';

    //obtener los datos de la memoria caché
    $data = cache($cacheKey);

    if ($data == null) {
      $reporteAlignment = new ReporteAlignment();
      $data = $reporteAlignment->findAll();

      // Escribir la nueva memoria caché
      cache()->save($cacheKey, $data, 3600); //tipo de vida (1 hora)
    }

    if (!$data) {
      return $this->response->setJSON([
        "success" => false,
        "message" => "No se encontraron superheroes",
        "resumen" => []
      ]);
    }

    return $this->response->setJSON([
      "success" => true,
      "message" => "Alineaciones",
      "resumen" => $data
    ]);
  }

  public function getInforme4()
  {
    return view('dashboard/informe4');
  }

  public function getDataInforme4GenderCache()
  {
    $this->response->setContentType('application/json');
    $cacheKey = 'resumenGender';
    $data = cache($cacheKey);

    if ($data == null) {
      $reporteGender = new ReporteGender();
      $data = $reporteGender->findAll();
      cache()->save($cacheKey, $data, 3600);
    }

    if (!$data) {
      return $this->response->setJSON([
        "success" => false,
        "message" => "No se encontraron superheroes",
        "resumen" => []
      ]);
    }

    return $this->response->setJSON([
      "success" => true,
      "message" => "Generos",
      "resumen" => $data
    ]);
  }

    public function getDataInforme4PublisherCache()
  {
    $this->response->setContentType('application/json');
    $cacheKey = 'resumenPublisher';
    $data = cache($cacheKey);

    if ($data == null) {
      $reportePublisher = new ReportePublisher();
      $data = $reportePublisher->whereIn('id', [4,13,3,5,10])->findAll();
      cache()->save($cacheKey, $data, 3600);
    }

    if (!$data) {
      return $this->response->setJSON([
        "success" => false,
        "message" => "No se encontraron superheroes",
        "resumen" => []
      ]);
    }

    return $this->response->setJSON([
      "success" => true,
      "message" => "Editoras",
      "resumen" => $data
    ]);
  }


}