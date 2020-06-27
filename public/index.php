<?php


require '../init.php';
require '../vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;



$finep = 'http://www.finep.gov.br/chamadas-publicas?situacao=aberta';

// $client = new Client();

$client = new Client(HttpClient::create(['timeout' => 60]));

$client->setServerParameter('HTTP_USER_AGENT', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:73.0) Gecko/20100101 Firefox/73.0');
$crawler = $client->request('GET',$finep);


$crawler->filter('.item > .tema')->each(function ($node){
    $headline = $node->text();
    echo $headline . "<br/>";
});












// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;
// use Slim\App;
// use App\Controller\HomeController;


// $configuration = [
//     'settings' => [
//         'displayErrorDetails' => true,
//     ],
// ];
// $c = new \Slim\Container($configuration);
// $app = new \Slim\App($c);

// $app->get('/', HomeController::class . ':index');

// $app->post('/home/cadastro', HomeController::class . ':salvar');
// $app->get('/home/editar/{id}', HomeController::class . ':editar');
// $app->put('/home/cadastro/{id}', HomeController::class . ':atualizar');
// $app->delete('/home/deletar/{id}', HomeController::class . ':deletar');

//  $app->run();



