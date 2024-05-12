<?php
include 'layout/header.php';

$id   = $_GET['id'];
$query  = $conn->query("SELECT kategori.* ,artikel.* FROM artikel INNER JOIN kategori USING(id_kategori) WHERE id_kategori = '$id'");
$data = $query->fetch();
?>
<div class="container mx-auto px-4">
  <div class="berita">
    <div class="judul_section text-center py-4">
      <h1 class="text-3xl font-bold"><?=$data['nama_kategori'];?></h1>
      <hr class="my-2">
    </div>
    <div class="berita_section">
      <?php do{ ?>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="cover_grid_news">
          <img src="img/<?=$data['gambar_artikel']?>" class="w-full h-auto">
        </div>
        <div class="read-more col-span-2">
          <div class="judul">
            <h3 class="text-xl font-semibold"><a href="lihat_artikel.php?id=<?=$data['id_artikel'];?>" class="text-blue-600 hover:text-blue-800"><?=$data['judul_artikel'];?></a></h3>
          </div>
          <div class="attr">
            <p class="text-gray-600"><?=$data['tanggal_artikel'];?></p>
          </div>
          <div class="isi">
            <p class="text-gray-800"><?=substr($data['isi_artikel'],0,125);?>...</p>
          </div>
          <div class="tombol_lihat mt-4">
            <a href="lihat_artikel.php?id=<?=$data['id_artikel'];?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
              Baca Selengkapnya <i class="fa fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>
      <?php }while ($data = $query->fetch());?>
    </div>
    <div class="more_berita text-center py-4">
      <h3 class="text-xl"><a href="berita.php" class="text-blue-600 hover:text-blue-800">Lihat Artikel lainnya...</a></h3>
    </div>
  </div>
</div>

<?php require 'layout/footer.php'; ?>

