<?php
include 'koneksi.php';

// Check if an NIP is provided for deletion
if (isset($_GET['deleteNIP'])) {
    $deleteNIP = $_GET['deleteNIP'];
    $delete = mysqli_query($koneksi_db, "DELETE FROM guru WHERE NIP='$deleteNIP'");

    if ($delete) {
        echo '<script>showAlert("alert-success", "Data berhasil dihapus.");</script>';
    } else {
        echo '<script>showAlert("alert-error", "' . mysqli_error($koneksi_db) . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Guru</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <header class="bg-danger p-4 text-white">
        <div class="container">
            <a href="Datasiswa.php" class="text-white">Back</a>
        </div>
    </header>

    <div class="container mt-4">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title">Delete Siswa</h5>

                <!-- Data Deletion Form -->
                <form action="" method="get">
                    <div class="mb-3">
                        <label for="deleteNIP" class="form-label">NIS</label>
                        <input type="number" name="deleteNIP" id="deleteNIP" placeholder="Masukkan NIP"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function showAlert(alertId, message) {
        const alert = document.getElementById(alertId);
        alert.classList.remove('hidden');
        if (message) {
            document.getElementById('success-message').innerText = message;
        }

        // Set timeout to close the alert after 15 seconds only for error alerts
        if (alertId === "alert-error") {
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
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>