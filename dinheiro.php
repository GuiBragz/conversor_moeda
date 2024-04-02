<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas Internacionais</title>
</head>
<body>
    <h1>Conversor de Moedas Internacionais</h1>
    <h2>Moedas disponíveis:</h2>
    <ul> <!-- opcoes disponiveis-->
        <li>Dólar americano (USD)</li>
        <li>Euro (EUR)</li>
        <li>Dólar canadense (CAD)</li>
        <li>Libra esterlina (GBP)</li>
        <li>Iene japonês (JPY)</li>
    </ul>
    <p>O valor a ser convertido será do real (R$) para essas outras opções de moedas.</p>
    <!-- inicio do formulario-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="opcao">Escolha uma moeda:</label><br>
        <select id="opcao" name="opcao"><!--opcoes de moedas-->
            <option value="usd">Dólar americano (USD)</option>
            <option value="eur">Euro (EUR)</option>
            <option value="cad">Dólar canadense (CAD)</option>
            <option value="gbp">Libra esterlina (GBP)</option>
            <option value="jpy">Iene japonês (JPY)</option>
        </select>
        <br><!-- valor em real a ser convertido-->
        <label for="valor">Valor a ser convertido:</label>
        <input type="text" id="valor" name="valor" required>
        <input type="submit" value="Converter">
    </form>
<!--inicio php-->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $moeda = $_POST["opcao"];
        $valor = $_POST["valor"];
/*inicio switch case*/
        switch ($moeda) {
            case "usd":
                $cash = $valor / 5.06;
                $moeda_texto = "Dólar americano (USD)";
                break;
            case "eur":
                $cash = $valor / 5.43;
                $moeda_texto = "Euro (EUR)";
                break;
            case "cad":
                $cash = $valor / 3.72;
                $moeda_texto = "Dólar canadense (CAD)";
                break;
            case "gbp":
                $cash = $valor / 6.34;
                $moeda_texto = "Libra esterlina (GBP)";
                break;
            case "jpy":
                $cash = $valor / 0.03;
                $moeda_texto = "Iene japonês (JPY)";
                break;
            default:
                $cash = 0;
                $moeda_texto = "Moeda desconhecida";
                break;
        }
/*final switch case e formataçao de valor*/
        $cash_formatado = number_format($cash, 2, ',', '.');
        echo "<strong><h1>Valor em $moeda_texto:</h1></strong>";
        echo "<h1>$cash_formatado</h1>";
    }
    ?>
    <!--fim-->
</body>
</html>
