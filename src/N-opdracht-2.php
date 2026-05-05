<!-- 
Opdracht 2: Float Waarden
Declareer twee variabelen, $float1 en $float2, met verschillende float waarden. Gebruik is_float() om te controleren of ze daadwerkelijk float zijn en print het resultaat.
-->

<?php
$float1 = 3.14;
$float2 = 2.71;
if(is_float($float1)){
    echo("Het is een float");
}else {
    echo("Het is geen float");
}
echo "\n";
if(is_float($float2)){
    echo("Het is een float");
}else {
    echo("Het is geen float");
}
?>