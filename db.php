<?php

$db_host    = 'localhost';
$db_user    = 'root';
$db_pass    = 'bismillah';
$db_name    = 'tugas';

$db_conn    = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

if (!$db_conn) {
    echo 'Koneksi ke database gagal!';
}
