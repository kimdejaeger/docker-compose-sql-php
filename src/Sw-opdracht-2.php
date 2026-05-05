<!-- Opdracht 2:

Maak een PHP-script dat een maand van het jaar ontvangt als een variabele. Gebruik een switch om het seizoen te bepalen en geef een bericht weer:

    "Winter" voor december, januari, februari
    "Lente" voor maart, april, mei
    "Zomer" voor juni, juli, augustus
    "Herfst" voor september, oktober, november

Voorbeeld:
De variabele $maand heeft de waarde "augustus". Het script zou moeten laten zien:
Het is zomer! -->

<?php
$maand = "augustus";

switch ($maand) {
    case "december":
    case "januari":
    case "februari":
        echo "Het is winter!";
        break;

    case "maart":
    case "april":
    case "mei":
        echo "Het is lente!";
        break;

    case "juni":
    case "juli":
    case "augustus":
        echo "Het is zomer!";
        break;

    case "september":
    case "oktober":
    case "november":
        echo "Het is herfst!";
        break;

    default:
        echo "Ongeldige maand ingevoerd.";
        break;
}