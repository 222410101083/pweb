<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: login.php');
    exit;
}

// Pastikan ID pengguna tersedia
if (!isset($_SESSION['id_masyarakat'])) {
    echo "ID pengguna tidak tersedia. Harap login kembali.";
    exit;
}

$pesan = "";

// Proses pengajuan jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $file = $_FILES['dokumen'];
    $id_masyarakat = $_SESSION['id_masyarakat']; // Ambil ID pengguna dari sesi

    // Validasi file (pastikan formatnya PDF)
    if ($file['type'] != 'application/pdf') {
        $pesan = "Hanya file PDF yang diperbolehkan.";
    } else {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"]);

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (is_writable($target_dir)) {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                // Simpan data proposal ke database
                $koneksi = new mysqli("localhost", "root", "", "pweb");
                $stmt = $koneksi->prepare("INSERT INTO proposals (judul, deskripsi, file_path, tanggal_pengajuan, id_masyarakat) VALUES (?, ?, ?, NOW(), ?)");
                $stmt->bind_param("sssi", $judul, $deskripsi, $target_file, $id_masyarakat);
                if ($stmt->execute()) {
                    $pesan = "Proposal berhasil diupload.";
                } else {
                    $pesan = "Gagal menyimpan proposal ke database.";
                }
                $stmt->close();
                $koneksi->close();
            } else {
                $pesan = "Terjadi kesalahan dalam mengupload file.";
            }
        } else {
            $pesan = "Direktori tidak dapat ditulis.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengajuan Proposal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="w-full max-w-2xl mx-auto mt-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                enctype="multipart/form-data" class="bg-white p-8 shadow-md rounded">
                <h2 class="text-2xl font-bold mb-6">Form Pengajuan Proposal</h2>
                <?php if ($pesan != ""): ?>
                    <p class="mb-4 text-red-500"><?= $pesan; ?></p>
                <?php endif; ?>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="judul">
                        Judul Proposal
                    </label>
                    <input type="text" id="judul" name="judul" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                        Deskripsi
                    </label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="dokumen">
                        Dokumen Proposal (PDF)
                    </label>
                    <input type="file" id="dokumen" name="dokumen" accept=".pdf" required
                        class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Ajukan Proposal
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
