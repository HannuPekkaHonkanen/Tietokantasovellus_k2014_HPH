<?php
$yhteys = new PDO("pgsql:");
$yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = "select nimi from Resepti";
$kysely = $yhteys->prepare($sql);


if ($kysely->execute()) {
  $kakkonen = $kysely->fetchColumn();
  var_dump($kakkonen);
}

echo "Hei maailma!";

?>
