<?php
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
    $pass_pemerintah = password_hash($_POST['pass_pemerintah'], PASSWORD_DEFAULT);
    $nama_pemerintah = $_POST['nama_pemerintah'];

    // Cek apakah username sudah ada
    $sql_check = "SELECT * FROM akun_pemerintah WHERE user_pemerintah = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $user_pemerintah);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    if ($result_check->num_rows > 0) {
        echo "<div class='alert alert-danger' role='alert'>Username sudah terpakai!</div>";
    } else {
        // Jika username belum ada, lanjutkan dengan penambahan akun baru
        $sql = "INSERT INTO akun_pemerintah (user_pemerintah, pass_pemerintah, nama_pemerintah) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $user_pemerintah, $pass_pemerintah, $nama_pemerintah);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<div class='alert alert-success' role='alert'>Akun berhasil ditambahkan!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Gagal menambahkan akun!</div>";
        }
        $stmt->close();
    }
    $stmt_check->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Tambah Akun Pemerintah</title>
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="w-full max-w-md">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="tambah_akun_pemerintah.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_pemerintah">
                    Nama Pemerintah
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama_pemerintah" name="nama_pemerintah" type="text" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_pemerintah">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_pemerintah" name="user_pemerintah" type="text" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pass_pemerintah">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="pass_pemerintah" name="pass_pemerintah" type="password" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Tambah Akun
                </button>
            </div>
        </form>
    </div>
</body>
</html>
</html>