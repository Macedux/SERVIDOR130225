<?php
// index.php

// Comprobar si se ha enviado el formulario
$result = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de la calculadora para procesar los datos
    include 'calculadora.php';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form method="post" action="">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" required>
        <br>
        
        <label for="num2">Número 2:</label>
        <input type="number" name="num2" required>
        <br>
        
        <label for="operacion">Operación:</label>
        <select name="operacion" required>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select>
        <br>
        
        <input type="submit" value="Calcular">
    </form>

    <?php if ($result !== null): ?>
        <h2>Resultado: <?php echo htmlspecialchars($result); ?></h2>
    <?php endif; ?>
</body>
</html>