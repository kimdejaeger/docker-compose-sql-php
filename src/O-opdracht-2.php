<!-- 
 Opdracht 2: Stel je hebt een spaarrekening met een saldo van €1000. 
 Je stort elke maand €50 bij en aan het einde van het jaar krijg je 5% rente op je totale saldo. Bereken het eindsaldo na één jaar.

 Hint: kijk naar Assignment Operators
-->
<?php
$saldo = 1000;
$maandelijkseStorting = 50;
$aantalMaanden = 12;
$renteprecentage = 0.05;

$saldo += $maandelijkseStorting * $aantalMaanden;

$rente = $saldo * $renteprecentage; 

$eindSaldo = $saldo + $rente;

echo "Het eindsaldo na één jaar is: €" . $eindSaldo;
?>