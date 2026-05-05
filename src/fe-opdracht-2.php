<!-- 
Opdracht 2: Schrijf een PHP-script dat een getal controleert en aangeeft of het getal even of oneven is.

    Als het getal even is, geef dan de boodschap "Het getal is even."
    Als het getal oneven is, geef dan de boodschap "Het getal is oneven."

Hint: Gebruik de operator (%) om te controleren of een getal deelbaar is door 2.
-->

<?php
$getal = 7;

if($getal % 2 == 0){
    echo "het getal is even.";
} else{
    echo "het getal is oneven.";
}

?>
