<?php
$productos = [
    101 => ["nombre" => "Laptop", "precio" => 1500, "stock" => 5],
    102 => ["nombre" => "Mouse", "precio" => 25, "stock" => 10],
    103 => ["nombre" => "Teclado", "precio" => 45, "stock" => 7],
    104 => ["nombre" => "Monitor", "precio" => 300, "stock" => 3],
    105 => ["nombre" => "Impresora", "precio" => 200, "stock" => 4],
];

// Función para vender un producto
function venderProducto(&$productos, $id, $cantidad) {
    if (isset($productos[$id])) { // Verificar si el producto existe
        if ($productos[$id]["stock"] >= $cantidad) {
            $productos[$id]["stock"] -= $cantidad;
            echo "✅ Venta realizada: $cantidad unidades de " . $productos[$id]["nombre"] . "<br>";
        } else {
            echo "❌ Error: No hay suficiente stock de " . $productos[$id]["nombre"] . "<br>";
        }
    } else {
        echo "❌ Error: Producto no encontrado.<br>";
    }
}

// Función para agregar un nuevo producto
function agregarProducto(&$productos, $id, $nombre, $precio, $stock) {
    if (!isset($productos[$id])) { // Verificar que el ID no exista ya
        $productos[$id] = [
            "nombre" => $nombre,
            "precio" => $precio,
            "stock" => $stock
        ];
        echo "✅ Producto '$nombre' agregado con éxito.<br>";
    } else {
        echo "❌ Error: El ID $id ya está en uso.<br>";
    }
}

// Prueba vender productos
venderProducto($productos, 103, 2); // Vende 2 teclados
venderProducto($productos, 101, 6); // Intenta vender 6 laptops (error)

// Agregar un nuevo producto
agregarProducto($productos, 106, "Tablet", 250, 8);

// Ver el inventario actualizado
echo "<pre>";
print_r($productos);
echo "</pre>";
?>
