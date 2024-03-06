<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistemrpl";

$koneksi_db = new mysqli($servername, $username, $password, $dbname);

if ($koneksi_db->connect_error) {
    die("Connection failed: " . $koneksi_db->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$whereClause = $search ? "WHERE nama_guru LIKE '%$search%' OR NIP LIKE '%$search%' OR agama LIKE '%$search%' OR lulus LIKE '%$search%'" : '';
$sql = "SELECT NIP, nama_guru, tempat_lahir, tanggal_lahir, agama, alamat, ijazah, lulus, jenis_kelamin FROM guru $whereClause";
$result = $koneksi_db->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$koneksi_db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru & Siswa</title>
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
    }

    section {
        margin-left: 220px;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
        border-radius: 5px;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        clear: both;
    }

    .search-form {
        margin-bottom: 20px;
    }

    .search-input {
        width: 200px;
        padding: 8px;
        border-radius: 5px;
    }

    .search-btn,
    .upload-btn,
    .update-btn,
    .delete-btn {
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-btn {
        background-color: #007bff;
        color: #fff;
    }

    .search-btn:hover {
        background-color: #0056b3;
    }

    .upload-btn {
        background-color: #4299e1;
        color: #fff;
    }

    .upload-btn:hover {
        background-color: #3182ce;
    }

    .update-btn {
        background-color: #ecc94b;
        color: #2d3748;
    }

    .update-btn:hover {
        background-color: #d69e2e;
    }

    .delete-btn {
        background-color: #e53e3e;
        color: #fff;
    }

    .delete-btn:hover {
        background-color: #c53030;
    }

    .logout-btn {
        background-color: #d9534f !important;
        color: #fff !important;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            min-width: 100%;
        }

        th,
        td {
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #2d3748;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #edf2f7;
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
        Data Guru
    </header>

    <nav>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="Dashboard-admin.php">Halaman Utama</a></li>
            <li class="nav-item"><a class="nav-link" href="Data.php">Data Guru</a></li>
            <li class="nav-item"><a class="nav-link" href="datasiswa.php">Data Siswa</a></li>
            <li class="nav-item"><a class="nav-link" href="jadwal.php">Jadwal Pelajaran</a></li>
            <li class="nav-item"><a class="nav-link logout-btn" href="index.php">Log Out</a></li>
        </ul>
    </nav>

    <section>
        <form class="search-form flex items-center space-x-2 mb-8" method="GET">
            <input type="text" name="search" class="search-input border p-2 rounded-md"
                placeholder="Search by Nama Guru, NIP, Agama, or Lulus" value="<?php echo $search; ?>">
            <button type="submit"
                class="search-btn px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Search</button>
            <?php if (!empty($search)) : ?>
            <a href="Data.php" class="text-gray-500 hover:text-blue-500">Clear Search</a>
            <?php endif; ?>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Ijazah</th>
                    <th>Lulus</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['NIP'] ?></td>
                    <td><?php echo $row['nama_guru'] ?></td>
                    <td><?php echo $row['tempat_lahir'] ?></td>
                    <td><?php echo $row['tanggal_lahir'] ?></td>
                    <td><?php echo $row['agama'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td><?php echo $row['ijazah'] ?></td>
                    <td><?php echo $row['lulus'] ?></td>
                    <td><?php echo $row['jenis_kelamin'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4">
            <a href="upload_data_guru.php" class="upload-btn btn btn-primary">Upload Data Guru</a>
            <a href="update_data_guru.php" class="update-btn btn btn-warning">Update Data Guru</a>
            <a href="delete_data_guru.php" class="delete-btn btn btn-danger">Delete Data Guru</a>
        </div>
    </section>

    <footer class="bg-dark text-white">
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>
</body>

</html>