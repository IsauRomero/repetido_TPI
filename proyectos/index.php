<?php
session_start();
const IVA = 0.13;
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? "";
    $productoSeleccionado = $_POST['producto'] ?? "";
    $cantidad = $_POST['cantidad'] ?? "";

    if(!isset($_SESSION['clientes'])) {
        $_SESSION['clientes'] = [];
    }
    if (isset($productos[$productoSeleccionado])) {
        $producto = $productos[$productoSeleccionado];
        $precio = $producto['precio'];

        $subTotal = calcularSubTotal($precio, $cantidad);
        $totalConIVA = calcularTotalIVA($precio, $cantidad, IVA);
    }
    $cliente = $_SESSION['cliente'] ?? "";

    $cliente = [
        "nombre" => $nombre,
        "producto" => $producto["nombre"],
        "cantidad" => $cantidad,
        "subTotal" => $subTotal,
        "TotalconIva" => $totalConIVA
    ];
    $_SESSION['clientes'][] = $cliente;

    

}
function calcularSubTotal($precio, $cantidad) {
    $total = $precio * $cantidad;
    return $total;
}
function calcularTotalIVA($precio, $cantidad, $iva) {
    $total = $precio * $cantidad;
    return $total * (1 + $iva);
}
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
                <option value="<?= $key ?>"><?= $producto['nombre'] ?>: $<?= number_format($producto['precio'], 2) ?></option>
            <?php endforeach; ?>
        </select>
        <label for="">Cantidad a Comprar</label>
        <input type="number" name="cantidad" min="1" value="1">

        <button type="submit">Comprar</button>
    </form>

    <br> <br>
    <label for="">Cliente</label>
    <p><?= $cliente['nombre'] ?? '' ?></p>
    <label for="">Producto</label>
    <p><?= $cliente['producto'] ?? '' ?></p>
    <label for="">Cantidad</label>
    <p><?= $cliente['cantidad'] ?? '' ?></p>
    <label for="">Subtotal</label>
    <p>$<?= number_format($cliente['subTotal'] ?? 0, 2) ?></p>
    <label for="">Total con IVA</label>
    <p>$<?= number_format($cliente['TotalconIva'] ?? 0, 2) ?></p>
</body>
</html>