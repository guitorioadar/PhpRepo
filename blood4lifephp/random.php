<?php

include 'connection.php';

$st = sprintf("%06d", mt_rand(1, 999999));
echo $st;

?>