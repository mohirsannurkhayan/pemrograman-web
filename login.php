<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ffffff;
            margin: 80px auto 50px;
            width: 350px;
            border-radius: 15px;
            padding: 15px 25px;
            box-sizing: border-box;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }

        .header h1 {
            font-weight: 900;
            font-size: 40px;
            color: teal;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
            font-family: 'agency fb', 'courier new', sans-serif;

        }

        .form {
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            width: 100%; 
            padding: 9px 15px;
            cursor: pointer;
            margin-top: 15px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            border: none;
            transition: background-color 0.3s ease;
        } 

        .form-group button:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            font-size: 10px;
            border-radius: 4px;
            margin-top: 50px;
            margin-bottom: 10px;
            border: 1px solid #f5c6cb;
            text-align: left; 
            font-weight: bold;
            
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="header"><h1><center>Form Login</center></h1></div>
        <div class="form">
            <form action="login_exe.php" method="post">
            <?php if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
                    <div class="alert alert-danger" role="alert">
                        Username dan Password salah!
                    </div>
            <?php endif; ?>
                <div class="form-group">
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Masukkan username anda!" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Masukkan password anda!" required>
                </div>
                <div class="form-group button">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>