<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Siswa</title>
</head>

<body>
    <header>
        <ul>
            <li>
                <a href="Datasiswa.php">Back</a>
            </li>
        </ul>
    </header>

    <div>

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

            // Masukkan data ke tabel siswa
            $insert = mysqli_query($koneksi_db, "INSERT INTO siswa (NIS, nama_siswa, tempat_lahir, tanggal_lahir, jenis_kelamin, agama_siswa, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, alamat_siswa) VALUES ('$NIS', '$namaSiswa', '$tempatLahir', '$tanggalLahir', '$jenisKelamin', '$Agama_Siswa', '$namaAyah', '$namaIbu', '$pekerjaanAyah', '$pekerjaanIbu', '$alamatSiswa')");

            if ($insert) {
                echo '<script>showAlert("alert-success");</script>';
            } else {
                echo '<script>showAlert("alert-error", "' . mysqli_error($koneksi_db) . '");</script>';
            }
        }
        ?>


        <form action="" method="post" enctype="multipart/form-data" class="max-w-md mx-auto"
            onsubmit="showSuccessAlert()">
            <div class="mb-4">
                <label for="NIS" class="form-label">NIS</label>
                <input type="number" name="NIS" id="NIS" placeholder="Masukkan NIS" class="form-control">
            </div>

            <div class="mb-4">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama Siswa"
                    class="form-control">
            </div>

            <div class="mb-4">
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

            <div class="mb-4">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
            </div>

            <div class="mb-4">
                <label for="agama_siswa" class="form-label">Agama</label>
                <select name="agama_siswa" id="agama_siswa" class="form-control">
                    <option value="Islam">Islam</option>
                    <option value="Kristen_Protestan">Kristen Protestan</option>
                    <option value="Kristen_Katolik">Kristen Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Kong_hu_chu">Kong hu chu</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="alamat_siswa" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control"></textarea>
            </div>

            <div class="mb-4">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah"
                    class="form-control">
            </div>

            <div class="mb-4">
                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah"
                    class="form-control">
            </div>

            <div class="mb-4">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu" class="form-control">
            </div>

            <div class="mb-4">
                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu"
                    class="form-control">
            </div>

            <div class="mb-4">
                <input type="submit" name="save" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>

    <script>
    function showSuccessAlert() {
        showAlert("alert-success");
        // Set timeout to close the alert after 15 seconds
        setTimeout(function() {
            closeAlert("alert-success");
        }, 15000);
    }

    function showAlert(alertId, message) {
        const alert = document.getElementById(alertId);
        alert.classList.remove('hidden');
        if (message) {
            document.getElementById('error-message').innerText = message;
        }

        // Set timeout to close the alert after 15 seconds only for error alerts
        if (alertId === "alert-error" || alertId === "alert-duplicate") {
            setTimeout(function() {
                closeAlert(alertId);
            }, 15000);
        }
    }

    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        alert.classList.add('hidden');
    }
    </script>
</body>

</html>