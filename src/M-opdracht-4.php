<!-- 
Opdracht 4
Opdracht: Maak een lijst van decimale getallen zoals 3.45, 7.89, 2.1, 9.65. 
Gebruik de round()-functie om elk getal af te ronden en toon zowel het originele als het afgeronde getal.
-->
<?php
$decimaleGetallen = [3.45, 7.89, 2.1, 9.65];
for ($i = 0; $i < count($decimaleGetallen); $i++) {
    echo "Origineel getal: " . $decimaleGetallen[$i] . " - Afgerond getal: " . round($decimaleGetallen[$i]) . "<br>";
}