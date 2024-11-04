<?php 
    include('layout/header.php');

    if(file_exists("views/${recurso}/${acao}.view.php")) :
        include("views/${recurso}/${acao}.view.php");
    else :
        include("layout/404.php");
    endif;

    include("layout/footer.php");