<?php

namespace App\Controllers;

use App\Models\Superhero;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class Tarea06Controller extends BaseController
{
    public function index(): string
    {
        return view('tarea06');
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
            $html2pdf->Output($titulo.'.pdf');
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
