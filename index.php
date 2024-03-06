<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

    <div class="login-container">
        <div>
            <h2>Login</h2><br>

            <form id="loginForm" method="post" action="login.php" onsubmit="login(event)">
                <div class="input_username">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div><br>

                <div class="input_password">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div><br>

                <div class="input_role">
                    <label for="role">Login As</label>
                    <select id="role" name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                        <option value="guru">Guru</option>
                        <option value="staff">Staff Admin</option>
                        <option value="admin_sekolah">Admin Sekolah</option>
                        <option value="orang_tua">Orang Tua</option>
                    </select>
                </div><br>

                <button type="submit">Login</button><br>
                <p>Tidak punya Akun? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
</body>

</html>
