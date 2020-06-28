<div class="hero-wrap hero-wrap-2" style="background-image: url('<?= $file_fasilitas; ?>'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-3 bread">Fasilitas<br>SMP Negeri 19 Balikpapan</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <?
            $hasil = json_decode($fasilitas);
            foreach ($hasil as $kf) {
            ?>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="<?= $kf->url_galeri; ?>" <?if($kf->alert_galeri==1){?> onclick="alert('Maaf tidak ada tambahan foto di galeri')"
                        <?}?>><img src="<?= $kf->file_foto; ?>" class="block-20" alt="" style="width:100%;"></a>
                    <div class="text p-4 d-block">
                        <h3 class="heading mt-3"><a href="<?= $kf->url_galeri; ?>" <?if($kf->alert_galeri==1){?> onclick="alert('Maaf tidak ada tambahan foto di galeri')"
                                <?}?>><?= $kf->nama; ?></a></h3>
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
                        <li><a href="<?= base_url(); ?>fasilitas/index/<?= $link_prev; ?>">&lt;</a></li>
                        <?
                            }

                            for ($i = $start_number; $i <= $end_number; $i++) {
                                if ($page == $i) {
                                    $link_active = "<span>$i</span>";
                                    $link_color = "class='active'";
                                } else {
                                    $link_active = "<a href='" . base_url() . "fasilitas/index/$i'>$i</a>";
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
                        <li><a href="<?= base_url(); ?>fasilitas/index/<?= $link_next; ?>">&gt;</a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
        <? } ?>
    </div>
</section>