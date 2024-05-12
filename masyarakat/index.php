<?php
session_start();

// Cek jika pengguna tidak login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: login.php');
    exit;
}

// Data pengguna dari session
$namaMasyarakat = $_SESSION['nama_masyarakat'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-500 text-white p-4">
            <h1 class="text-lg">Dashboard Masyarakat</h1>
        </header>

        <div class="flex-grow p-5">
            <h2 class="text-2xl font-semibold mb-6">Selamat Datang, <?= htmlspecialchars($namaMasyarakat); ?></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Profil Anda</h3>
                    <p>Nama: <?= htmlspecialchars($namaMasyarakat); ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Link Penting</h3>
                    <ul>
                        <li><a href="#" class="text-blue-500 hover:text-blue-700">Link 1</a></li>
                        <li><a href="#" class="text-blue-500 hover:text-blue-700">Link 2</a></li>
                        <li><a href="#" class="text-blue-500 hover:text-blue-700">Link 3</a></li>
                    </ul>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold mb-2">Aktivitas Terbaru</h3>
                    <p>Belum ada aktivitas terbaru.</p>
                </div>
            </div>
            <!-- Tampilkan Proposal yang Telah Diajukan -->
            <div class="bg-white p-6 rounded-lg shadow mt-4">
                <h3 class="text-xl font-bold mb-4">Proposal yang Telah Diajukan</h3>
                <?php
                // Koneksi ke database
                $koneksi = new mysqli("localhost", "root", "", "pweb");

                // Cek koneksi
                if ($koneksi->connect_error) {
                    die("Koneksi gagal: " . $koneksi->connect_error);
                }

                // Query untuk mengambil data proposal
                $query = "SELECT judul, deskripsi, file_path, tanggal_pengajuan FROM proposals WHERE id_masyarakat = ?";
                $stmt = $koneksi->prepare($query);
                $stmt->bind_param("i", $_SESSION['id_masyarakat']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<table class='min-w-full divide-y divide-gray-200'>";
                    echo "<thead class='bg-gray-50'>";
                    echo "<tr>";
                    echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Judul</th>";
                    echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Deskripsi</th>";
                    echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>File</th>";
                    echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Tanggal Pengajuan</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody class='bg-white divide-y divide-gray-200'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['judul']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['deskripsi']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'><a href='" . htmlspecialchars($row['file_path']) . "' class='text-blue-500 hover:text-blue-700' target='_blank'>Download</a></td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['tanggal_pengajuan']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>Belum ada proposal yang diajukan.</p>";
                }
                $stmt->close();
                $koneksi->close();
                ?>
            </div>
            <!-- Tombol Logout -->
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
        </div>

        <footer class="bg-blue-500 text-white p-4 text-center">
            Hak Cipta &copy; <?= date("Y"); ?> Masyarakat
        </footer>
    </div>
</body>

</html>
</html>