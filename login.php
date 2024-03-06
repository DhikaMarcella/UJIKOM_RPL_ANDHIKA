<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    // Lindungi dari SQL Injection dengan Prepared Statements
    if ($role == "admin") {
        $query = "SELECT * FROM admin WHERE username=? AND password=?";
    } elseif ($role == "siswa") {
        $query = "SELECT * FROM user WHERE username=? AND password=?";
    }elseif ($role == "guru") {
        $query = "SELECT * FROM user_guru WHERE username=? AND password=?";
    } elseif ($role == "staff") {
        $query = "SELECT * FROM user_staff_admin WHERE username=? AND password=?";
    } elseif ($role == "admin_sekolah") {
        $query = "SELECT * FROM user_admin_sekolah WHERE username=? AND password=?";
    } elseif ($role == "orang_tua") {
        $query = "SELECT * FROM user_orang_tua WHERE username=? AND password=?";
    }else {
        echo '<script>alert("Invalid role.");</script>';
        exit();
    }


            // Redirect ke halaman dashboard sesuai role
            if ($role == "admin") {
                header('Location: dashboard-admin.php');
            } elseif ($role == "siswa") {
                header('Location: dashboard-view.php');
            } elseif ($role == "guru") {
                header('Location: dashboard-view.php');
            } elseif ($role == "staff") {
                header('Location: dashboard-view.php');
            } elseif ($role == "admin_sekolah") {
                header('Location: dashboard-view.php');
            }elseif ($role == "orang_tua") {
                header('Location: dashboard-view.php');
            }
            exit();
        }