<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{

    public function index(Request $request, Response $response)
    {

        // $this->dados = HomeModel::all();

        // $home = include '../app/views/home.php';
        // return $response->getBody()->getContents($home);
    }

    public function salvar(Request $request, Response $response)
    {
        // $dados = $request->getParsedBody();

        // $task = new HomeModel;

        // $task->tarefas = $dados['tarefas'];
        // $objtask = $task->save();

        // return $response->withRedirect('/');

        //  $home= include '../app/views/home.php';
        //  $response->getBody()->getContents($home );
    }

    public function editar(Request $request, Response $response)
    {
        // $id = $request->getAttribute('id');

        // $editar = HomeModel::find($id);

        // $this->editar = $editar;

        // $editar = include '../app/views/editar.php';
        // $response->getBody()->getContents($editar);
    }

    public function atualizar(Request $request, Response $response)
    {
        // $dados = $request->getParsedBody();
        // $id = $request->getAttribute('id');
        // $atualizar = HomeModel::find($id);
        // $atualizar->tarefas = $dados['tarefas'];
        // $objAtualizar = $atualizar->save();

        // return $response->withRedirect('/');
    }

    public function deletar(Request $request, Response $response)
    {
        // $id = $request->getAttribute('id');
        // $deletar = HomeModel::find($id);
        // $deletarOk = $deletar->delete();

        // return $response->withRedirect('/');
    }

}
