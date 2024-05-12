<?php
session_start();
$host = "localhost"; // atau alamat server lain
$username = "root";
$password = "";
$database = "pweb";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_pemerintah = $_POST['user_pemerintah'];
    $pass_pemerintah = $_POST['pass_pemerintah'];

    $sql = "SELECT id_pemerintah, user_pemerintah, pass_pemerintah, nama_pemerintah FROM akun_pemerintah WHERE user_pemerintah = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_pemerintah);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($pass_pemerintah, $row['pass_pemerintah'])) {
            // Password cocok, buat sesi pengguna
            $_SESSION['user_pemerintah'] = $row['user_pemerintah'];
            $_SESSION['nama_pemerintah'] = $row['nama_pemerintah'];
            header("Location: dashboard.php"); // Arahkan ke dashboard
            exit;
        } else {
            $error = "Username atau password salah!";
        }
    } else {
        $error = "Username atau password salah!";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Login Pemerintah</title>
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="login.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="user_pemerintah" type="text" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="pass_pemerintah" type="password" required>
            </div>
            <?php if (!empty($error)): ?>
                <p class="text-red-500 text-xs italic"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Masuk
                </button>
            </div>
        </form>
    </div>
</body>
</html>

