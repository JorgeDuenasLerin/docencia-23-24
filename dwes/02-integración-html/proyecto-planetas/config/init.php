<?php 

define('DOC_ROOT', dirname(dirname(__FILE__)));

spl_autoload_register(
    function($queCosa){
        require(DOC_ROOT."/src/${queCosa}.php");
    }
);

?>