<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class ReporteController extends BaseController
{
  protected $db;

  public function __construct(){
    $this->db = \Config\Database::connect();
  }

  public function getReporte1()
  {
    $html = view('reportes/reporte1');
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($html);
    $this->response->setHeader('Content-Type', 'application/pdf');
    $html2pdf->Output();
  }

  public function getReporte2()
  {
    $data = [
      "estilos" => view('reportes/estilos'),
      'area' => 'Finanzas',
      'autor' => 'Dante Luque',
      'productos' => [
        [
          "id" => 1,
          "description" => "Monitor",
          "precio" => 750
        ],
        [
          "id" => 2,
          "description" => "Impresora",
          "precio" => 500
        ],
        [
          "id" => 3,
          "description" => "Mouse",
          "precio" => 220
        ]
      ],
    ];
    $html = view('reportes/reporte2', $data);
    try {
      $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', [10, 10, 10, 10]);
      $html2pdf->writeHTML($html);
      $this->response->setHeader('Content-Type', 'application/pdf');
      $html2pdf->Output('Reporte-Finanzas.pdf');
      exit();

    } catch (Html2PdfException $e) {
      if (isset($html2pdf)) {
        $html2pdf->clean();
      }
      $formatter = new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }

  public function getReporte3()
  {
    $query = "SELECT * FROM view_superhero_info limit 100;";
    $rows = $this->db->query($query);

    $data = [
      "estilos" => view('/reportes/estilos'),
      "rows" => $rows->getResultArray(),
    ];
    $html = view('reportes/reporte3', $data);
    try {
      $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', [10, 10, 10, 10]);
      $html2pdf->writeHTML($html);
      $this->response->setHeader('Content-Type', 'application/pdf');
      $html2pdf->Output('Reporte-superhero.pdf');
      exit();

    } catch (Html2PdfException $e) {
      if (isset($html2pdf)) {
        $html2pdf->clean();
      }
      $formatter = new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }
  public function getReporte4()
  {
    $publisher = $this->request->getPost('publisher');
    $query = "SELECT * FROM view_superhero_info WHERE publisher_name='".$publisher."';";
    $rows = $this->db->query($query);

    $data = [
      "estilos" => view('/reportes/estilos'),
      "rows" => $rows->getResultArray(),
    ];
    $html = view('reportes/reporte4', $data);
    try {
      $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', [10, 10, 10, 10]);
      $html2pdf->writeHTML($html);
      $this->response->setHeader('Content-Type', 'application/pdf');
      $html2pdf->Output('Reporte-superhero.pdf');
      exit();

    } catch (Html2PdfException $e) {
      if (isset($html2pdf)) {
        $html2pdf->clean();
      }
      $formatter = new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }

  public function getReporte5($id)
  {
    $query = "SELECT * FROM view_superhero_powers WHERE id=".$id.";";
    $rows = $this->db->query($query);

    $super_hero_name = "";
    $full_name = "";
    if (count($rows->getResultArray()) > 0) {
      $super_hero_name = $rows->getResultArray()[0]['superhero_name'];
      $full_name = $rows->getResultArray()[0]['full_name'];
    }

    $data = [
      "rows" => $rows->getResultArray(),
      "super_hero_name" => $super_hero_name,
      "full_name" => $full_name,
    ];
    $html = view('reportes/reporte5', $data);
    try {
      $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', [10, 10, 10, 10]);
      $html2pdf->writeHTML($html);
      $this->response->setHeader('Content-Type', 'application/pdf');
      $html2pdf->Output('Reporte-superhero-powers.pdf');
      exit();

    } catch (Html2PdfException $e) {
      if (isset($html2pdf)) {
        $html2pdf->clean();
      }
      $formatter = new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }
}