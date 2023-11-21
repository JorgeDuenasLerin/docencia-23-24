<?php

// Obtenemos la información

$contenido = file_get_contents ( "https://www.filmaffinity.com/es/cat_new_th_es.html" );

// echo $contenido;


// Construimos un árbol DOM
// Necesitamos: php-xml
// apt install php-xml

$doc = new DOMDocument();
$doc->loadHTML($contenido);
// echo $doc->saveHTML();


// Recorrer nodos
$listaDOM = $doc->getElementsByTagName("*");
foreach ( $listaDOM as $node){
    if($node->getAttribute("class") == "movie-poster"){
        echo "Poster!\n";
        $linksPoster = $node->getElementsByTagName("a");
        foreach ( $linksPoster as $link){
            echo $link->getAttribute("href") . "\n";
        }
    }
}
?>
