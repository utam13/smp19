<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">SMP Negeri 19<br><small style="font-size:14pt;">BALIKPAPAN</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $menu_beranda; ?>"><a href="<?= base_url(); ?>beranda" class="nav-link">Beranda</a></li>
                <li class="nav-item <?= $menu_profil; ?>"><a href="<?= base_url(); ?>profil" class="nav-link">Profil</a></li>
                <!--<li class="nav-item <?= $menu_prestasi; ?>"><a href="<?= base_url(); ?>prestasi" class="nav-link">Prestasi</a></li>-->
                <li class="nav-item <?= $menu_ekskul; ?>"><a href="<?= base_url(); ?>ekskul" class="nav-link">Ekstra Kurikuler</a></li>
                <li class="nav-item <?= $menu_fasilitas; ?>"><a href="<?= base_url(); ?>fasilitas" class="nav-link">Fasilitas</a></li>
                <li class="nav-item <?= $menu_informasi; ?>"><a href="<?= base_url(); ?>informasi" class="nav-link">Berita</a></li>
                <li class="nav-item <?= $menu_galeri; ?>"><a href="<?= base_url(); ?>galeri" class="nav-link">Galeri</a></li>
                <li class="nav-item <?= $menu_kontak; ?>"><a href="<?= base_url(); ?>kontak" class="nav-link">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->