<!-- 
Opdracht 3: Type Controle zonder loops
Schrijf een PHP-script dat een array met verschillende waarden bevat (bijv. een integer, een float en een string). 
Gebruik de functies is_int(), is_float(), en is_double() om het type van elke waarde afzonderlijk te controleren en geef de resultaten weer.
Deze opdracht kan vrij pittig zijn, maar er wordt van je verwacht je ook onderzoek gaat doen als je iets niet snapt of weet.
-->
<?php
$arrayMix = array(42, 3.14, "Hallo");

for ($i = 0; $i < count($arrayMix); $i++) {
    $element = $arrayMix[$i];

    if (is_int($element)) {
        echo "$element is een integer.<br>";
    } elseif (is_float($element)) {
        echo "$element is een float.<br>";
    } elseif (is_double($element)) {
        echo "$element is een double.<br>";
    } else {
        echo "$element is van een ander type.<br>";
    }
}
?>