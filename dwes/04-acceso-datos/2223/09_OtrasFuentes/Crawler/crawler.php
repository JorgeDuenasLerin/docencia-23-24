<?php

require_once('vendor/autoload.php');

use Goutte\Client;

$client = new Client();

$crawler = $client->request('GET', 'https://www.filmaffinity.com/es/cat_new_th_es.html');

$crawler->filter("div.movie-title > a")->each(function ($node) {
    print $node->text()."\n";
});

 ?>
