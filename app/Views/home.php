<?= $this->extend('templates/main/main-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/css/pages/home.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="hero"></div>
<section class="featured-products d-flex align-items-center flex-column">
    <h2 class="text-center text-uppercase">Produk Kami</h2>
    <div class="card-wrapper justify-content-center">
        <?php foreach($produk as $pd): ?>
            <div class="card border-0 text-center">
                <div class="card-body">
                    <a href="<?= base_url('detail/'.$pd['url_slug']) ?>"><img class="card-img mb-2" src="<?= base_url('assets/img/produk/'.$pd['gambar']) ?>"></a>
                    <div class="card-title"><?= $pd['nama'] ?></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

<section class="helm">
    <div class="helm-wrapper d-flex">
        <img class="helm-img mb-2 align-self-center" src="/assets/img/hero2.png">
        <div class="helm-text position-relative">
            <h2 class="helm-header">Toko Nasrul</h2>
            <p style="text-align: justify;">Toko Nasrul merupakan destinasi utama bagi para pecinta mode yang mencari sepatu, sandal, dan tas berkualitas tinggi dengan gaya yang trendi dan harga yang terjangkau. Berlokasi strategis di pusat kota, toko ini menawarkan beragam pilihan produk untuk memenuhi berbagai kebutuhan gaya sehari-hari maupun acara khusus.
        </p>
            <div class="helm-extra-text">
                <p style="text-align: justify;">Sepatu yang ditawarkan di Toko Nasrul mencakup berbagai gaya mulai dari sneakers kasual, sepatu formal yang elegan, hingga sandal santai untuk suasana liburan. Setiap pasang sepatu didesain dengan teliti menggunakan bahan-bahan berkualitas tinggi sehingga memberikan kenyamanan dan gaya yang tak tertandingi.</p>
                <p style="text-align: justify;">Selain itu, koleksi tas yang tersedia di Toko Nasrul juga merupakan pilihan yang sempurna untuk melengkapi tampilan Anda. Mulai dari tas selempang yang praktis, tas ransel yang stylish, hingga tas tangan yang elegan, semua produk tas dijamin akan menambahkan sentuhan fashion yang memukau pada setiap penampilan.</p>

            </div>
            <p class="helm-read-more">Baca selengkapnya...</p>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
const readMore = () => {
    const readMore = document.querySelector(".helm-read-more");
    const extraText = document.getElementsByClassName("helm-extra-text")[0];

    readMore.addEventListener("click", () => {
        if (extraText.style.display === "") {
            readMore.textContent = "Baca sedikit..."
            extraText.style.display = "block";
        } else {
            extraText.style.display = "";
            readMore.textContent = "Baca selengkapnya..."
        }
    });
}

readMore();
</script>
<?= $this->endSection() ?>