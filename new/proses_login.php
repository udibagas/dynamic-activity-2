<?php
if (isset($_POST['username']) && isset($_POST['password'])) {

    // Koneksi ke database
    require('db.php');

    // Query untuk mengambil username & password sesuai dengan yang di submit
    $query      = "SELECT * FROM tbl_users WHERE Username = '{$_POST['username']}' AND Password = '{$_POST['password']}'";

    // execute query
    $result     = mysqli_query($db_conn, $query);
    // take first data
    $user       = mysqli_fetch_assoc($result);

    // if data present
    if (!$user) {
        echo json_encode([
            'status' => 'ERROR',
            'message' => 'Wrong username and password!',
        ]);
    }
    // no data found
    else {
        echo json_encode([
            'status' => 'SUCCESS',
            'message' => 'Welcome, ' . $user['Username'] . '!',
            'user' => $user
        ]);
    }
}
