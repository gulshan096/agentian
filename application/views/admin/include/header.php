<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $seo['title']; ?></title>
        <meta content="<?php echo $seo['description']; ?>" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo BASE_HTTP_REL_URL; ?>/favicon2.ico" />
        <!-- jvectormap -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
        <!-- Bootstrap Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
		

        <!-- Icons Css -->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo BASE_HTTP_REL_URL; ?>assets/admin/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--ToolTip -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <!--ToolTip--->
        <style>
        img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 80px;
        }
        .button1 {
        background-color: #0bb197; /* Green */
        border: none;
        color: white;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        width:40%;
        border-radius: 29px;
        }
        </style>
    </head>
    <body data-sidebar="dark">
       
        <div id="layout-wrapper">
            <header id="page-topbar" style="background-color:#fff;">
                <?php $this->load->view('admin/include/sidebar-left'); ?>
            </header>
           
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
					<?php $this->load->view('admin/include/sidemenu'); ?>
                </div>
            </div>
           
            <div class="main-content">