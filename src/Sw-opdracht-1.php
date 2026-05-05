<!-- 

Opdracht 1:
Maak een PHP-script dat de naam van de dag van de week ontvangt als een variabele. Gebruik een switch om te controleren welke dag het is en geef een bericht weer, zoals:

    "Het is maandag, begin van de week!"
    "Het is vrijdag, bijna weekend!"
    "Het is zondag, rustdag!"

Voorbeeld:
De variabele $dag heeft de waarde "dinsdag". Het script zou moeten laten zien:
Het is dinsdag, midden van de week! 
-->

<?php

$dag = "dinsdag";

switch ($dag) {
    case "maandag":
        echo "Het is maandag, begin van de week!";
        break;

    case "dinsdag":
    case "woensdag":
    case "donderdag":
        echo "Het is $dag, midden van de week!";
        break;

    case "vrijdag":
        echo "Het is vrijdag, bijna weekend!";
        break;

    case "zaterdag":
        echo "Het is zaterdag, weekend!";
        break;

    case "zondag":
        echo "Het is zondag, rustdag!";
        break;

    default:
        echo "Ongeldige dag ingevoerd.";
        break;
}

?>