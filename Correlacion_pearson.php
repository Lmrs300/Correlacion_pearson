<?php


include("funciones.php");

if (isset($_POST["datosx"])) {
    $datosx = explode(",", $_POST["datosx"]);

    $datosy = explode(",", $_POST["datosy"]);
}



//ejercicio 1

//$datosx = [2, 3, 5, 7, 8];

//$datosy = [14, 20, 32, 42, 44];

//ejercicio 2

//$datosx = [6, 4, 8, 5, 3.5];

//$datosy = [6.5, 4.5, 7, 5, 4];

//ejercicio 3

//$datosx = [1.86, 1.89, 1.90, 1.92, 1.93, 1.93, 1.98, 2.01, 2.03, 2.05];

//$datosy = [85, 85, 86, 90, 87, 91, 93, 103, 100, 101];

//ejercicio 4

//$datosx = [80, 79, 83, 84, 78, 60, 82, 85, 79, 84, 80, 62];

//$datosy = [300, 302, 315, 330, 300, 250, 300, 340, 315, 330, 310, 240];


if (isset($_POST["datosx"])) {
    $xy = calc_xy($datosx, $datosy);

    $x2 = calc_x2_y2($datosx);

    $y2 = calc_x2_y2($datosy);

    $sum_datosx = sum_vec($datosx);

    $sum_datosy = sum_vec($datosy);

    $sum_xy = sum_vec($xy);

    $sum_x2 = sum_vec($x2);

    $sum_y2 = sum_vec($y2);

    $corre_pearson = pearson($datosx, $sum_datosx, $sum_datosy, $sum_xy, $sum_x2, $sum_y2);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correlacion de Pearson</title>
    <link rel="stylesheet" href="estilos.css?v=<?php echo (rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo (rand()); ?>"></script>
</head>

<body>
    <h1 id="titulo">Correlacion de Pearson</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="datosx">
            Datosx: <br><textarea name="datosx" id="datosx" rows="3" placeholder="Ej: 1,2,3,4,5,10,15,20,30,1.86" required></textarea>
        </label>
        <br>
        <label for="datosx">
            Datosy: <br><textarea name="datosy" id="datosy" rows="3" placeholder="Ej: 1,2,3,4,5,10,15,20,30,1.86" required></textarea>
        </label>
        <br>
        <div class="div_submit">
            <input type="submit" value="Calcular">
        </div>

    </form>

    <?php if (isset($_POST["datosx"]) && isset($_POST["datosy"])) { ?>
        <div id="div_result">
            <?php
            if (isset($datosx, $datosy)) {
                most_datos($datosx, $datosy);
            }

            echo "<br>";
            echo "<br>";

            ?>



            <table>
                <thead>
                    <th>x</th>
                    <th>y</th>
                    <th>x*y</th>
                    <th>x²</th>
                    <th>y²</th>
                </thead>
                <tbody>
                    <?php
                    tab($datosx, $datosy, $xy, $x2, $y2);
                    ?>
                    <tr style="border-top: 1px solid black;">
                        <td><?php echo  $sum_datosx ?></td>
                        <td><?php echo  $sum_datosy ?></td>
                        <td><?php echo  $sum_xy ?></td>
                        <td><?php echo  $sum_x2 ?></td>
                        <td><?php echo  $sum_y2 ?></td>
                    </tr>
                </tbody>
            </table>

            <ul>
                <li>
                    $$r={<?php echo count($datosx) ?>*<?php echo $sum_xy ?>-(<?php echo $sum_datosx ?>*<?php echo $sum_datosy ?>)\over\sqrt{[<?php echo count($datosx) ?>*<?php echo $sum_x2 ?>-(<?php echo $sum_datosx ?>)^2]*[<?php echo count($datosy) ?>*<?php echo $sum_y2 ?>-(<?php echo $sum_datosy ?>)^2]}}=<?php echo $corre_pearson ?>$$
                </li>
            </ul>
        </div>

    <?php } ?>



    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</body>

</html>