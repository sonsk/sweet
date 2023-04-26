<?php
    try
    {
        $bdd= new pdo ('mysql:host=localhost; dbname=sweet', 'root' , '');
    }
    catch(Exception $e)
    {
        die('Erreur :' .$e->getmessage());
    }

?>