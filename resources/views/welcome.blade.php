<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
</head>
<body>
    <h1>Sistema Delivery</h1>
    <?php 
        if(1>2)
            echo "<p>1 é maior que 2</p>"; 
        else
            echo "<p>2 é maior que 1</p>"; 
    ?>

    @if (1>2)
        <p>1 é maior que 2</p>
    @else
        <p>2 é maior que 1</p>
    @endif

    <?= 50+40 ?>
</body>
</html>