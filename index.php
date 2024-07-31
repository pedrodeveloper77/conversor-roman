<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor Romano/Real</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Conversor Romano/Real</h1>
        <form action="index.php" method="post">
            <div class="form-value">
                <label for="romanInput">Número Romano:</label>
                <input type="text" id="romanInput" name="romanoInput" placeholder="Ex: XLVIII">
            </div>
            <div class="form-value">
                <button type="submit" name="convertToDecimal">Converter para Real</button>
            </div>
            <div class="form-value">
                <label for="decimalInput">Número Real:</label>
                <input type="number" id="decimalInput" name="decimalInput" placeholder="Ex: 48">
            </div>
            <div class="form-value">
                <button type="submit" name="convertToRomano">Converter para Romano</button>
            </div>
        </form>

        <div class="result">
            <?php
                include 'classes/Matematica.php';

                $matematica = new Matematica();

                // Processa a conversão de Romano para Decimal
                if (isset($_POST['convertToDecimal'])) {
                    $romanInput = $_POST['romanoInput'] ?? '';
                    if (!empty($romanInput)) {
                        $matematica->convertToRomano(strtoupper($romanInput));
                        echo "Número Decimal: " . $matematica->getDecimal();
                    } else {
                        echo "Por favor, insira um número romano.";
                    }
                }

                // Processa a conversão de Decimal para Romano
                if (isset($_POST['convertToRomano'])) {
                    $decimalInput = $_POST['decimalInput'] ?? '';
                    if (!empty($decimalInput) && is_numeric($decimalInput)) {
                        $matematica->convertToReal($decimalInput);
                        echo "Número Romano: " . $matematica->getRomano();
                    } else {
                        echo "Por favor, insira um número decimal válido.";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
