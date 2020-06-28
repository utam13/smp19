<div class="hero-wrap hero-wrap-2" style="background-image: url('<?= $file_profil; ?>'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-3 bread">Profil<br>SMP Negeri 19 Balikpapan</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-4 d-flex ftco-animate text-center justify-content-center">
                <div class="col-md-12 mb-sm-4 ftco-animate">
                    <img src="<?= $file_foto_kepsek; ?>" alt="" width="100%">
                    <div class="staff">
                        <h3><a href="#"><?= $nama_kepsek; ?></a></h3>
                        <span class="position">Kepala Sekolah</span>
                        <p class="ftco-social d-flex">
                            <? if ($facebook_kepsek != "") { ?>
                            <a href="<?= $facebook_kepsek; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a>
                            <? } ?>
                            <? if ($ig_kepsek != "") { ?>
                            <a href="<?= $ig_kepsek; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a>
                            <? } ?>
                            <? if ($twitter_kepsek != "") { ?>
                            <a href="<?= $twitter_kepsek; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a>
                            <? } ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 ftco-animate" style="overflow-x: auto;">
                <h2 class="mb-4">Sejarah Sekolah</h2>
                <?= $sejarah; ?>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section-3 img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex justify-content-center">
            <div class="col-md-9 about-video text-center">
                <h2 class="ftco-animate">"<?= $motto; ?>"</h2>
            </div>
        </div>
    </div>
</section>
<!--
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Kepala Sekolah</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="teacher-details d-md-flex">
                    <div class="img ftco-animate" style="background-image: url('<?= $file_foto; ?>');"></div>
                    <div class="text ftco-animate">
                        <h3><?= ucwords($nama); ?></h3>
                        <span class="position">Kepala Sekolah</span>
                        <div class="mt-4">
                            <h4>Social Link</h4>
                            <p class="ftco-social d-flex">
                                <a href="#" class="d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a>
                                <a href="#" class="d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a>
                                <a href="#" class="d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Kepala Sekolah</h2>
            </div>
        </div>
        <div class="row">
            <?
            $hasil = json_decode($staff);
            foreach ($hasil as $s) {
            ?>
            <div class="col-lg-4 mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="d-flex mb-4">
                        <div class="img" style="background-image: url('<?= $s->file_foto; ?>');"></div>
                        <div class="info ml-4">
                            <h3><a href="#"><?= ucwords($s->nama); ?></a></h3>
                            <span class="position"><?= $s->jabatan; ?><br><?= $s->masa; ?></span>
                            <p class="ftco-social d-flex">
                                <? if ($s->facebook != "") { ?>
                                <a href="<?= $s->facebook; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a>
                                <? } ?>
                                <? if ($s->ig != "") { ?>
                                <a href="<?= $s->ig; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a>
                                <? } ?>
                                <? if ($s->twitter != "") { ?>
                                <a href="<?= $s->twitter; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a>
                                <? } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <? } ?>
        </div>
        <? if ($jumlah_page > 0) { ?>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <? if ($page == 1) { ?>
                        <li><a href="#">&lt;</a></li>
                        <? } else {
                                $link_prev = ($page > 1) ? $page - 1 : 1; ?>
                        <li><a href="<?= base_url(); ?>prestasi/index/<?= $link_prev; ?>">&lt;</a></li>
                        <?
                            }

                            for ($i = $start_number; $i <= $end_number; $i++) {
                                if ($page == $i) {
                                    $link_active = "<span>$i</span>";
                                    $link_color = "class='active'";
                                } else {
                                    $link_active = "<a href='" . base_url() . "prestasi/index/$i'>$i</a>";
                                    $link_color = "";
                                }
                            ?>
                        <li <?= $link_color; ?>><?= $link_active; ?></li>
                        <? }

                            if ($page == $jumlah_page) {
                            ?>
                        <li><a href="#">&gt;</a></li>
                        <? } else {
                                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page; ?>
                        <li><a href="<?= base_url(); ?>prestasi/index/<?= $link_next; ?>">&gt;</a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
        <? }  ?>
    </div>
    </div>
</section>

-->