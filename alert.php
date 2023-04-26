<?php
$valid="";

if(isset($_POST["commander"])){
        $valid = "<div class='alert alert-success'>
                <a href='#' class='close'
                data-dismiss='alert'
                aria-label='close'>&times;</a><b>votre commande a été enregistrée</b>
        </div>";
    }else{
        $valid = "<div class='alert alert-danger'>
        <a href='#' class='close'
        data-dismiss='alert'
        aria-label='close'>&times;</a><b>votre commande n'a pas aboutie</b>
        </div>";
    }


