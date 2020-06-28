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
                        Data Berita Sekolah
                    </h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#form_informasi" onclick="ambil_informasi('<?= base_url(); ?>kelola_informasi/proses/1','','<?= date('Y-m-d') . 'T' . date('H:i'); ?>','','','<?= date('dmYHis'); ?>-pdf','','','','<?= date('dmYHis'); ?>-gambar','')">Tambah</button>

                            <form class="form-horizontal" method="POST" action="<?= base_url(); ?>kelola_informasi">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group margin">
                                            <div class="input-group-btn">
                                                <a href="<?= base_url(); ?>kelola_informasi" class="btn btn-danger btn-sm">Segarkan</a>
                                            </div>
                                            <input type="text" class="form-control input-sm" id="cari" name="cari" value="" placeholder="Isi judul berita" required>
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
                                        <th width="150px">Tgl. &amp; Jam</th>
                                        <th>Judul</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $hasil = json_decode($kelola_informasi);
                                    foreach ($hasil as $ki) {
                                    ?>
                                    <tr>

                                        <td align="center" style="font-size:9pt;"><?= $no; ?></td>
                                        <td style="font-size:9pt;"><?= date('d-m-Y H:i A', strtotime($ki->tgljam)); ?></td>
                                        <td style="font-size:9pt;"><?= $ki->judul; ?></td>
                                        <td align="center">
                                            <?if($ki->file_pdf != ""){?>
                                            <a href="<?= $ki->file_pdf; ?>" target="_blank" class="btn btn-default btn-xs" title="PDF File"><i class="fa fa-file-pdf-o"></i></a>
                                            <?}?>
                                            <?if($ki->youtube != ""){?>
                                            <a href="<?= $ki->youtube; ?>" target="_blank" class="btn btn-default btn-xs" title="Youtube Link"><i class="fa fa-youtube"></i></a>
                                            <?}?>
                                            <a href="<?= $ki->file_gambar; ?>" target="_blank" class="btn btn-default btn-xs" title="Image File"><i class="fa fa-image"></i></a>
                                            <a href="<?= base_url(); ?>kelola_galeri/index/<?= $ki->kd_informasi; ?>/informasi" class="btn btn-success btn-xs">Galeri</a>
                                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#form_informasi" onclick="ambil_informasi('<?= base_url(); ?>kelola_informasi/proses/2','<?= $ki->kd_informasi; ?>','<?= $ki->tgljam2; ?>','<?= $ki->judul; ?>','<?= $ki->pdf; ?>','<?= $ki->nama_pdf; ?>','<?= $ki->file_pdf; ?>','<?= $ki->youtube; ?>','<?= $ki->dp; ?>','<?= $ki->nama_gambar; ?>','<?= $ki->file_gambar; ?>')"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>kelola_informasi/proses/3/<?= $ki->kd_informasi; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Menghapus berita dengan judul <?= $ki->judul; ?>  beserta seluruh foto yang berkaitan dengan data tersebut ?')"><i class="fa fa-trash"></i></a>
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
                                <li><a href="<?= base_url(); ?>kelola_informasi/index/1/<?= $cari; ?>"><span class="fa fa-fast-backward"></a></li>
                                <li><a href="<?= base_url(); ?>kelola_informasi/index/<?= $link_prev; ?>/<?= $cari; ?>"><span class="fa fa-step-backward"></a></li>
                                <?
                                    }

                                    for ($i = $start_number; $i <= $end_number; $i++) {
                                        if ($page == $i) {
                                            $link_active = "";
                                            $link_color = "class='disabled'";
                                        } else {
                                            $link_active = base_url() . "kelola_informasi/index/$i/$cari";
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
                                <li><a href="<?= base_url(); ?>kelola_informasi/index/<?= $link_next; ?>/<?= $cari; ?>"><span class="fa fa-step-forward"></a></li>
                                <li><a href="<?= base_url(); ?>kelola_informasi/index/<?= $jumlah_page; ?>/<?= $cari; ?>"><span class="fa fa-fast-forward"></a></li>
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
<div class="modal fade" id="form_informasi" tabindex="-1" role="dialog" aria-labelledby="form_informasi" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form_informasi_label">Formulir Berita</h4>
            </div>
            <form id="frm_informasi" name="frm_informasi" method="post" action="">
                <input type="hidden" class="form-control" name="kode" id="kode" value="" />
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal &amp; Jam</label>
                        <input type="datetime-local" class="form-control" name="tgljam" id="tgljam" value="" required style="width:26%;" />
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="" maxlength=150 autocomplete="off" required />
                    </div>
                    <div id="media_pdf" class="form-group">
                        <label>PDF</label>
                        <input type="hidden" id="nama_pdf" name="nama_pdf" value="" required>
                        <input type="file" id="pilih_pdf" name="pilih_pdf" accept=".pdf" style="display:none;">
                        <input type="hidden" id="lokasi_pdf" name="lokasi_pdf" value="<?= base_url(); ?>">
                        <input type="hidden" id="folder_pdf" name="folder_pdf" value="kelola_informasi">
                        <div class="input-group margin">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-danger" onclick="upload_pdf()">Pilih (max. 10 Mb)</button>
                            </div>
                            <input type="text" class="form-control" id="file_pdf" name="file_pdf" value="" placeholder="Pilih PDF max. 10 Mb" readonly required>
                            <div id="btnlihat_pdf" class="input-group-btn">
                                <a href="#" id="link_pdf" target="_blank" class="btn btn-success">Lihat</a>
                            </div>
                        </div>
                        <div id="progress_div_pdf" class="progress progress-sm active" style="display:none;">
                            <div id="progress_bar_pdf" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                        </div>
                    </div>
                    <div id="media_youtube" class="form-group">
                        <label>Youtube Video <small>(kosongkan jika hanya ingin menampilkan slide gambar/foto dari galeri)</small></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-video-o"></i></span>
                            <input type="text" class="form-control" id="youtube" name="youtube" value="" placeholder="URL Share Video Youtube (contoh: https://www.youtube.com/embed/qJLt1k-ok-g)">
                            <div class="input-group-btn">
                                <a href="#" class="btn btn-default" onclick="alert('Contoh Share Link:\nhttps://www.youtube.com/channel/UCCa-RDVGK1ctDww0JEXsuZw?view_as=subscriber')">Contoh</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar Berita (Gambar Profil)</label>
                        <input type="hidden" id="nama_file" name="nama_file" value="" required>
                        <input type="file" id="pilih" name="pilih" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                        <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                        <input type="hidden" id="folder" name="folder" value="kelola_informasi">
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