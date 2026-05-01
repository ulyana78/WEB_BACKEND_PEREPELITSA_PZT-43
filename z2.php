<?php
echo "Задание 2:<br>";
$dt = new DateTime("now", new DateTimeZone("UTC"));
echo date_format($dt, "m/d/Y");
?>