<!-- 
Opdracht 1

Maak een var_dump() voor elk van de volgende datatypes:

    String:
        Maak een stringvariabele en gebruik var_dump() om de waarde weer te geven.

    Integer:
        Maak een integervariabele en gebruik var_dump().

    Float:
        Maak een floatvariabele en gebruik var_dump().

    Arrays:
        Maak drie verschillende arrays en gebruik var_dump() voor elk:
            Een array met alleen woorden (bijv. array("rood", "blauw", "groen")).
            Een array met alleen nummers (bijv. array(1, 2, 3)).
            Een array met een combinatie van woorden en nummers (bijv. array("appel", 2, "banaan", 3)).

Let op: Resources en objects zijn niet nodig voor deze opdracht.

Gebruik de onderstaande code als voorbeeld:

php

// Voorbeeld voor een string
$s = "Hallo";
var_dump($s);
-->

<?php
function pr($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
  $s = "Hallo";
  pr($s);
  $i = 16;
  pr($i);
  $f = 3.14;
  pr($f);
  $a = array("rood", "blauw", "groen");
  pr($a);
  $a2 = array(10,9,8);
  pr($a2);
  $a3 = array("appel",5,"kiwi",1);
  pr($a3);
?>

