$(document).ready(function () {
    // hide navbar and student list by default
    $('.navbar, .student-list, #student-form').hide();

    // Untuk handle login
    $('#login_btn').click(function(e) {
        // untuk menghindari form disubmit dengan methode konvensional
        e.preventDefault();

        var username = $('#username').val();
        var password = $('#password').val();

        // jika username atau password tidak diisi tampilkan alert kemudian return agar blok kode di bawahnya tidak dieksekusi
        if (!username) {
            alertify.alert("ERROR", "Please enter username");
            return
        }

        if (!password) {
            alertify.alert("ERROR", "Please enter password");
            return
        }

        $.ajax({
            method: 'POST',
            url: 'proses_login.php',
            dataType: 'json',
            data: {
                username,
                password,
            },
            success: function (data) {
                alertify.set('notifier','position', 'top-center');
                
                if (data.status == 'SUCCESS') {
                    alertify.notify(data.message, 'success', 3, function () {
                        $('.login-form').hide();
                        $('.navbar, .student-list').show();
                        $('.username').text(username)
                    });
                    
                } else {
                    alertify.notify(data.message, 'error', 3);
                }
                
            }
        })
    })

    // ambil data student via ajax tampilkan ke table
    const tableStudent = $('#student').DataTable({
        "ajax": "proses_student.php",
        'columns': [
            {
                data: 'Firstname'
            },
            {
                data: 'Middlename'
            },
            {
                data: 'Lastname'
            },
            {
                data: 'Gender'
            },
            {
                data: 'DBirth'
            },
        ]
    });

    // to hide and show form student
    $('#new-btn').click(function() {
        $('#student-form').toggle('slow');
    });

    // untuk menyimpan data student
    $('#save-btn').click(function(e) {
        e.preventDefault();

        // get all value
        var Firstname = $('#Firstname').val();
        var Middlename = $('#Middlename').val();
        var Lastname = $('#Lastname').val();
        var Gender = $('#Gender').val();
        var DBirth = $('#DBirth').val();

        // validasi pastikan semua data terisi
        if (!Firstname || !Middlename || !Lastname || !Gender || !DBirth) {
            alertify.notify("Please fill the form correctly!", 'error', 3);
            return
        }

        $.ajax({
            method: 'POST',
            url: 'proses_student.php',
            dataType: 'json',
            data: {
                Firstname,
                Middlename,
                Lastname,
                Gender,
                DBirth,
                submit: true
            },
            success: function (data) {
                if (data.status == 'SUCCESS') {
                    alertify.notify(data.message, 'success', 3);
                    // reload table
                    tableStudent.ajax.reload();
                    // trigger cancel button to reset the form
                    $('#cancel-btn').click();
                } else {
                    alertify.notify(data.message, 'error', 3);
                }
                
            }
        })
    })
});