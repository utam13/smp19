<!--
<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2>Layanan Informasi terkini</h2>
                    <p>Daftarkan email Anda untuk mendapatkan informasi ter-update dari sekolah kami</p>
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-8">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Alamat email Anda">
                                    <input type="submit" value="Daftarkan" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->

<footer class="ftco-footer ftco-bg-dark ftco-section img" style="background-image: url('<?= base_url(); ?>assets/images/motif_dayak.jpg'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3 text-center">
                <div class="ftco-footer-widget mb-4">
                    <h2><a class="navbar-brand" href="index.html">SMP Negeri 19 <br><small style="font-size:14pt;">Balikpapan</small></a></h2>
                    <p>
                        <img src="<?= $file_logo; ?>" style="width:200px;">
                    </p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <? if ($twitter != "") { ?>
                            <li class="ftco-animate"><a href="<?= $twitter; ?>" target="_blank"><span class="icon-twitter"></span></a></li>
                        <? } ?>

                        <? if ($facebook != "") { ?>
                            <li class="ftco-animate"><a href="<?= $facebook; ?>" target="_blank"><span class="icon-facebook"></span></a></li>
                        <? } ?>

                        <? if ($ig != "") { ?>
                            <li class="ftco-animate"><a href="<?= $ig; ?>" target="_blank"><span class="icon-instagram"></span></a></li>
                        <? } ?>

                        <? if ($youtube != "") { ?>
                            <li class="ftco-animate"><a href="<?= $youtube; ?>" target="_blank"><span class="icon-youtube"></span></a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Alamat Sekolah</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text"><?= $alamat; ?></span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?= $telp; ?></span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= $email; ?></span></a></li>
                            <li><a href="#"><span class="icon icon-globe"></span><span class="text"><?= $website; ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ftco-footer-widget mb-4">
                    <div class="block-23 mb-3">
                        <iframe src="<?= $googlemap; ?>" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; 2020 for SMP Negeri 19 Balikpapan | Edited by Cendana Kustiningrum<br>This template made by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <p>
                    <a href="#myModal" data-toggle="modal">[ Manage Content ]</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <img src="<?= base_url(); ?>assets/images/avatar.png" alt="Avatar">
                </div>
                <h4 class="modal-title">CMS Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>login/proses/1" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required="required" style="font-family:times;font-size:13pt;">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required" style="font-family:times;font-size:13pt;">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url(); ?>login/reset/<?= $email; ?>">Lupa Password?</a>
            </div>
        </div>
    </div>
</div>