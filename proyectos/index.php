<?php

const IVA = 0.13;

session_start();
echo "5" + 2.5;
echo " | ";
echo "5" . 2.5;

$productos = [
    "producto1" => [
        "nombre" => "Coca Cola",
        "categoria" => "Bebidas",
        "precio" => 10.99,
        "disponibilidad" => true
    ],
    "producto2" => [
        "nombre" => "Pepsi",
        "categoria" => "Bebidas",
        "precio" => 10.99,
        "disponibilidad" => true
    ],
    "producto3" => [
        "nombre" => "Jalapeños",
        "categoria" => "Snacks",
        "precio" => 3.00,
        "disponibilidad" => true
    ],
    "producto4" => [
        "nombre" => "Jabon",
        "categoria" => "Higiene",
        "precio" => 5.00,
        "disponibilidad" => true
    ]
];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Productos</h1>

    <form action="" method="post">
        <label for=""> Nombre</label>
        <input type="text" name="nombre">

        <select name="producto" id="">
            <?php foreach ($productos as $key => $producto): ?>
                <option value="<?= $key ?>"><?= $producto['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="">Cantidad a Comprar</label>
        <input type="number" name="cantidad" min="1" value="1">

        <button type="submit">Comprar</button>
    </form>
</body>
</html>