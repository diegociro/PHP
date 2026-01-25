<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bienvenido usuario: <?= $cli->nombre ?> <br>
    Has entrado <?= $cli -> veces ?> veces en nuestra web <br>

    Esta es su lista de pedidos del cliente con código <?= $cli -> cod_cliente ?>

    <table>
        <?php 
        $total = 0;
        foreach ($pedido as $tpedidos){
            echo "<tr><td>".$pedido->producto."</td><td>".$pedido->precio."</td></tr>";
            $total;
        }

        ?>
    </table>

</body>
</html>