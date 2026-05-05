<!-- 
Opdracht 1: Schrijf een script dat de prijs van een product berekent inclusief btw. 
Stel dat de prijs zonder btw €50 is en de btw 21%. Bereken de btw, de totale prijs en geef beide weer. 

Hint: kijk naar Rekenkundige Operators
--><?php
$prijsZonderBtw = 50;
$BtwPercentage = 21;

$TotalePrijs = $prijsZonderBtw + ($prijsZonderBtw / 100 * $BtwPercentage);

echo "Prijs zonder btw: €$prijsZonderBtw <br>";
echo "Totale prijs: €$TotalePrijs";
?>
