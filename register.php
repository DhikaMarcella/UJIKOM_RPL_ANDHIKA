<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

<style type="text/css">
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 10px;
        background-color: #1d1d1d;
        color: #fff;
        text-align: center;
    }

    a{
        background-color: blueviolet;
        color: #f8f8f8;
    }
</style>
</head>

<body>

    <div class="register-container">
            <h1>Register</h1>
            <p>Selamat Datang pengguna baru</p>

            <form id="registerForm" action="regis.php" method="POST" onsubmit="register(event)">
                <div class="inputUsername">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div><br>

                <div class="inputPassword">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                    required>
                    </div>
                </div><br>

                <div class="inputEmail">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div><br>

                <div class="inputBirth">
                    <label for="birthDate" class="form-label">Date of Birth</label>
                    <input type="date" id="birthDate" name="birthDate" class="form-control" required>
                </div><br>

                <div class="inputRole">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                        <option value="guru">Guru</option>
                        <option value="staff">Staff Admin</option>
                        <option value="admin_sekolah">Admin Sekolah</option>
                        <option value="orang_tua">Orang Tua</option>
                    </select>
                </div><br>

                <button type="submit" class="form-button">Register</button>
            </form>

            <p class="form-footer">Already have an account? <a href="index.php">Login</a></p>
        </div>
    </div>
</body>

</html>
