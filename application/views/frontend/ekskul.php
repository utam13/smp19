<div class="hero-wrap hero-wrap-2" style="background-image: url('<?= $file_ekskul; ?>'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-3 bread">Ekstra Kurikuler<br>SMP Negeri 19 Balikpapan</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <?
            $hasil = json_decode($ekskul);
            foreach ($hasil as $ke) {
            ?>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="<?= $ke->url_galeri; ?>" <?if($ke->alert_galeri==1){?> onclick="alert('Maaf tidak ada tambahan foto di galeri')"
                        <?}?> ><img src="<?= $ke->file_foto; ?>" class="block-20" alt="" style="width:100%;"></a>
                    <div class="text p-4 d-block">
                        <h3 class="heading mt-3">
                            <a href="<?= $ke->url_galeri; ?>" <?if($ke->alert_galeri==1){?> onclick="alert('Maaf tidak ada tambahan foto di galeri')"
                                <?}?>>Ekstra Kurikuler <?= $ke->nama; ?>
                            </a>
                        </h3>
                        <p class="ftco-social d-flex">
                            <? if ($ke->facebook != "") { ?>
                            <a href="<?= $ke->facebook; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a>
                            <? } ?>
                            <? if ($ke->ig != "") { ?>
                            <a href="<?= $ke->ig; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a>
                            <? } ?>
                            <? if ($ke->twitter != "") { ?>
                            <a href="<?= $ke->twitter; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a>
                            <? } ?>
                        </p>
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
                        <li><a href="<?= base_url(); ?>ekskul/index/<?= $link_prev; ?>">&lt;</a></li>
                        <?
                            }

                            for ($i = $start_number; $i <= $end_number; $i++) {
                                if ($page == $i) {
                                    $link_active = "<span>$i</span>";
                                    $link_color = "class='active'";
                                } else {
                                    $link_active = "<a href='" . base_url() . "ekskul/index/$i'>$i</a>";
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
                        <li><a href="<?= base_url(); ?>ekskul/index/<?= $link_next; ?>">&gt;</a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
        <? } ?>
    </div>
</section>