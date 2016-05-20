<?php
require_once('init.php');
loadScripts();



$pm = new ProductManager();
$rows = $pm->listComments($_GET['id']);


$html = "";
if (!$rows || count($rows) == 0) {
        // don't know why but dd will be hid 
    $html = "<tr><td>Leave the comment for the first!</td></tr>";
} else {
    foreach ($rows as $row) {
        $email = $row['email'];
        $content = $row['content'];

        $html .= '
        
        

        <div class="media">

            <div class="media-left">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </div>

            <div class="media-body">
                <h4 class="media-heading"><strong>'. $email. '</strong></h4>
                <p>'. $content. '</p>
            </div>
        </div>
        ';
    }
}

echo $html;
return;


?>