<?php

$url = "https://www.filmaffinity.com/es/cat_new_th_es.html";

$contenido = file_get_contents($url);

$doc = new DOMDocument();
$doc->loadHTML($contenido);

$listaNodos = $doc->getElementsByTagName("*");

foreach ($listaNodos as $nodo) {
    $class = $nodo->getAttribute("class");
    if($class == "movie-poster") {
        $listaLink = $nodo->getElementsByTagName("a");
        foreach ($listaLink as $link){
            //print_r($link);
            echo $link->getAttribute("title")."\n";
        }
    }
}

?>
