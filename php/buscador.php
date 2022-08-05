<?php

include("../config/conexion.php");

if (isset($_POST['query'])) {

    
    $output = '';
    $query = $connection->prepare("SELECT * FROM ofertas WHERE cargo LIKE '%".$_POST['query']."%'");

    $query->execute();
    $row = $query->fetchAll(PDO::FETCH_ASSOC);

    $output = '<ul class="lista">';

    if ($query->rowCount() > 0) {

        foreach ($row as $res) {
            
            $output .= '<li>'.$res["cargo"].'</li>';
        }
        
    }else{
        $output .= '<li>Cargo no encontrado</li>';
    }

    $output .='</ul>';
    echo $output;

}

// empresa





