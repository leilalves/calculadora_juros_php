<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Juros</title>
</head>
<body bgcolor="#d9c675">

    <h1 style="text-align: center;">Calculadora de Juros</h1>
    
    <form style="text-align: center;" action="" method="GET">

        <label>Juros:</label>
        <input type="number" name="juros"><br><br>

        <label>Capital:</label>
        <input type="number" name="capital"><br><br>

        <label>Taxa:</label>
        <input type="number" name="taxa"><br><br>

        <label>Prazo:</label>
        <input type="number" name="prazo"><br><br>

        <input type="submit" value="Calcular"><br><br>

        <p>
            <label>Escolha uma operação:</label><br>
            <select name="operacao">
                <option value="jurosSimples">Juros</option>
                <option value="capital">Capital</option>
            </select>
            
        </p>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['capital']) && isset($_GET['taxa']) && isset($_GET['prazo']) && isset($_GET['operacao'])) {       
            $j = $_GET['juros'];
            $c = $_GET['capital'];
            $i = $_GET['taxa'];
            $n = $_GET['prazo'];
            $op = $_GET['operacao'];

            function juros($capital, $taxa, $prazo) {
                return ($capital * $taxa * $prazo) / 100;
            }

            if ($op == 'jurosSimples') {
                $juros = juros($c, $i, $n);
                echo "<h2 style='text-align: center;'>O valor dos juros é: R$ " . juros($c, $i, $n) . "</h2>";
            }

            function capital($juros, $taxa, $prazo) {
                return ($juros / ($taxa / 100 * $prazo));
            }

            if ($op == 'capital') {
                $capital = capital($j, $i, $n);
                echo "<h2 style='text-align: center;'>O valor do capital é: R$ " . capital($j, $i, $n) . "</h2>";
            }
        }
    }
    ?>
</body>
</html>
