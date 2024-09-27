<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>Dashboard &dash; Wahana</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>pages/ico/60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>pages/ico/76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>pages/ico/120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>pages/ico/152.png">
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- <link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" /> -->
  <!-- <link href="<?php echo base_url(); ?>assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" /> -->
  <!-- <link href="<?php echo base_url(); ?>assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen" /> -->
  <!-- <link href="<?php echo base_url(); ?>assets/plugins/mapplic/css/mapplic.css" rel="stylesheet" type="text/css" /> -->
  <!-- <link href="<?php echo base_url(); ?>assets/plugins/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" /> -->
  <link href="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>pages/css/pages-icons.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="<?php echo base_url(); ?>pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />
  <style>
    .table th {
      color: #34495e !important;
      font-weight: bold !important;
      background-color: #ecf0f1;
    }

    .table td {
      padding: 5px !important;
    }

    .table th,
    .table td {
      border: 1px solid #bdc3c7 !important;
    }

    .table th:first-child {
      border-radius: 10px 0px 0px 0px;
    }

    .table th:last-child {
      border-radius: 0px 10px 0px 0px;
    }

    .table tr:last-child td:first-child {
      border-radius: 0px 0px 10px 0px;
    }

    .table tr:last-child td:last-child {
      border-radius: 0px 0px 0px 10px;
    }

    .form-control {
      border: 1px solid #bdc3c7;
    }

    .form-control:focus {
      border: 1px solid #95a5a6;
    }

    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
      color: #7f8c8d;
    }

    .summary {
      font-weight: bold;
      font-size: 1.3em;
    }

    .row-edit>td {
      background-color: #bdc3c7 !important;
      font-style: italic;
    }

    .page-sidebar .sidebar-menu .menu-items>li>a>.arrow {
      padding-right: 5px !important;
    }

    .page-sidebar .sidebar-menu .menu-items>li>a>.title {
      width: 90% !important;
    }

    .thumb {
      border: 1px solid rgba(0, 0, 0, .3);
      border-radius: 5px;
      max-width: 128px;
      /* max-height: 128px; */
    }

    .thumb>img {
      width: 100%;
    }

    @media screen and (min-width: 768px) {
      .modal-lg.modal-custom-width {
        width: 60vw;
      }
    }

    @media screen and (max-width: 768px) {
      .modal-lg.modal-custom-width {
        width: 95vw;
      }
    }

    .subtotal>td,
    .total>td {
      font-size: 15px !important;
      font-weight: bold;
    }

    .subtotal.masuk>td {
      background-color: rgba(39, 174, 96, .3);
    }

    .subtotal.keluar>td {
      background-color: rgba(211, 84, 0, .3);
    }

    .total>td {
      background-color: rgba(41, 128, 185, .3) !important;
    }
  </style>
</head>