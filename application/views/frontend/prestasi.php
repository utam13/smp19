<div class="hero-wrap hero-wrap-2" style="background-image: url('<?= $file_prestasi; ?>'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-3 bread">Prestasi<br>SMP Negeri 19 Balikpapan</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?
            $hasil = json_decode($prestasi);
            foreach ($hasil as $kp) {
            ?>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry <?= $kp->flip; ?>">
                    <a href="<?= base_url(); ?>galeri/index/1/<?= $kp->kode; ?>/prestasi" class="block-20" style="background-image: url('<?= $kp->file_foto; ?>');">
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#"><?= $kp->tahun; ?></a></div>
                        </div>
                        <h3 class="heading mb-4"><a href="#"><?= $kp->nama; ?></a></h3>
                        <p class="time-loc"><span><i class="icon-map-o"></i> <?= $kp->lokasi; ?></span></p>
                        <p><?= $kp->uraian; ?></p>
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
        <? } ?>
    </div>
</section>