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

    footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        clear: both;
    }
    .schedule-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .day-container {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 1rem;
    }

    .day-container h3 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .schedule-item {
        margin-bottom: 0.5rem;
    }
    .logout-btn {
        background-color: #d9534f !important;
        color: #fff !important;
    }
    </style>
</head>

<body>

    <header>
        Jadwal Pelajaran
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

        <?php
        $scheduleData = [
            'Senin' => [
                ['time' => '07:50 - 10:00', 'subject' => 'PWEB'],
                ['time' => '10:00 - 10:15', 'subject' => 'Istirahat'],
                ['time' => '10:15 - 12:00', 'subject' => 'PWEB'],
                ['time' => '12:00 - 13:00', 'subject' => 'Ishoma'],
                ['time' => '12:00 - 15:00', 'subject' => 'Matematika']
            ],
            'Selasa' => [
                ['time' => '07:00 - 10:00', 'subject' => 'PBO'],
                ['time' => '09:30 - 09:45', 'subject' => 'Istirahat'],
                ['time' => '09:45 - 12:00', 'subject' => 'PBO'],
                ['time' => '12:00 - 13:00', 'subject' => 'Ishoma'],
                ['time' => '13:00 - 14:00', 'subject' => 'PBO'],
                ['time' => '14:00 - 15:00', 'subject' => 'Bahasa Indonesia']
            ],
            'Rabu' => [
                ['time' => '07:00 - 09:00', 'subject' => 'PPKN'],
                ['time' => '09:00 - 09:30', 'subject' => 'PKK'],
                ['time' => '09:30 - 09:45', 'subject' => 'Istirahat'],
                ['time' => '09:45 - 12:00', 'subject' => 'PKK'],
                ['time' => '12:00 - 13:00', 'subject' => 'Ishoma'],
                ['time' => '13:00 - 15:00', 'subject' => 'PKK']
            ],
            'Kamis' => [
                ['time' => '07:00 - 09:30', 'subject' => 'PWEB'],
                ['time' => '09:30 - 09:45', 'subject' => 'Istirahat'],
                ['time' => '09:45 - 12:00', 'subject' => 'Bahasa Inggris'],
                ['time' => '12:00 - 13:00', 'subject' => 'Ishoma'],
                ['time' => '13:00 - 15:00', 'subject' => 'Basis Data']
            ],
            'Jumat' => [
                ['time' => '07:00 - 09:30', 'subject' => 'Bahasa Inggris'],
                ['time' => '09:30 - 09:45', 'subject' => 'Istirahat'],
                ['time' => '09:45 - 12:00', 'subject' => 'PWEB'],
                ['time' => '12:00 - 13:00', 'subject' => 'Ishoma'],
                ['time' => '13:00 - 15:00', 'subject' => 'PABP'],
                ['time' => '15:30 - 17:00', 'subject' => 'HHPS']
            ],
        ];

        foreach ($scheduleData as $day => $scheduleItems) : ?>
        <div class="day-container">
            <h3><?php echo $day; ?></h3>
            <?php foreach ($scheduleItems as $item) : ?>
            <p class="schedule-item"><?php echo $item['time'] . ' - ' . $item['subject']; ?></p>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        </div>
    </section>

    <footer class="bg-dark text-white">
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>

</body>

</html>