<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class DashboardController extends BaseController{
  public function getInforme1(){
    return view('dashboard/informe1');
  }
}