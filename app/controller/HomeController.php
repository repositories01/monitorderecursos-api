<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\HomeModel;

class HomeController
{


  public function index(Request $request, Response $response)
  {
             return json_encode('ok');
  }


  public function salvar(Request $request, Response $response)
  {

  }

  public function editar(Request $request, Response $response)
  {

  }

  public function atualizar(Request $request, Response $response)
  {

  }


  public function deletar(Request $request, Response $response)
  {
    
  }
}
