<?php
    include('dbconnection.php');
    require('link.php');

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <style>
        i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
        }
         a.view {
        color: #03A9F4;
        }
         a.edit {
        color: #FFC107;
        }
         a.delete {
        color: #E34724;
        }
    </style>
    <div class="">
        <a href="edit_cake.php?edit=<?php echo  $results ['id']?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
        <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
        
       <!-- <a href="#"><i class="fa-fw far fa-eye "></i></a>
        <a href="#"><i class="fa-fw far fa-edit"></i></a>
        <a href="#"><i class="fa-fw fas fa-trash" aria-hidden="true"></i></a>
    -->
    </div>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>