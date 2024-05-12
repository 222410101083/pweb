<?php
session_start();
if (!isset($_SESSION['user_pemerintah'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemerintah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard Pemerintah</h1>
                <a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</a>
            </div>
        </header>

        <!-- Main content -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Proposal Table -->
                <div class="px-4 py-6 sm:px-0">
                    <div class="border-4 border-dashed border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Judul</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deskripsi</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pengunggah</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        File</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                $koneksi = new mysqli("localhost", "root", "", "pweb");
                                if ($koneksi->connect_error) {
                                    die("Koneksi gagal: " . $koneksi->connect_error);
                                }
                                $query = "SELECT p.judul, p.deskripsi, p.file_path, p.tanggal_pengajuan, m.nama_masyarakat AS pengunggah FROM proposals p INNER JOIN masyarakat m ON p.id_masyarakat = m.id_masyarakat";
                                $result = $koneksi->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['judul']) . "</td>";
                                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['deskripsi']) . "</td>";
                                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['pengunggah']) . "</td>";
                                        echo "<td class='px-6 py-4 whitespace-nowrap'><a href='" . htmlspecialchars($row['file_path']) . "' class='text-blue-500 hover:text-blue-700' target='_blank'>Download</a></td>";
                                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['tanggal_pengajuan']) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='px-6 py-4 whitespace-nowrap text-center'>Tidak ada proposal yang ditemukan</td></tr>";
                                }
                                $koneksi->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow p-4 text-center">
            Hak Cipta © 2023 Pemerintah
        </footer>
    </div>
</body>

</html>
</html>