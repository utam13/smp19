<div class="hero-wrap" style="background-image: url('<?= $file_beranda; ?>'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-4">Web Sekolah<br>SMP Negeri 19 Balikpapan</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-3 py-4 d-block">
                    <div class="icon d-flex justify-content-center align-items-center mb-3"><i class="fa fa-plane" style="font-size:32pt;"></i></div>
                    <div class="media-body px-3">
                        <h3 class="heading text-center">Visi</h3>
                        <p class="text-center"><?= $visi; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services p-3 py-4 d-block">
                    <div class="icon d-flex justify-content-center align-items-center mb-3"><i class="fa fa-rocket" style="font-size:32pt;"></i></div>
                    <div class="media-body px-3">
                        <h3 class="heading text-center">Misi</h3>
                        <p><?= $misi; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section-3 img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex justify-content-center">
            <div class="col-md-12 about-video text-center">
                <h2 class="ftco-animate">Kunjungi channel youtube kami untuk melihat berbagai informasi menarik seputar sekolah</h2>
                <div class="row <?if($video2 == ""){?> justify-content-center <? } ?>">
                    <div class="col-md-6">
                        <iframe width="100%" height="315" src="<?= $video1; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <?if($video2 != ""){?>
                    <div class="col-md-6">
                        <iframe width="100%" height="315" src="<?= $video2; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <?}?>
                </div>
                <? if ($youtube != "") { ?>
                <div class="video d-flex justify-content-center">
                    <a href="<?= $youtube; ?>" target="_blank" class="button d-flex justify-content-center align-items-center"><i class="fa fa-play" style="font-size:32pt;color:white;"></i></a>
                </div>
                <? } else { ?>
                <div class="video d-flex justify-content-center">
                    <a href="#" class="button d-flex justify-content-center align-items-center" style="background-color:crimson;"><i class="fa fa-stop" style="font-size:32pt;color:white;"></i></a>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
</section>

<section id="staff" class="ftco-section bg-light">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-4 mb-sm-4 ftco-animate">
                <div class="col-md-12 mb-sm-4 ftco-animate">
                    <img src="<?= $file_foto_kepsek; ?>" alt="" width="100%">
                    <div class="staff text-center">
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
        </div>

        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-10 heading-section ftco-animate text-center">
                <h2 class="mb-4">Staff Sekolah</h2>
                <ul id="portfolio-flters">
                    <li onclick="location.href='<?= base_url(); ?>beranda/index/1/-/Guru Mata Pelajaran#staff'">Guru Mata Pelajaran</li>
                    <li onclick="location.href='<?= base_url(); ?>beranda/index/1/-/Guru TIK#staff'">Guru TIK</li>
                    <li onclick="location.href='<?= base_url(); ?>beranda/index/1/-/Guru BK#staff'">Guru BK</li>
                    <li onclick="location.href='<?= base_url(); ?>beranda/index/1/-/Tenaga Administrasi Sekolah#staff'">Tenaga Administrasi Sekolah</li>
                    <li onclick="location.href='<?= base_url(); ?>beranda/index/1/-/Tenaga Perpustakaan#staff'">Tenaga Perpustakaan</li>
                    <li onclick="location.href='<?= base_url(); ?>beranda/index/1/-/Penjaga Sekolah#staff'">Penjaga Sekolah</li>
                    <li onclick="location.href='<?= base_url(); ?>beranda/index/1/-/Office Boy#staff'">Office Boy</li>
                </ul>
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
                            <span class="position"><?= $s->jabatan; ?><br>Golongan: <?= $s->golongan; ?></span>
                            <p class="ftco-social d-flex">
                                <? if ($s->facebook != "") { ?>
                                <a href="<?= $s->facebook; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></a>
                                <? } ?>
                                <? if ($s->ig != "") { ?>
                                <a href="<?= $s->ig; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></a>
                                <? } ?>
                                <? if ($s->twitter != "") { ?>
                                <a href="<?= $s->twitter; ?>" class="d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a>
                                <? } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <? } ?>
        </div>
        <? if ($jumlah_page > 1) { ?>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <? if ($page == 1) { ?>
                        <li><a href="#">&lt;</a></li>
                        <? } else {
                                $link_prev = ($page > 1) ? $page - 1 : 1; ?>
                        <li><a href="<?= base_url(); ?>beranda/index/<?= $link_prev; ?>/-/<?= $cari; ?>#staff">&lt;</a></li>
                        <?
                            }

                            for ($i = $start_number; $i <= $end_number; $i++) {
                                if ($page == $i) {
                                    $link_active = "<span>$i</span>";
                                    $link_color = "class='active'";
                                } else {
                                    $link_active = "<a href='" . base_url() . "beranda/index/$i/-/$cari#staff'>$i</a>";
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
                        <li><a href="<?= base_url(); ?>beranda/index/<?= $link_next; ?>/-/<?= $cari; ?>#staff">&gt;</a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
        <? } ?>
    </div>
</section>

<section class="ftco-freeTrial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center">
                    <div class="row">
                        <div class="col-md-10 ftco-animate">
                            <h3>Mari bergabung dengan kami</h3>
                            <p>
                                Jika Anda tertarik dengan sekolah kami, silakan bergabung melalui Pendaftaran Siswa Baru dengan mengklik tombol Daftar
                            </p>
                        </div>
                        <? if ($ppdb != "") { ?>
                        <div class="col-md-2 ftco-animate">
                            <p><a href="<?= $ppdb; ?>" class="btn btn-primary py-3 px-4">Daftar sekarang!</a></p>
                        </div>
                        <? } else { ?>
                        <div class="ftco-animate">
                            <p><a href="#" class="btn btn-danger py-3 px-4">Belum tersedia!</a></p>
                        </div>
                        <? } ?>
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
                <h2 class="mb-4">Berita Terbaru</h2>
            </div>
        </div>
        <div class="row d-flex">
            <?
            $hasil = json_decode($informasi);
            foreach ($hasil as $i) {
            ?>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="#" class="block-20">
                        <img src="<?= $i->file_foto; ?>" class="block-20" alt="" style="width:100%;">
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#"><?= date('d-m-Y H:i A', strtotime($i->tgljam)); ?></a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="#"><?= $i->judul; ?></a></h3>
                        <!--<p>..<?//= substr($i->isi, 15, 250); ?>...</p>-->
                        <p class="pull-right">
                            <a href="<?= base_url(); ?>detail/index/<?= $i->kd_informasi; ?>" class="btn btn-primary">Lihat</a>
                            <?if($i->file_pdf != ""){?>
                            <a href="<?= $i->file_pdf; ?>" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Download PDF</a>
                            <?}?>
                        </p>
                    </div>
                </div>
            </div>
            <? } ?>
        </div>
    </div>
</section>