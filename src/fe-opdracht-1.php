<!-- Opdracht 1: Schrijf een PHP-script dat de leeftijd van een persoon controleert en een bericht weergeeft op basis van de leeftijdscategorie: 

    Jonger dan 12 jaar: "Je bent een kind."
    Tussen 12 en 17 jaar: "Je bent een tiener."
    Tussen 18 en 64 jaar: "Je bent een volwassene."
    65 jaar of ouder: "Je bent een senior."

Hint: Gebruik if, elseif en else om verschillende leeftijdscategorieën te testen.
-->

<?php

$leeftijd = 25;

if($leeftijd < 12){
    echo "Je bent een kind.";
}elseif ( $leeftijd >= 12 &&  $leeftijd <= 17){
    echo "Je bent een tiener.";   
}elseif($leeftijd >= 18 &&  $leeftijd <= 64){
    echo "Je bent een volwassene.";
}else{
    echo "Je bent een senior.";
}

?>