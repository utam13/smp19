<!DOCTYPE html>
<html lang="en">

<head>
  <title>SMP Negeri 19 Balikpapan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- icons -->
  <link href="<?= $file_logo; ?>" rel="icon">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/aos.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/ionicons.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.timepicker.css">

  <!-- Font Awesome -->
  <link href="<?= base_url(); ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- #region Jssor Slider Begin -->
  <!-- Generator: Jssor Slider Composer -->
  <!-- Source: https://www.jssor.com/demos/image-gallery.slider/=edit -->
  <link href="<?= base_url(); ?>assets/lib/Jssor-Slider/slider.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/icomoon.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

  <style>
    .modal-login {
      color: #636363;
      width: 350px;
    }

    .modal-login .modal-content {
      padding: 20px;
      border-radius: 5px;
      border: none;
    }

    .modal-login .modal-header {
      border-bottom: none;
      position: relative;
      justify-content: center;
    }

    .modal-login h4 {
      text-align: center;
      font-size: 26px;
      margin: 30px 0 -15px;
    }

    .modal-login .form-control:focus {
      border-color: #70c5c0;
    }

    .modal-login .form-control,
    .modal-login .btn {
      min-height: 40px;
      border-radius: 3px;
    }

    .modal-login .close {
      position: absolute;
      top: -5px;
      right: -5px;
    }

    .modal-login .modal-footer {
      background: #ecf0f1;
      border-color: #dee4e7;
      text-align: center;
      justify-content: center;
      margin: 0 -20px -20px;
      border-radius: 5px;
      font-size: 13px;
    }

    .modal-login .modal-footer a {
      color: #999;
    }

    .modal-login .avatar {
      position: absolute;
      margin: 0 auto;
      left: 0;
      right: 0;
      top: -70px;
      width: 95px;
      height: 95px;
      border-radius: 50%;
      z-index: 9;
      background: #60c7c1;
      padding: 15px;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-login .avatar img {
      width: 100%;
    }

    .modal-login.modal-dialog {
      margin-top: 80px;
    }

    .modal-login .btn {
      color: #fff;
      border-radius: 4px;
      background: #60c7c1;
      text-decoration: none;
      transition: all 0.4s;
      line-height: normal;
      border: none;
    }

    .modal-login .btn:hover,
    .modal-login .btn:focus {
      background: #45aba6;
      outline: none;
    }
  </style>

  <? if ($pesanlogin != "") { ?>
  <script>
    alert('<?= str_replace("%20", " ", $pesanlogin); ?>');
  </script>
  <? } ?>
</head>

<body>