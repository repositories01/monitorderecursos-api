<?php
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use Sunra\PhpSimple\HtmlDomParser;

$client = new Client([
    'headers' => [
        'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36
       ',
    ],
]);

$finep = 'http://www.finep.gov.br/chamadas-publicas?situacao=aberta';
$htmlFinep = $client->request("GET", $finep)->getBody();
$domFinep = HtmlDomParser::str_get_html($htmlFinep);

foreach($domFinep->find('div[class="item"]') as $article) {
    $item['title']     = $article->find ('div.tema span', 0)->plaintext;
    $articles[] = $item;
}

print_r($articles);