<?php

require('db.php');

// logic untuk menyimpan data
if (isset($_POST['submit'])) {
    $query = "INSERT INTO tbl_students (FirstName, LastName, MiddleName, Gender, DBirth) 
        VALUES ('{$_POST['Firstname']}', '{$_POST['Lastname']}', '{$_POST['Middlename']}', '{$_POST['Gender']}', '{$_POST['DBirth']}')";
    $result = mysqli_query($db_conn, $query);

    if ($result) {
        echo json_encode([
            'status' => 'SUCCESS',
            'message' => 'Data has been added!'
        ]);
    } else {
        echo json_encode([
            'status' => 'ERROR',
            'message' => 'Failed to insert data!'
        ]);
    }
} else {
    // logic untuk ambil semua data students
    $data   = []; // data container
    $query  = "SELECT * FROM tbl_students ORDER  BY FirstName ASC";
    $result = mysqli_query($db_conn, $query);

    // looping all data
    while ($row = mysqli_fetch_assoc($result)) {
        // append to data
        $data[] = $row;
    }

    // return to browser
    echo json_encode(['data' => $data]);
}
