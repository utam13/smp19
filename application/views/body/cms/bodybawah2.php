<footer>
    <div class="small-print">
        <div class="container">
            <p>CMS Website SMP Negeri 19 Balikpapan | Created by Cendana Kustiningrum</p>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="<?= base_url(); ?>assets/cms/js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url(); ?>assets/cms/js/bootstrap.min.js"></script>

<!-- IE10 viewport bug workaround -->
<script src="<?= base_url(); ?>assets/cms/js/ie10-viewport-bug-workaround.js"></script>

<!-- Placeholder Images -->
<script src="<?= base_url(); ?>assets/cms/js/holder.min.js"></script>

<!-- DATA TABLES SCRIPT -->
<script src="<?= base_url(); ?>assets/cms/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/cms/datatables/dataTables.bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/cms/js/datatables.custom.js"></script>

<!-- CK Editor -->
<script>
    $.fn.modal.Constructor.prototype.enforceFocus = function() {
        modal_this = this
        $(document).on('focusin.modal', function(e) {
            if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length &&
                !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') &&
                !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                modal_this.$element.focus()
            }
        })
    };
</script>
<script src="<?= base_url() ?>assets/cms/ckeditor/ckeditor.js"></script>

<!-- Editor -->
<script src="<?= base_url(); ?>assets/cms/js/editor.js"></script>

<? if ($halaman == "sekolah") { ?>
    <script>
        CKEDITOR.replace('sejarah', {
            toolbar: toolbarButton,
            height: 500
        });
    </script>
<? } ?>

<? if ($halaman == "berita") { ?>
    <script>
        CKEDITOR.replace('isi', {
            toolbar: toolbarButton,
            height: 500
        });
    </script>
<? } ?>

<!-- Javascript Action Tambahan -->
<script src="<?= base_url(); ?>assets/cms/js/aksi.js"></script>

</body>

</html>