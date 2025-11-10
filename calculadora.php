<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora</title>
</head>
<body>
<?php
// Captura segura dos dados e converte para float
$valor1 = (isset($_GET['v1']) && $_GET['v1'] !== '') ? (float) $_GET['v1'] : 0.0;
$valor2 = (isset($_GET['v2']) && $_GET['v2'] !== '') ? (float) $_GET['v2'] : 0.0;
$operacao = $_GET['op'] ?? '';
$resultado = '';
?>
<main>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
        <label for="v1">Valor 1</label>
        <input type="number" step="any" name="v1" id="v1" value ="<?php echo htmlspecialchars((string)$valor1); ?>">

        <label for="v2">Valor 2</label>
        <input type="number" step="any" name="v2" id="v2" value ="<?php echo htmlspecialchars((string)$valor2); ?>">

        <label for="op">Operação</label>
        <select name="op" id="op">
            <option value="">--Selecione--</option>
            <option value="soma" <?php if ($operacao === 'soma') echo 'selected'; ?>>Soma (+)</option>
            <option value="subtracao" <?php if ($operacao === 'subtracao') echo 'selected'; ?>>Subtração (-)</option>
            <option value="multiplicacao" <?php if ($operacao === 'multiplicacao') echo 'selected'; ?>>Multiplicação (×)</option>
            <option value="divisao" <?php if ($operacao === 'divisao') echo 'selected'; ?>>Divisão (÷)</option>
        </select>

        <input type="submit" value="Calcular">
    </form>
</main>

<section id="resultado">
    <h2>Resultado do cálculo</h2>
    <?php
    // Só calcula se o usuário escolheu uma operação
    if ($operacao !== '') {
        if ($operacao === 'soma') {
            $resultado = $valor1 + $valor2;
        } elseif ($operacao === 'subtracao') {
            $resultado = $valor1 - $valor2;
        } elseif ($operacao === 'multiplicacao') {
            $resultado = $valor1 * $valor2;
        } elseif ($operacao === 'divisao') {
            // evita divisão por zero
            if ($valor2 != 0.0) {
                $resultado = $valor1 / $valor2;
            } else {
                $resultado = 'Erro: divisão por zero';
            }
        } else {
            $resultado = 'Operação inválida';
        }

        echo "<p><strong>Resultado:</strong> $resultado</p>";
    }

    ?>
</section>
</body>
</html>
