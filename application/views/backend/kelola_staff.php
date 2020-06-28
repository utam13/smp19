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
                        Data Staff Sekolah
                    </h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#form_staff" onclick="ambil_staff('<?= base_url(); ?>kelola_staff/proses/1','','','','','','','','','','<?= date('dmYHis'); ?>-foto','')">Tambah</button>

                            <form class="form-horizontal" method="POST" action="<?= base_url(); ?>kelola_staff">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group margin">
                                            <div class="input-group-btn">
                                                <a href="<?= base_url(); ?>kelola_staff" class="btn btn-danger btn-sm">Segarkan</a>
                                            </div>
                                            <input type="text" class="form-control input-sm" id="cari" name="cari" value="" placeholder="Isi NIP atau Nama Staff" required>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary btn-sm">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 table-responsive">
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th width="100px">NIP</th>
                                        <th width="200px">Nama</th>
                                        <th width="100px">Jabatan</th>
                                        <th width="100px">Golongan</th>
                                        <th width="100px">Link Sosial Media</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $hasil = json_decode($kelola_staff);
                                    foreach ($hasil as $ks) {
                                    ?>
                                    <tr>

                                        <td align="center" style="font-size:9pt;"><?= $no; ?></td>
                                        <td style="font-size:9pt;"><?= $ks->nip; ?></td>
                                        <td style="font-size:9pt;"><?= $ks->nama; ?></td>
                                        <td style="font-size:9pt;"><?= $ks->jabatan; ?></td>
                                        <td style="font-size:9pt;"><?= $ks->golongan; ?></td>
                                        <td style="font-size:12pt;">
                                            <?
                                                if ($ks->facebook != "") {
                                                    echo "<a href='$ks->facebook' target='_blank' style='text-decoration:none;color:#000;'><i class='fa fa-facebook'></i></a>&nbsp;|&nbsp;";
                                                }
                                                if ($ks->ig != "") {
                                                    echo "<a href='$ks->ig' target='_blank' style='text-decoration:none;color:#000;'><i class='fa fa-instagram'></i></a>&nbsp;|&nbsp;";
                                                }
                                                if ($ks->twitter != "") {
                                                    echo "<a href='$ks->twitter' target='_blank' style='text-decoration:none;color:#000;'><i class='fa fa-twitter'></i></a>&nbsp;|&nbsp;";
                                                }
                                                ?>
                                        </td>
                                        <td align="center">
                                            <?if ($ks->foto_staff != "") {?>
                                            <a href="<?= $ks->file_foto; ?>" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-image"></i></a>
                                            <?}?>
                                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#form_staff" onclick="ambil_staff('<?= base_url(); ?>kelola_staff/proses/2','<?= $ks->kd_staff; ?>','<?= $ks->nip; ?>','<?= $ks->nama; ?>','<?= $ks->jabatan; ?>','<?= $ks->golongan; ?>','<?= $ks->facebook; ?>','<?= $ks->ig; ?>','<?= $ks->twitter; ?>','<?= $ks->foto_staff; ?>','<?= $ks->nama_file; ?>','<?= $ks->file_foto; ?>')"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>kelola_staff/proses/3/<?= $ks->kd_staff; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Menghapus staff  <?= $ks->nip . '-' . $ks->nama; ?> ?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <? $no++;
                                    } ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="col-sm-12">
                            <? if ($jumlah_page > 0) { ?>
                            <ul class="pagination" style="float:right;">
                                <? if ($page == 1) { ?>
                                <li class="disabled"><a href="#"><span class="fa fa-fast-backward"></a></li>
                                <li class="disabled"><a href="#"><span class="fa fa-step-backward"></a></li>
                                <? } else {
                                        $link_prev = ($page > 1) ? $page - 1 : 1; ?>
                                <li><a href="<?= base_url(); ?>kelola_staff/index/1/<?= $cari; ?>"><span class="fa fa-fast-backward"></a></li>
                                <li><a href="<?= base_url(); ?>kelola_staff/index/<?= $link_prev; ?>/<?= $cari; ?>"><span class="fa fa-step-backward"></a></li>
                                <?
                                    }

                                    for ($i = $start_number; $i <= $end_number; $i++) {
                                        if ($page == $i) {
                                            $link_active = "";
                                            $link_color = "class='disabled'";
                                        } else {
                                            $link_active = base_url() . "kelola_staff/index/$i/$cari";
                                            $link_color = "";
                                        }
                                    ?>
                                <li <?= $link_color; ?>><a href="<?= $link_active; ?>"><?= $i; ?></a></li>
                                <? }

                                    if ($page == $jumlah_page) {
                                    ?>
                                <li class="disabled"><a href="#"><span class="fa fa-step-forward"></a></li>
                                <li class="disabled"><a href="#"><span class="fa fa-fast-forward"></a></li>
                                <? } else {
                                        $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page; ?>
                                <li><a href="<?= base_url(); ?>kelola_staff/index/<?= $link_next; ?>/<?= $cari; ?>"><span class="fa fa-step-forward"></a></li>
                                <li><a href="<?= base_url(); ?>kelola_staff/index/<?= $jumlah_page; ?>/<?= $cari; ?>"><span class="fa fa-fast-forward"></a></li>
                                <? } ?>
                            </ul>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Center Column-->
</div>
<!--/container-fluid-->

<!-- Modal -->
<!--Formulir-->
<div class="modal fade" id="form_staff" tabindex="-1" role="dialog" aria-labelledby="form_staff" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form_staff_label">Formulir Staff</h4>
            </div>
            <form id="frm_staff" name="frm_staff" method="post" action="">
                <input type="hidden" class="form-control" name="kode" id="kode" value="" />
                <input type="hidden" class="form-control" name="awal" id="awal" value="" />
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP <code>(Gunakan Nomor KTP atau nomor telfon jika tidak ada)</code></label>
                        <input type="text" class="form-control" name="nip" id="nip" value="" maxlength=100 required style="width:50%;" />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="" maxlength=250 autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="jabatan" id="jabatan" style="width:50%;" required>
                            <option value="">Pilih...</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Guru BK">Guru BK</option>
                            <option value="Guru Mata Pelajaran">Guru Mata Pelajaran</option>
                            <option value="Guru TIK">Guru TIK</option>
                            <option value="Tenaga Administrasi Sekolah">Tenaga Administrasi Sekolah</option>
                            <option value="Tenaga Perpustakaan">Tenaga Perpustakaan</option>
                            <option value="Penjaga Sekolah">Penjaga Sekolah</option>
                            <option value="Office Boy">Office Boy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Golongan</label>
                        <select class="form-control" name="golongan" id="golongan" style="width:20%;">
                            <option value="">Pilih...</option>
                            <option value="I/a">I/a</option>
                            <option value="I/b">I/b</option>
                            <option value="I/c">I/c</option>
                            <option value="I/d">I/d</option>
                            <option value="II/a">II/a</option>
                            <option value="II/b">II/b</option>
                            <option value="II/c">II/c</option>
                            <option value="II/d">II/d</option>
                            <option value="III/a">III/a</option>
                            <option value="III/b">III/b</option>
                            <option value="III/c">III/c</option>
                            <option value="III/d">III/d</option>
                            <option value="IV/a">IV/a</option>
                            <option value="IV/b">IV/b</option>
                            <option value="IV/c">IV/c</option>
                            <option value="IV/d">IV/d</option>
                            <option value="IV/e">IV/e</option>
                            <option value="V/a">V/a</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Link Facebook</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-facebook"></i> https://www.facebook.com/profile_name</span>
                            <input type="text" class="form-control" id="link_facebook" name="link_facebook" value="" placeholder="Link Facebook">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Link Instagram</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-instagram"></i> https://www.instagram.com/profile_name</span>
                            <input type="text" class="form-control" id="link_ig" name="link_ig" value="" placeholder="Link Instagram">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Link Twitter</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-twitter"></i> https://www.twitter.com/profile_name</span>
                            <input type="text" class="form-control" id="link_twitter" name="link_twitter" value="" placeholder="Link Twitter">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="hidden" id="nama_file" name="nama_file" value="" required>
                        <input type="file" id="pilih" name="pilih" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                        <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                        <input type="hidden" id="folder" name="folder" value="kelola_staff">
                        <div class="input-group margin">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-danger" onclick="upload()">Pilih (max. 500 Kb)</button>
                            </div>
                            <input type="text" class="form-control" id="file_target" name="file_target" value="" placeholder="Pilih Gambar max. 500 kb" readonly required>
                            <div id="btnlihat" class="input-group-btn">
                                <a href="#" id="link" target="_blank" class="btn btn-success">Lihat</a>
                            </div>
                        </div>
                        <div id="progress_div" class="progress progress-sm active" style="display:none;">
                            <div id="progress_bar" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
                <div id="savebtn" class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal-content -->