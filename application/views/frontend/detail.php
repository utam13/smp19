<div class="hero-wrap hero-wrap-2" style="background-image: url('<?= $file_foto; ?>'); background-attachment:fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate text-center">
                <h1 class="mb-3 bread"><?= $judul; ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <h2 class="mb-3"><?= $judul; ?></h2>
                <?//= html_entity_decode($isi); ?>
                <?if($youtube_info != ""){?>
                <div class="isi">
                    <iframe width="100%" height="600" src="<?= $youtube_info; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?}else{?>
                <div class="carousel-testimony owl-carousel">
                    <?
                    $hasil = json_decode($galeri);
                    foreach ($hasil as $g) {
                    ?>
                    <div class="isi">
                        <div class="testimony-wrap text-center">
                            <div class="text">
                                <p class="mb-5">
                                    <a href="<?= $g->file_galeri; ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="<?= $g->file_galeri; ?>">
                                    </a>
                                </p>
                                <p class="name">
                                    <a href="<?= $g->file_galeri; ?>" target="_blank" rel="noopener noreferrer">
                                        <?= $g->nama_galeri; ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?}?>
                </div>
                <?}?>
                <p>
                    <?if($youtube_info != "" && $url_galeri != "#"){?>
                    <a href="<?= $url_galeri; ?>" class="btn btn-primary pull-left"><i class="fa fa-image"></i> Galeri Berita</a>
                    <?}?>
                    <?if($file_pdf != ""){?>
                    <a href="<?= $file_pdf; ?>" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Download PDF</a>
                    <?}?>
                </p>
            </div>
        </div>
    </div>
    </div>


    <?// if ($jmlgaleri != 0) { ?>
    <!--
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
        -->
    <!-- Loading Screen -->
    <!--
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:600px;overflow:hidden;">
            <?/*
                $hasil = json_decode($galeri);
                foreach ($hasil as $g) {
                    if ($g->file_foto != "") { */
                ?>
            <div>
                <a href="<?//= $g->file_foto; ?>" target="_blank"><img data-u="image" src="<?//= $g->file_foto; ?>"></a>
                <img data-u="thumb" src="<?//= $g->file_foto; ?>" /></a>
            </div>
            <?// }
             //   } ?>
        </div>
        -->
    <!-- Thumbnail Navigator -->
    <!--
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:190px;height:90px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg>
                </div>
            </div>
        </div>
        -->
    <!-- Arrow Navigator -->
    <!--
        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
            </svg>
        </div>
    </div>
    -->
    <?// } ?>
</section>