<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$this->e($pageTitle)?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=ADMIN_ASSET_URL .'/css/style.css?v=3'?>" rel="stylesheet"/>
    <link rel="stylesheet" href="https://skeletor.greenfriends.systems/dtables/1.x/0.0/css/style.css">

    <?=$this->section('cssinclude')?>
    <?=$this->section('jsinclude')?>
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?=$this->section('navigation', $this->fetch('partialsGlobal::navigation'))?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?=$this->section('topBar', $this->fetch('partialsGlobal::topBar'))?>
            <!-- End of Topbar -->
            <div id="pageMessageContainer">
                <div id="pageErrorContainer"></div>
                <div id="messageContainer"></div>
                <!-- output flash messages -->
                <?php if (isset($messages)) { //@todo remove this, but keep if not ajax?
                    echo $messages;
                } ?>
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid contentWrapper">
                <?=$this->section('content')?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Gampo <?=date('Y')?>.</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<div id="userId" data-userId="<?=($userId ?? '')?>"></div>

<!-- Modal -->
<div id="modal" class="hidden">
    <div id="innerModal">
        <div id="errorContainer"></div>
        <div id="modalContent"></div>
        <div id="closeModal">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<div id="userId" data-userId="<?=($userId ?? '')?>"></div>

<template id="userOptionsTemplate">
    <div id="userOptionsModal">
        <div id="closeUserOptionsButton">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"></path>
            </svg>
        </div>
        <div id="userColumnOptionsHeader">
            <h4>Column options</h4>
            <div id="userColumnOptionsExpand">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                </svg>
            </div>
        </div>
        <div id="userColumnOptionsContainer">

        </div>
        <div id="userTableOptionsHeader">
            <h4>Table options</h4>
            <div id="userTableOptionsExpand">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                </svg>
            </div>
        </div>
        <div id="userTableOptionsContainer">
            <div class="userTableOption">
                <input id="userTableFontSizeOption" type="number" class="userOptionInput" placeholder="Table font size">
            </div>
        </div>
    </div>
</template>
<template id="userColumnOptionTemplate">
    <div class="userColumnOption">
        <div>
            <input type="checkbox" class="toggleColumn">
            <span class="columnName"></span>
        </div>
        <div>
            <input type="number" class="userOptionInput columnWidth" placeholder="Column width">
        </div>
    </div>
</template>


<!-- Bootstrap core JavaScript-->
<script src="<?=ADMIN_ASSET_URL .'/vendor/jquery/jquery.min.js'?>"></script>
<script src="<?=ADMIN_ASSET_URL .'/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
<script src="<?=ADMIN_ASSET_URL .'/js/bootstrap-datetimepicker.min.js'?>"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=ADMIN_ASSET_URL .'/js/luxon.js'?>"></script>
<script src="<?=ADMIN_ASSET_URL .'/js/sb-admin-2.js'?>"></script>
<script src="<?=ADMIN_ASSET_URL .'/js/global.js?v=1.0.5'?>" type="module"></script>
</body>
</html>