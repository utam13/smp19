<div class="hero-wrap hero-wrap-2" style="background-image: url('<?= $file_kontak; ?>'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-3 bread">Kontak<br>SMP Negeri 19 Balikpapan</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-12 pr-md-5">
                <h4 class="mb-4">Ada pertanyaan/saran/kritik dapat Anda sampaikan disini dan akan di balas langsung ke email Anda</h4>
                <form action="" class="contactForm">
                    <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                    <input type="hidden" id="email_sekolah" name="email_sekolah" value="<?= $email; ?>">
                    <div class="form-group">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Anda">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Anda">
                    </div>
                    <div class="form-group">
                        <input type="text" id="subjek" name="subjek" class="form-control" placeholder="Subjek Pesan">
                    </div>
                    <div class="form-group">
                        <textarea name="pesan" id="pesan" cols="30" rows="7" class="form-control" placeholder="Pesan"></textarea>
                    </div>
                    <div class="form-group">
                        <button id="btnkirim" type="submit" class="btn btn-primary py-3 px-5 pull-right" onclick="alert('Tunggu hingga ada pesan pemrosesan !!!')">Kirim Pesan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>