<?php
namespace App;
//cambio para activar el trigger
class Calculadora
{
    public function suma($a, $b)
    {
        return $a + $b;
    }

    public function resta($a, $b)
    {
        return $a - $b;
    }

    public function multiplicacion($a, $b)
    {
        return $a * $b;
    }

    public function division($a, $b)
    {
        if ($b == 0) {
            return 'Error: División por cero';
        }
        return $a / $b;
    }

    public function raiz($a)
    {
        return sqrt($a);
    }
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calculadora = new Calculadora();

    // Obtener los valores y la operación seleccionada
    $num1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : '';

    // Realizar la operación seleccionada
    switch ($operacion) {
        case 'suma':
            $resultado = $calculadora->suma($num1, $num2);
            break;
        case 'resta':
            $resultado = $calculadora->resta($num1, $num2);
            break;
        case 'multiplicacion':
            $resultado = $calculadora->multiplicacion($num1, $num2);
            break;
        case 'division':
            $resultado = $calculadora->division($num1, $num2);
            break;
        case 'raiz':
            $resultado = $calculadora->raiz($num1);
            break;
        default:
            $resultado = 'Por favor seleccione una operación.';
            break;
    }
} else {
    $resultado = '';
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
    <h1>Calculadora PHP</h1>
    <form method="post" action="">
        <input type="number" name="num1" placeholder="Número 1" required>
        <input type="number" name="num2" placeholder="Número 2" required>
        
        <select name="operacion" required>
            <option value="">Seleccione una operación</option>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
            <option value="raiz">Raíz Cuadrada</option>
        </select>
        
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado !== ''): ?>
        <h2>Resultado: <?php echo htmlspecialchars($resultado); ?></h2>
    <?php endif; ?>
</body>
</html>