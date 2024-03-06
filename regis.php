<?php
include('koneksi.php');

// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $birthDate = $_POST['birthDate'];
    $role = $_POST['role'];

    // Lindungi dari SQL Injection dengan Prepared Statements
    if ($role == "admin") {
        $query = "INSERT INTO admin (username, password, email, birthDate) VALUES (?, ?, ?, ?)";
    }

    if ($role == "siswa") {
        $query = "INSERT INTO user (username, password, email, birthDate) VALUES (?, ?, ?, ?)";
    }

    if ($role == "guru") {
        $query = "INSERT INTO user_guru (username, password, email, birthDate) VALUES (?, ?, ?, ?)";
    }

    if ($role == "staff") {
        $query = "INSERT INTO user_staff_admin (username, password, email, birthDate) VALUES (?, ?, ?, ?)";
    }

    if ($role == "admin_sekolah") {
        $query = "INSERT INTO user_admin_sekolah (username, password, email, birthDate) VALUES (?, ?, ?, ?)";
    }

    if ($role == "orang_tua") {
        $query = "INSERT INTO user_orang_tua (username, password, email, birthDate) VALUES (?, ?, ?, ?)";
    }

    $stmt = mysqli_prepare($koneksi_db, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $email, $birthDate);

        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            $_SESSION['username'] = $username;

            if ($role == "admin") {
                header('Location: dashboard-admin.php');
                exit();
            } elseif ($role == "siswa") {
                header('Location: dashboard-view.php');
                exit();
            } elseif ($role == "guru") {
                header('Location: dashboard-view.php');
                exit();
            } elseif ($role == "staff") {
                header('Location: dashboard-view.php');
                exit();
            } elseif ($role == "admin_sekolah") {
                header('Location: dashboard-view.php');
                exit();
            } elseif ($role == "orang_tua") {
                header('Location: dashboard-view.php');
            }
        } else {
            echo '<script>alert("Registration failed. Please try again. ' . mysqli_error($koneksi_db) . '");</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Error in preparing statement.");</script>';
    }
} else {
    echo '<script>alert("Invalid request method.");</script>';
}

$koneksi_db->close();
