<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

if(!isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Medical Health Center</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('_assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/css/simple-sidebar.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/libs/DataTables/datatables.min.css');?>" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/_assets/medical.png">
    <style>
        body {
            background-color: #f0fff0;
        }

        #sidebar-brand {
            -color: 
        }
        
        #wrapper {
            background-color: #f0fff0;
        }
        
        #sidebar-wrapper {
            background-color: #00b09b !important;
        }
        
        #page-content-wrapper {
            background-color: #f0fff0;
        }
        
        .sidebar-nav li a {
            color:rgb(255, 255, 255) !important;
        }
        
        .sidebar-nav li a:hover {
            background-color: #00b09b !important;
            color:rgb(61, 244, 0) !important;
        }
        
        .container-fluid {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 1, 1, 0.1);
        }
    </style>
</head>
<body>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href=""><span style="color: white !important; font-size: 24px; font-weight: bold;">Pharmacy <b></b></span></a>
                </li>
                <li>
                    <a href="<?=base_url('dashboard')?>">Halaman Muka</a>
                </li>
                <li>
                    <a href="<?=base_url('pasien/data.php')?>">Data Pasien</a>
                </li>
                <li>
                    <a href="<?=base_url('dokter/data.php')?>">Data Dokter</a>
                </li>
                <li>
                    <a href="<?=base_url('poliklinik/data.php')?>">Data Poliklinik</a>
                </li>
                <li>
                    <a href="<?=base_url('obat/data.php')?>">Data Obat</a>
                </li>
                <li>
                    <a href="<?=base_url('rekam_medis/data.php')?>">Rekam Medis</a>
                </li>
                <li>
                    <a href="<?=base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">