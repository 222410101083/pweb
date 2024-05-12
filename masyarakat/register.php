<?php
// Koneksi ke database
$host = "localhost";
$dbname = "pweb";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Cek jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_masyarakat = htmlspecialchars($_POST['username']);
    $pass_masyarakat = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    $nama_masyarakat = htmlspecialchars($_POST['nama']);

    // Query untuk insert data
    try {
        $query = $conn->prepare("INSERT INTO masyarakat (user_masyarakat, pass_masyarakat, nama_masyarakat) VALUES (?, ?, ?)");
        $query->execute([$user_masyarakat, $pass_masyarakat, $nama_masyarakat]);

        // Redirect ke halaman login
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) { // Kode error untuk 'duplicate entry' pada MySQL
            $error_message = "Nama pengguna telah terdaftar.";
        } else {
            $error_message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md">
        <form action="register.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <?php if (!empty($error_message)) { ?>
                <p class="text-red-500"><?php echo $error_message; ?></p>
            <?php } ?>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" name="username" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama Lengkap
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" type="text" placeholder="Nama Lengkap" name="nama" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>

