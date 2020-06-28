<div class="container-fluid">
    <!-- Center Column -->
    <div class="col-sm-12">

        <!-- Alert -->
        <?
        extract($alert);
        if ($kode_alert != "") {
        ?>
        <div class="alert <?= $jenisbox ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Pesan:</strong> <?= str_replace("%7C", "<br>", str_replace("%20", " ", $isipesan)); ?>
        </div>
        <? } ?>
        <!-- Elektrikal dan Mekanikal -->
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Informasi Sekolah
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?= base_url(); ?>sekolah/proses">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat Lengkap</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="7" placeholder="Alamat lengkap" style="resize:none;"><?= $alamat; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No. Telp.</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= $telp; ?>" max=6 placeholder="No. Telp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>" maxlength=100 placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Website</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="website" name="website" value="<?= $website; ?>" maxlength=100 placeholder="Website">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Visi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="visi" id="visi" cols="30" rows="5" placeholder="Visi" style="resize:none;"><?= $visi; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Misi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="misi" id="misi" cols="30" rows="5" placeholder="Misi" style="resize:none;"><?= $misi; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Motto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="motto" name="motto" value="<?= $motto; ?>" maxlength=100 placeholder="Motto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sejarah</label>
                            <div class="col-sm-10">
                                <textarea id="sejarah" name="sejarah"><?= $sejarah; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link PPDB</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <input type="text" class="form-control" id="link_ppdb" name="link_ppdb" value="<?= $ppdb; ?>" placeholder="Link PPDB">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Google Map Location</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control" id="link_googlemap" name="link_googlemap" value="<?= $googlemap; ?>" placeholder="Link Google Map (lihat contoh)">
                                    <div class="input-group-btn">
                                        <a href="#" class="btn btn-default" onclick="alert('Contoh Link:\nhttps://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.95978964095!2d116.99139071410073!3d-1.1886302358610983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1502e8af37477%3A0xb9a90e1db82e49b8!2sSMPN%2019%20Balikpapan!5e0!3m2!1sid!2sid!4v1588412542319!5m2!1sid!2sid')">Contoh</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Facebook</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    <input type="text" class="form-control" id="link_facebook" name="link_facebook" value="<?= $facebook; ?>" placeholder="Link Facebook (contoh: https://www.facebook.com/profile_name)">
                                    <div class="input-group-btn">
                                        <a href="#" class="btn btn-default" onclick="alert('Contoh Link:\nhttps://www.facebook.com/profile_name')">Contoh</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Instagram</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                    <input type="text" class="form-control" id="link_ig" name="link_ig" value="<?= $ig; ?>" placeholder="Link Instagram (contoh: https://www.instagram.com/profile_name)">
                                    <div class="input-group-btn">
                                        <a href="#" class="btn btn-default" onclick="alert('Contoh Link:\nhttps://www.instagram.com/profile_name')">Contoh</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Twitter</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                    <input type="text" class="form-control" id="link_twitter" name="link_twitter" value="<?= $twitter; ?>" placeholder="Link Twitter (contoh: https://www.twitter.com/profile_name)">
                                    <div class="input-group-btn">
                                        <a href="#" class="btn btn-default" onclick="alert('Contoh Link:\nhttps://www.twitter.com/profile_name')">Contoh</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Youtube Channel</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                    <input type="text" class="form-control" id="link_youtube" name="link_youtube" value="<?= $youtube; ?>" placeholder="URL Link Youtube Channel (contoh: https://www.youtube.com/channel/UCCa-RDVGK1ctDww0JEXsuZw?view_as=subscriber)">
                                    <div class="input-group-btn">
                                        <a href="#" class="btn btn-default" onclick="alert('Contoh Share Link:\nhttps://www.youtube.com/channel/UCCa-RDVGK1ctDww0JEXsuZw?view_as=subscriber')">Contoh</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">URL Video Youtube 1</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-file-video-o"></i></span>
                                    <input type="text" class="form-control" id="video1" name="video1" value="<?= $video1; ?>" placeholder="URL Share Link Youtube (contoh: https://www.youtube.com/embed/qJLt1k-ok-g)">
                                    <div class="input-group-btn">
                                        <a href="#" class="btn btn-default" onclick="alert('Contoh Share Link:\nhttps://www.youtube.com/embed/qJLt1k-ok-g')">Contoh</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">URL Video Youtube 2</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-file-video-o"></i></span>
                                    <input type="text" class="form-control" id="video2" name="video2" value="<?= $video2; ?>" placeholder="URL Share Link Youtube (contoh: https://www.youtube.com/embed/qJLt1k-ok-g)">
                                    <div class="input-group-btn">
                                        <a href="#" class="btn btn-default" onclick="alert('Contoh Share Link:\nhttps://www.youtube.com/embed/qJLt1k-ok-g')">Contoh</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Logo Sekolah (PNG Image)</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file" name="nama_file" value="<?= $nama_file; ?>">
                                <input type="hidden" id="folder" name="folder" value="sekolah">
                                <input type="file" id="pilih" name="pilih" accept=".png" style="display:none;">
                                <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload()">Pilih Logo</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target" name="file_target" value="<?= $logo; ?>" placeholder="Pilih Gambar Logo Sekolah" readonly>
                                    <div id="btnlihat" class="input-group-btn">
                                        <a href="<?= $file_logo; ?>" id="link" target="_blank" class="btn btn-success">Lihat Logo</a>
                                    </div>
                                </div>
                                <div id="progress_div" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar Utama Beranda</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file_beranda" name="nama_file_beranda" value="<?= $nama_beranda; ?>">
                                <input type="hidden" id="folder_beranda" name="folder_beranda" value="sekolah">
                                <input type="file" id="pilih_beranda" name="pilih_beranda" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                                <input type="hidden" id="lokasi_beranda" name="lokasi_beranda" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload_beranda()">Pilih Gambar</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target_beranda" name="file_target_beranda" value="<?= $beranda; ?>" placeholder="Pilih Gambar" readonly>
                                    <div id="btnlihat_beranda" class="input-group-btn">
                                        <a href="<?= $file_beranda; ?>" id="link_beranda" target="_blank" class="btn btn-success">Lihat Gambar</a>
                                    </div>
                                </div>
                                <div id="progress_div_beranda" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_beranda" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar Utama Profil</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file_profil" name="nama_file_profil" value="<?= $nama_profil; ?>">
                                <input type="hidden" id="folder_profil" name="folder_profil" value="sekolah">
                                <input type="file" id="pilih_profil" name="pilih_profil" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                                <input type="hidden" id="lokasi_profil" name="lokasi_profil" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload_profil()">Pilih Gambar</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target_profil" name="file_target_profil" value="<?= $profil; ?>" placeholder="Pilih Gambar" readonly>
                                    <div id="btnlihat_profil" class="input-group-btn">
                                        <a href="<?= $file_profil; ?>" id="link_profil" target="_blank" class="btn btn-success">Lihat Gambar</a>
                                    </div>
                                </div>
                                <div id="progress_div_profil" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_profil" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar Utama Ekskul</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file_ekskul" name="nama_file_ekskul" value="<?= $nama_ekskul; ?>">
                                <input type="hidden" id="folder_ekskul" name="folder_ekskul" value="sekolah">
                                <input type="file" id="pilih_ekskul" name="pilih_ekskul" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                                <input type="hidden" id="lokasi_ekskul" name="lokasi_ekskul" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload_ekskul()">Pilih Gambar</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target_ekskul" name="file_target_ekskul" value="<?= $ekskul; ?>" placeholder="Pilih Gambar" readonly>
                                    <div id="btnlihat_ekskul" class="input-group-btn">
                                        <a href="<?= $file_ekskul; ?>" id="link_ekskul" target="_blank" class="btn btn-success">Lihat Gambar</a>
                                    </div>
                                </div>
                                <div id="progress_div_ekskul" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_ekskul" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar Utama Fasilitas</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file_fasilitas" name="nama_file_fasilitas" value="<?= $nama_fasilitas; ?>">
                                <input type="hidden" id="folder_fasilitas" name="folder_fasilitas" value="sekolah">
                                <input type="file" id="pilih_fasilitas" name="pilih_fasilitas" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                                <input type="hidden" id="lokasi_fasilitas" name="lokasi_fasilitas" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload_fasilitas()">Pilih Gambar</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target_fasilitas" name="file_target_fasilitas" value="<?= $fasilitas; ?>" placeholder="Pilih Gambar" readonly>
                                    <div id="btnlihat_fasilitas" class="input-group-btn">
                                        <a href="<?= $file_fasilitas; ?>" id="link_fasilitas" target="_blank" class="btn btn-success">Lihat Gambar</a>
                                    </div>
                                </div>
                                <div id="progress_div_fasilitas" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_fasilitas" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar Utama Berita</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file_berita" name="nama_file_berita" value="<?= $nama_berita; ?>">
                                <input type="hidden" id="folder_berita" name="folder_berita" value="sekolah">
                                <input type="file" id="pilih_berita" name="pilih_berita" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                                <input type="hidden" id="lokasi_berita" name="lokasi_berita" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload_berita()">Pilih Gambar</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target_berita" name="file_target_berita" value="<?= $berita; ?>" placeholder="Pilih Gambar" readonly>
                                    <div id="btnlihat_berita" class="input-group-btn">
                                        <a href="<?= $file_berita; ?>" id="link_berita" target="_blank" class="btn btn-success">Lihat Gambar</a>
                                    </div>
                                </div>
                                <div id="progress_div_berita" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_berita" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar Utama Galeri</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file_galeri" name="nama_file_galeri" value="<?= $nama_galeri; ?>">
                                <input type="hidden" id="folder_galeri" name="folder_galeri" value="sekolah">
                                <input type="file" id="pilih_galeri" name="pilih_galeri" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                                <input type="hidden" id="lokasi_galeri" name="lokasi_galeri" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload_galeri()">Pilih Gambar</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target_galeri" name="file_target_galeri" value="<?= $galeri; ?>" placeholder="Pilih Gambar" readonly>
                                    <div id="btnlihat_galeri" class="input-group-btn">
                                        <a href="<?= $file_galeri; ?>" id="link_galeri" target="_blank" class="btn btn-success">Lihat Gambar</a>
                                    </div>
                                </div>
                                <div id="progress_div_galeri" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_galeri" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gambar Utama Kontak</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file_kontak" name="nama_file_kontak" value="<?= $nama_kontak; ?>">
                                <input type="hidden" id="folder_kontak" name="folder_kontak" value="sekolah">
                                <input type="file" id="pilih_kontak" name="pilih_kontak" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                                <input type="hidden" id="lokasi_kontak" name="lokasi_kontak" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload_kontak()">Pilih Gambar</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target_kontak" name="file_target_kontak" value="<?= $kontak; ?>" placeholder="Pilih Gambar" readonly>
                                    <div id="btnlihat_kontak" class="input-group-btn">
                                        <a href="<?= $file_kontak; ?>" id="link_kontak" target="_blank" class="btn btn-success">Lihat Gambar</a>
                                    </div>
                                </div>
                                <div id="progress_div_kontak" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_kontak" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">User Name CMS</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>" maxlength=100 placeholder="User Name CMS">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password CMS</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" value="<?= $password; ?>" maxlength=100 placeholder="Password CMS">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" onclick="lihatpassword()"><span id="iconlihat" class="fa fa-eye"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="progress_div" class="progress progress-sm active" style="display:none;">
                            <div id="progress_bar" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                        </div>
                        <a href="<?= base_url(); ?>beranda" target="_blank" class="btn btn-default">Lihat Tampilan</a>
                        <a href="<?= base_url(); ?>sekolah" class="btn btn-default">Refresh</a>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/Center Column-->
</div>
<!--/container-fluid-->