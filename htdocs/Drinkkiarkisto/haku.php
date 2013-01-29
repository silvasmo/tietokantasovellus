<?php

try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=silvasmo",
                      "silvasmo", "9bc4fda7eac0d9ed");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//kyselyn suoritus
$kysely = $yhteys->prepare("SELECT * FROM aineet");
$kysely->execute();

//haun tulostus
echo "<h2>" . "Drinkkiarkiston aineet" . "</h2>";
echo "<u1>";
while ($rivi = $kysely->fetch()) {
    echo "<li>" . $rivi["nimi"] . "</li>";
}
echo "</u1>";

?>
