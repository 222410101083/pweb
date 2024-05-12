<?php

session_start();
$server		= 'localhost';
$username	= 'root';
$pass     = '';
$db_name	= 'pweb';
$message  = '';

try
{
  $conn		= new PDO("mysql:host=$server;dbname=$db_name", $username, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['login']) && $_POST['login'] == "LOGIN" ) {

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt = $conn->prepare("SELECT * FROM masyarakat WHERE user_masyarakat = :user");
    $stmt->execute(['user' => $user]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifikasi password
    if ($data && password_verify($pass, $data['pass_masyarakat'])) {
      $_SESSION['nama_masyarakat'] = $data['nama_masyarakat'];
      $_SESSION['id_masyarakat'] = $data['id_masyarakat'];
      $_SESSION['login']  = true;

      // Redirect ke halaman index.php
      header('Location: index.php');
      exit;
    }else {
      $message="* Username atau Password salah";
    }
  }
} catch (PDOException $error)
{
  echo $error->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-xs">
        <form action="" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user" type="text" placeholder="Username" name="user" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pass">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="pass" type="password" placeholder="Password" name="pass" required>
            </div>
            <div class="flex items-center justify-between">
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login" value="LOGIN">
            </div>
        </form>
        <?php
        if (isset($message)) {
            echo '<p class="text-center text-red-500 text-xs">' . $message . '</p>';
        }
        ?>
    </div>
</body>
</html>

