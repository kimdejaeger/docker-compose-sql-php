<!-- 
Opdracht 1:
Maak zelf een array $garage met minimaal 2 auto’s.
-->

   autos = ["Volvo", "Toyota"];
    foreach (autos as auto) {
        echo auto . " ";
    }
    <?php
$garage = [
    [
        "merk" => "Volvo",
        "kleur" => "blauw",
        "kmstand" => 120000
    ],
    [
        "merk" => "Toyota",
        "kleur" => "rood",
        "kmstand" => 85000
    ]
];

foreach ($garage as $auto) {
    echo "Merk: " . $auto["merk"] . "<br>";
    echo "Kleur: " . $auto["kleur"] . "<br>";
    echo "Kmstand: " . $auto["kmstand"] . "<br><br>";
}
?>