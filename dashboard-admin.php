<?php
include('koneksi.php');
    if (isset($_COOKIES)){

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Informasi</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    nav {
        width: 200px;
        background-color: #f4f4f4;
        padding: 10px;
        float: left;
        height: 100vh;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
    }

    nav li {
        margin-bottom: 10px;
    }

    nav a {
        display: block;
        padding: 8px;
        text-decoration: none;
        background-color: #ddd;
        color: #333;
        border-radius: 5px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .logout-btn {
        background-color: #d9534f !important;
        color: #fff !important;
    }

    section {
        margin-left: 220px;
        padding: 20px;
    }

    .home-image {
        max-width: 100%;
        height: auto;
    }

    footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        clear: both;
    }

    @media only screen and (max-width: 500px) {
        nav {
            width: 100%;
            float: none;
            margin-bottom: 10px;
            height: 45vh;
        }

        section {
            margin-left: 0;
            padding: 10px;
        }
    }

    @media only screen and (min-width: 500px) {
        body {
            background-color: #f8f9fa;
        }

        header {
            font-size: 2em;
        }

        nav a {
            padding: 15px;
        }
    }
    </style>
</head>

<body>

    <header>
        Sistem Informasi RPL
    </header>

    <nav>
        <ul>
            <li class="nav-item"><a class="nav-link" href="Dashboard-admin.php">Halaman Utama</a></li>
            <li class="nav-item"><a class="nav-link" href="Data.php">Data Guru</a></li>
            <li class="nav-item"><a class="nav-link" href="datasiswa.php">Data Siswa</a></li>
            <li class="nav-item"><a class="nav-link" href="jadwal.php">Jadwal Pelajaran</a></li>
            <li class="nav-item"><a class="nav-link logout-btn" href="index.php">Log Out</a></li>
        </ul>
    </nav>

    <section>
        <h2>Selamat datang di Website RPL di SMKN 5 KOTA BEKASI</h2>
        <h2>Kejuruan Rekayasa Perangkat Lunak</h2>
        <p>Menyongsong masa depan digital dengan keahlian di bidang Rekayasa
            Perangkat Lunak. Kami mendorong siswa untuk menjadi pengembang perangkat lunak handal dengan keterampilan
            dan
            pengetahuan terkini.</p>
        <p>Di sini, kami membimbing setiap siswa untuk menguasai pemrograman, pengujian
            perangkat lunak, dan metodologi pengembangan terbaik. Bergabunglah dengan kami dan jadilah bagian dari
            revolusi teknologi!</p>

    </section>

    <footer>
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>

</body>

</html>