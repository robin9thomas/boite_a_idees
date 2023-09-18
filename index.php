<?php 
include "config.php";


$title = "<h2>Ceci est le titre</h2>";

$header = "<!DOCTYPE html>
            <html>
                <head>
                    <meta charset='utf-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <title>Boite à idées</title>
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
                    <script src='main.js'></script>
                </head>
                <body>";

        $content = "";

        $idees = new idees(1);
        $liste_idees = $idees->load();

        print_r($liste_idees);
        
        foreach($liste_idees as $element_idee){
            $content .= "
            
            ";
        }
$footer ="
                </body>
            </html>";
            
echo $header.$content.$footer;
?>