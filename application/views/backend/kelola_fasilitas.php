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
                        Data Fasilitas Sekolah
                    </h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#form_fasilitas" onclick="ambil_fasilitas('<?= base_url(); ?>kelola_fasilitas/proses/1','','','','<?= date('dmYHis'); ?>-foto','')">Tambah</button>

                            <form class="form-horizontal" method="POST" action="<?= base_url(); ?>kelola_fasilitas">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group margin">
                                            <div class="input-group-btn">
                                                <a href="<?= base_url(); ?>kelola_fasilitas" class="btn btn-danger btn-sm">Segarkan</a>
                                            </div>
                                            <input type="text" class="form-control input-sm" id="cari" name="cari" value="" placeholder="Isi nama fasilitas" required>
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
                                        <th width="250px">Nama Fasilitas</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $hasil = json_decode($kelola_fasilitas);
                                    foreach ($hasil as $kf) {
                                    ?>
                                    <tr>

                                        <td align="center" style="font-size:9pt;"><?= $no; ?></td>
                                        <td style="font-size:9pt;"><?= $kf->nama; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url(); ?>kelola_galeri/index/<?= $kf->kd_fasilitas; ?>/fasilitas" class="btn btn-success btn-xs">Galeri</a>
                                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#form_fasilitas" onclick="ambil_fasilitas('<?= base_url(); ?>kelola_fasilitas/proses/2','<?= $kf->kd_fasilitas; ?>','<?= $kf->nama; ?>','<?= $kf->dp; ?>','<?= $kf->nama_file; ?>','<?= $kf->file_foto; ?>')"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>kelola_fasilitas/proses/3/<?= $kf->kd_fasilitas; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Menghapus fasilitas <?= $kf->nama; ?> beserta seluruh foto yang berkaitan dengan data tersebut ?')"><i class="fa fa-trash"></i></a>
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
                                <li><a href="<?= base_url(); ?>kelola_fasilitas/index/1/<?= $cari; ?>"><span class="fa fa-fast-backward"></a></li>
                                <li><a href="<?= base_url(); ?>kelola_fasilitas/index/<?= $link_prev; ?>/<?= $cari; ?>"><span class="fa fa-step-backward"></a></li>
                                <?
                                    }

                                    for ($i = $start_number; $i <= $end_number; $i++) {
                                        if ($page == $i) {
                                            $link_active = "";
                                            $link_color = "class='disabled'";
                                        } else {
                                            $link_active = base_url() . "kelola_fasilitas/index/$i/$cari";
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
                                <li><a href="<?= base_url(); ?>kelola_fasilitas/index/<?= $link_next; ?>/<?= $cari; ?>"><span class="fa fa-step-forward"></a></li>
                                <li><a href="<?= base_url(); ?>kelola_fasilitas/index/<?= $jumlah_page; ?>/<?= $cari; ?>"><span class="fa fa-fast-forward"></a></li>
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
<div class="modal fade" id="form_fasilitas" tabindex="-1" role="dialog" aria-labelledby="form_fasilitas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form_fasilitas_label">Formulir Fasilitas</h4>
            </div>
            <form id="frm_fasilitas" name="frm_fasilitas" method="post" action="">
                <input type="hidden" class="form-control" name="kode" id="kode" value="" />
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="" maxlength=150 autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label>Foto Utama (Foto Profil)</label>
                        <input type="hidden" id="nama_file" name="nama_file" value="" required>
                        <input type="file" id="pilih" name="pilih" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                        <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                        <input type="hidden" id="folder" name="folder" value="kelola_fasilitas">
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