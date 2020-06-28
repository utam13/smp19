<div class="hero-wrap hero-wrap-2" style="background-image: url('<?= $file_berita; ?>'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-3 bread">Berita Sekolah<br>SMP Negeri 19 Balikpapan</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <?
            $hasil = json_decode($informasi);
            foreach ($hasil as $i) {
            ?>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="#" class="block-20">
                        <img src="<?= $i->file_gambar; ?>" class="block-20" alt="" style="width:100%;">
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#"><?= date('d-m-Y H:i A', strtotime($i->tgljam)); ?></a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="#"><?= $i->judul; ?></a></h3>
                        <!--<p>..<?//= substr($i->isi, 15, 250); ?>...</p>-->
                        <p class="pull-right">
                            <a href="<?= base_url(); ?>detail/index/<?= $i->kode; ?>" class="btn btn-primary">Lihat</a>
                            <?if($i->file_pdf != ""){?>
                            <a href="<?= $i->file_pdf; ?>" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Download PDF</a>
                            <?}?>
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
                        <li><a href="<?= base_url(); ?>informasi/index/<?= $link_prev; ?>">&lt;</a></li>
                        <?
                            }

                            for ($i = $start_number; $i <= $end_number; $i++) {
                                if ($page == $i) {
                                    $link_active = "<span>$i</span>";
                                    $link_color = "class='active'";
                                } else {
                                    $link_active = "<a href='" . base_url() . "informasi/index/$i'>$i</a>";
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
                        <li><a href="<?= base_url(); ?>informasi/index/<?= $link_next; ?>">&gt;</a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
        <? } ?>
    </div>
</section>