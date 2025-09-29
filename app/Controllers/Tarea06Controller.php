<?php

namespace App\Controllers;

use App\Models\Publisher;
use App\Models\Superhero;
use App\Models\Views\ConteoHeroesByPublisher;
use App\Models\Views\PromedioPesos;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class Tarea06Controller extends BaseController
{
    public function index(): string
    {
        $publisher = new Publisher();
        $data['publishers'] = $publisher->findAll();
        return view('tarea06', $data);
    }

    public function ejercicio01()
    {
        $titulo   = $this->request->getPost('titulo');
        $genders  = $this->request->getPost('generos') ?? [];
        $limit    = (int)$this->request->getPost('numero');

        $model = new Superhero();
        $rows = $model->getSuperHeroByGender($genders, $limit);

        $data = [
            'generos' => $genders,
            'estilos' => view('/reportes/estilos'),
            'rows'   => $rows,
            'titulo' => $titulo
        ];
        $html = view('reportes/reporte06', $data);

        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', [10, 10, 10, 10]);
            $html2pdf->writeHTML($html);
            $this->response->setHeader('Content-Type', 'application/pdf');
            $html2pdf->Output($titulo . '.pdf');
            exit();
        } catch (Html2PdfException $e) {
            if (isset($html2pdf)) {
                $html2pdf->clean();
            }
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getMessage();
        }
    }

    public function ejercicio02()
    {
        $this->response->setContentType('application/json');
        $publishers = $this->request->getJSON(true)['publishers'] ?? [];

        // generando clave de cache unica ya que propablemente los publishers enviados no siempre serán los mismos
        $cacheKey = 'ConteoHeroesByPublisher_' . md5(json_encode($publishers));
        $data = cache($cacheKey);

        if ($data === null) {
            $conteoHeroes = new ConteoHeroesByPublisher();
            $data = $conteoHeroes->getAllByPublisher($publishers);
            cache()->save($cacheKey, $data, 300);
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
            "message" => "Heroes por publisher",
            "resumen" => $data
        ]);
    }

    public function ejercicio03()
    {
        $this->response->setContentType('application/json');
        $cacheKey = 'PromedioPesos';
        $data = cache($cacheKey);

        if ($data == null) {
            $promedioPesos = new PromedioPesos();
            $data = $promedioPesos->findAll();
            cache()->save($cacheKey, $data, 300);
        }

        if (!$data) {
            return $this->response->setJSON([
                "success" => false,
                "message" => "No se encontraron publishers",
                "resumen" => []
            ]);
        }

        return $this->response->setJSON([
            "success" => true,
            "message" => "Peso promedio por publisher",
            "resumen" => $data
        ]);
    }

    public function ejercicio03SinNA()
    {
        $this->response->setContentType('application/json');
        $cacheKey = 'PromedioPesosSinNA';
        $data = cache($cacheKey);

        if ($data == null) {
            $promedioPesos = new PromedioPesos();

            // filtrando los que no son N/A
            $data = $promedioPesos->findAll();
            $data = array_filter($data, function ($row) {
                return $row['publisher_name'] !== 'N/A';
            });

            cache()->save($cacheKey, $data, 300);
        }

        if (!$data) {
            return $this->response->setJSON([
                "success" => false,
                "message" => "No se encontraron publishers",
                "resumen" => []
            ]);
        }

        return $this->response->setJSON([
            "success" => true,
            "message" => "Peso promedio por publisher (sin N/A)",
            "resumen" => array_values($data) // reindexando el array
        ]);
    }
}
