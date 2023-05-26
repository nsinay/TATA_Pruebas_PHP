<?php
function sumaNumerosPares($arrayNumeros) {
    $suma = 0;
  
    foreach ($arrayNumeros as $numero) {
      if ($numero % 2 == 0) {
        $suma += $numero;
      }
    }
  
    return $suma;
  }
  $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sumaPares = sumaNumerosPares($array);
echo "La suma de los números pares es: " . $sumaPares;