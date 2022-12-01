<?php
   $conn_array = array (
    "UID" => "phuc",
    "PWD" => "@hutech123",
    "Database" => "cnpm",
);
$conn = sqlsrv_connect('cnpmhutech.database.windows.net', $conn_array);
?>