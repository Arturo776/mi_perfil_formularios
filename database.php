<?php

$db = new mysqli("localhost", "root", "", "miperfil");
if ($db->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

?>
