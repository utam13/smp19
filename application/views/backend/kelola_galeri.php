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
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Galeri <?= $nama_kelompok; ?>
                    </h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#form_galeri" onclick="ambil_galeri()">Tambah</button>

                            <form class="form-horizontal" method="POST" action="<?= base_url(); ?>kelola_galeri/index/<?= $kodedata; ?>/<?= $kelompok; ?>">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group margin">
                                            <div class="input-group-btn">
                                                <a href="<?= base_url(); ?>kelola_galeri/index/<?= $kodedata; ?>/<?= $kelompok; ?>" class="btn btn-danger btn-sm">Segarkan</a>
                                            </div>
                                            <input type="text" class="form-control input-sm" id="cari" name="cari" value="" placeholder="Isi judul foto" required>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary btn-sm">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12">&nbsp;</div>
                        <div class="col-sm-12">
                            <?
                            $hasil = json_decode($kelola_galeri);
                            foreach ($hasil as $kg) {
                            ?>
                            <div class="col-sm-2">
                                <a href="<?= $kg->file_foto; ?>" target="_blank">
                                    <img src="<?= $kg->file_foto; ?>" style="width:100%;">
                                </a>
                                <br><?= $kg->nama; ?>
                                <br><?= date('d-m-Y', strtotime($kg->tgl)); ?>
                                <br><br>
                                <?if($kelompok != "informasi"){
                                if ($kg->utama == 0) { ?>
                                <a href="<?= base_url(); ?>kelola_galeri/proses/<?= $kodedata; ?>/<?= $kelompok; ?>/2/<?= $kg->kd_galeri; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Set gambar utama ?')">Set Utama</a>
                                <? } else { ?>
                                <a href="#" class="btn btn-success btn-xs">Gambar Utama</a>
                                <? }} ?>
                                <a href="<?= base_url(); ?>kelola_galeri/proses/<?= $kodedata; ?>/<?= $kelompok; ?>/3/<?= $kg->kd_galeri; ?>" class="btn btn-danger btn-xs pull-right" onclick="return confirm('Menghapus galeri ?')">Hapus</a>
                            </div>
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
<div class="modal fade" id="form_galeri" tabindex="-1" role="dialog" aria-labelledby="form_galeri" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form_galeri_label">Formulir Galeri <?= ucwords($kelompok); ?></h4>
            </div>
            <form id="frm_galeri" name="frm_galeri" method="post" action="<?= base_url(); ?>kelola_galeri/proses/<?= $kodedata; ?>/<?= $kelompok; ?>/1">
                <input type="hidden" class="form-control" name="kode" id="kode" value="" />
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tgl" id="tgl" value="<?= date('Y-m-d'); ?>" required style="width:32%;" />
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="" maxlength=250 autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="hidden" id="nama_file" name="nama_file" value="<?= date('dmYHis') . "-foto"; ?>" required>
                        <input type="file" id="pilih" name="pilih" accept=".jpg,.jpeg,.png,.gif" style="display:none;">
                        <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                        <input type="hidden" id="folder" name="folder" value="kelola_galeri">
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
                    <?if($kelompok != "informasi"){?>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="utama" id="utama" value="0">
                                Atur sebagai gambar utama
                            </label>
                        </div>
                    </div>
                    <?}?>
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