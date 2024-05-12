<?php
require 'layout/header.php';

$query = $conn->query("SELECT kategori.* ,artikel.* FROM artikel LEFT JOIN kategori on artikel.id_kategori = kategori.id_kategori ORDER BY artikel.id_artikel DESC");
?>

<div class="container mx-auto px-4">
  <div class="content">
    <div class="berita">
      <div class="judul_section text-center py-5">
        <h1 class="text-3xl font-bold">BERITA</h1>
        <hr class="border-gray-300">
      </div>
      <div class="search_section mb-4">
        <input type="text" id="searchInput" class="border p-2 rounded w-full" placeholder="Cari berita...">
      </div>
      <div class="berita_section grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php while ($data = $query->fetch()): ?>
          <div class="grid bg-white rounded-lg shadow-md overflow-hidden">
            <div class="cover_grid_news">
              <img src="img/<?= $data['gambar_artikel'] ?>" class="w-full h-48 object-cover">
            </div>
            <div class="p-4">
              <div class="judul">
                <h3 class="text-xl font-semibold mb-2"><a href="lihat_artikel.php?id=<?= $data['id_artikel']; ?>"
                    class="text-blue-500 hover:text-blue-700"><?= $data['judul_artikel']; ?></a></h3>
              </div>
              <div class="attr text-gray-600 text-sm mb-4">
                <p>
                  <?= tanggal($data['tanggal_artikel']); ?> /
                  <a href="kategori.php?id=<?= $data['id_kategori']; ?>" class="text-blue-500 hover:text-blue-700">
                    <?= $data['nama_kategori']; ?>
                  </a>
                </p>
              </div>
              <div class="isi text-gray-800">
                <p><?= substr($data['isi_artikel'], 0, 125); ?>...</p>
              </div>
              <div class="tombol_lihat mt-4">
                <a href="lihat_artikel.php?id=<?= $data['id_artikel']; ?>"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById('searchInput').addEventListener('keyup', function () {
    var searchText = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search.php?q=' + encodeURIComponent(searchText), true);
    xhr.onload = function () {
      if (this.status == 200) {
        document.querySelector('.berita_section').innerHTML = this.responseText;
      }
    }
    xhr.send();
  });
</script>

<?php require 'layout/footer.php'; ?>