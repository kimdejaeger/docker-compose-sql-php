<!-- 
Opdracht 3:

Maak een PHP-script dat een cijfer ontvangt als variabele (bijvoorbeeld tussen 0 en 10). Gebruik een switch om de beoordeling te geven:

    9-10 = "Uitstekend"
    7-8 = "Goed"
    5-6 = "Voldoende"
    0-4 = "Onvoldoende"

Voorbeeld:
De variabele $cijfer heeft de waarde 8. Het script zou moeten laten zien:
Goed!

-->
<?php
$cijfer = 8;

switch(true) {
    case ($cijfer >= 9 && $cijfer <= 10):
        echo "Uitstekend!";
        break;

    case ($cijfer >= 7 && $cijfer < 9):
        echo "Goed!";
        break;

    case ($cijfer >= 5 && $cijfer < 7):
        echo "Voldoende!";
        break;

    case ($cijfer >= 0 && $cijfer < 5):
        echo "Onvoldoende!";
        break;

    default:
        echo "Ongeldig cijfer ingevoerd.";
        break;
}

