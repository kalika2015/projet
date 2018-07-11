<?php
$year=date('Y');
$month=date('m');
$day=date('d');
$minute=date('i');
$second=date('s');

$slug=$minute."".$day."".$month."i".$second."a".$minute."e".$second."m".$minute."".$year."".$second."p".$minute;

return $slug;