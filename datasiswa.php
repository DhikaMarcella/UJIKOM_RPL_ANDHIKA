<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistemrpl";

$koneksi_db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($koneksi_db->connect_error) {
    die("Connection failed: " . $koneksi_db->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$whereClause = $search ? "WHERE nama_siswa LIKE '%$search%' OR NIS LIKE '%$search%' OR agama_siswa LIKE '%$search%'" : '';
$sql = "SELECT NIS, nama_siswa, tempat_lahir, tanggal_lahir, jenis_kelamin, agama_siswa, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, alamat_siswa FROM siswa $whereClause";
$result = $koneksi_db->query($sql);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the database connection
$koneksi_db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

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
        Data Siswa
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
        <form class="search-form flex items-center space-x-2 mb-8" method="GET">
            <input type="text" name="search" class="search-input border p-2 rounded-md"
                placeholder="Search by Nama Siswa, NIS, Agama, or Lulus" value="<?php echo $search; ?>">
            <button type="submit"
                class="search-btn">Search</button>
            <?php if (!empty($search)) : ?>
            <a href="datasiswa.php">Clear Search</a>
            <?php endif; ?>
        </form>

        <!-- Data Table -->
        <table>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Alamat Siswa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['NIS'] ?></td>
                    <td><?php echo $row['nama_siswa'] ?></td>
                    <td><?php echo $row['tempat_lahir'] ?></td>
                    <td><?php echo $row['tanggal_lahir'] ?></td>
                    <td><?php echo $row['jenis_kelamin'] ?></td>
                    <td><?php echo $row['agama_siswa'] ?></td>
                    <td><?php echo $row['nama_ayah'] ?></td>
                    <td><?php echo $row['nama_ibu'] ?></td>
                    <td><?php echo $row['pekerjaan_ayah'] ?></td>
                    <td><?php echo $row['pekerjaan_ibu'] ?></td>
                    <td><?php echo $row['alamat_siswa'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="button_crud">
            <a href="upload_data_siswa.php">Upload Data Siswa</a>
            <a href="update_data_siswa.php">Update Data Siswa</a>
            <a href="delete_data_siswa.php">Delete Data Siswa</a>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>

</body>

</html>