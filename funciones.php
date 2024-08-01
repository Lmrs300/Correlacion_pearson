<?php

function most_datos($datosx, $datosy)
{
    echo "<table><tr><td class='td_sum'>X</td>";


    for ($i = 0; $i < count($datosx); $i++) {
        echo "<td>" . $datosx[$i] . "</td>";
    }
    echo "</tr><tr><td class='td_sum' style='border-top:1px solid black';>Y</td>";
    for ($i = 0; $i < count($datosx); $i++) {
        echo "<td>" . $datosy[$i] . "</td>";
    }
    echo "</tr></table>";
}

function calc_xy($datosx, $datosy)
{
    $xy = [];

    for ($i = 0; $i < count($datosx); $i++) {
        $xy[$i] = $datosx[$i] * $datosy[$i];
    }

    return $xy;
}

function calc_x2_y2($datosx_y)
{
    $x2 = [];

    for ($i = 0; $i < count($datosx_y); $i++) {
        $x2[$i] = $datosx_y[$i] ** 2;
    }

    return $x2;
}

function tab($datosx, $datosy, $xy, $x2, $y2)
{
    //Tabla de datos no agrupados.

    for ($i = 0; $i < count($datosx); $i++) {
        echo "<tr>";
        echo "<td>" . $datosx[$i] . "</td>";
        echo "<td>" . $datosy[$i] . "</td>";
        echo "<td>" . $xy[$i] . "</td>";
        echo "<td>" . $x2[$i] . "</td>";
        echo "<td>" . $y2[$i] . "</td>";
        echo "</tr>";
    }
}

function sum_vec($vec)
{
    $sum_vec = 0;
    for ($i = 0; $i < count($vec); $i++) {
        $sum_vec += $vec[$i];
    }
    return $sum_vec;
}

function pearson($datosx, $sum_datosx, $sum_datosy, $sum_xy, $sum_x2, $sum_y2)
{
    $n = count($datosx);
    $corre_pearson = ($n * $sum_xy - ($sum_datosx * $sum_datosy)) / sqrt(($n * $sum_x2 - ($sum_datosx) ** 2) * ($n * $sum_y2 - ($sum_datosy) ** 2));

    return bcdiv($corre_pearson, "1", 2);
}
