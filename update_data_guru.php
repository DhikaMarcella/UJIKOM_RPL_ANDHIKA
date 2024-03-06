<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Siswa</title>
</head>

<body class="bg-gray-100">
    <header class="bg-primary p-4">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="Datasiswa.php" class="nav-link text-white">Back</a>
            </li>
        </ul>
    </header>

    <div class="container mt-5 p-4 bg-white shadow-md rounded-md">

        <?php
        include 'koneksi.php';

        if (isset($_POST['save'])) {
            $NIS = $_POST['NIS'];
            $namaSiswa = $_POST['nama_siswa'];
            $tempatLahir = $_POST['tempat_lahir'];
            $tanggalLahir = $_POST['tanggal_lahir'];
            $Agama_Siswa = $_POST['agama_siswa'];
            $namaAyah = $_POST['nama_ayah'];
            $namaIbu = $_POST['nama_ibu'];
            $pekerjaanAyah = $_POST['pekerjaan_ayah'];
            $pekerjaanIbu = $_POST['pekerjaan_ibu'];
            $alamatSiswa = $_POST['alamat'];
            $jenisKelamin = $_POST['jenis_kelamin'];

            $checkExisting = mysqli_query($koneksi_db, "SELECT * FROM siswa WHERE NIS='$NIS'");
            $rowCount = mysqli_num_rows($checkExisting);

            if ($rowCount > 0) {
                $update = mysqli_query($koneksi_db, "UPDATE siswa SET 
                nama_siswa='$namaSiswa', 
                tempat_lahir='$tempatLahir', 
                tanggal_lahir='$tanggalLahir', 
                jenis_kelamin='$jenisKelamin', 
                agama_siswa='$Agama_Siswa', 
                nama_ayah='$namaAyah', 
                nama_ibu='$namaIbu', 
                pekerjaan_ayah='$pekerjaanAyah', 
                pekerjaan_ibu='$pekerjaanIbu', 
                alamat_siswa='$alamatSiswa' 
                WHERE NIS='$NIS'");

                if ($update) {
                    echo '<script>showAlert("alert-success");</script>';
                } else {
                    echo '<script>showAlert("alert-error", "' . mysqli_error($koneksi_db) . '");</script>';
                }
            } else {
                echo '<script>showAlert("alert-duplicate");</script>';
            }
        }
        ?>


        <form action="" method="post" enctype="multipart/form-data" class="max-w-md mx-auto">
            <div class="mb-3">
                <label for="NIS" class="form-label">NIS</label>
                <input type="number" name="NIS" id="NIS" placeholder="Masukkan NIS" class="form-control">
            </div>

            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama Siswa"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <select name="tempat_lahir" id="tempat_lahir" class="form-control">
                    <!-- Banten -->
                    <option value="Serang">Serang</option>
                    <option value="Cilegon">Cilegon</option>
                    <option value="Tangerang">Tangerang</option>
                    <option value="Tangerang Selatan">Tangerang Selatan</option>
                    <!-- Jakarta -->
                    <option value="Jakarta Pusat">Jakarta Pusat</option>
                    <option value="Jakarta Utara">Jakarta Utara</option>
                    <option value="Jakarta Barat">Jakarta Barat</option>
                    <option value="Jakarta Selatan">Jakarta Selatan</option>
                    <option value="Jakarta Timur">Jakarta Timur</option>
                    <!-- West Java -->
                    <option value="Bekasi">Bekasi</option>
                    <option value="Depok">Depok</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Sukabumi">Sukabumi</option>
                    <!-- Central Java -->
                    <option value="Semarang">Semarang</option>
                    <option value="Salatiga">Salatiga</option>
                    <option value="Kendal">Kendal</option>
                    <option value="Pekalongan">Pekalongan</option>
                    <option value="Tegal">Tegal</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
            </div>

            <div class="mb-3">
                <label for="agama_siswa" class="form-label">Agama</label>
                <select name="agama_siswa" id="agama_siswa" class="form-control">
                    <option value="Islam">Islam</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Kristen Katolik">Kristen Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat_siswa" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu" class="form-control">
            </div>

            <div class="mb-3">
                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu"
                    class="form-control">
            </div>

            <div class="mb-3">
                <input type="submit" name="save" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>