<?php
function dbconn() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbconn = mysqli_connect($servername, $username, $password, "CAW") or die(mysql_error());
    return $dbconn;
}
?>