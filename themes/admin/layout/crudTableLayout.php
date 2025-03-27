<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$this->e($pageTitle)?></title>
    <link rel="stylesheet" href="https://skeletor.greenfriends.systems/skeletorjs/css/style.css">
    <link rel="stylesheet" href="<?=ADMIN_ASSET_URL . '/css/style.css'?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
</head>
<body>
    <?php if(isset($loggedIn) && $loggedIn):?>
    <?=$this->section('navigation', $this->fetch('partialsGlobal::navigation'))?>
    <?php endif;?>
    <main id="main" <?= isset($data, $data['jsPage']) ? 'data-page="' . $data['jsPage'] . '"' : '' ?>>
        <!-- Message container start -->
        <div id="messageContainer"><?php if (isset($messages)) { echo $messages; } ?></div>
        <!-- Message container end -->
        <div id="messageContainerFixed"></div>
        <?=$this->section('content')?>
        <!-- Modal start -->
        <div id="modalOverlay" class="hidden">
            <div id="modal">
                <div id="modalMessageContainer"></div>
                <div id="modalContent"></div>
                <div id="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Modal end -->

        <!-- DT User view options start -->
        <div id="userViewOptions" class="hidden">
            <div id="columnOptions">
        <span class="userViewOptionsAnchor">
            Column Options
            <svg class="subItemsIndicator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                    </svg>
        </span>
                <div class="userViewOptionsContainer hidden">
                    <div class="userViewOptions"></div>
                </div>
            </div>
            <div id="tableOptions">
        <span class="userViewOptionsAnchor">
            Table Options
            <svg class="subItemsIndicator" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                    </svg>
        </span>
                <div class="userViewOptionsContainer hidden">
                    <div class="userViewOptions"></div>
                </div>
            </div>
        </div>
        <!-- DT User view options end -->

        <!-- Media Library start -->
        <div id="mediaLibraryOverlay" class="hidden">
            <div id="mediaLibrary">
                <div id="mediaLibraryTopBar">
                    <div id="uploadMedia" title="Upload">
                        <input type="file" multiple id="uploadMediaInput">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/>
                        </svg>
                        <span>File Upload</span>
                    </div>
                    <input aria-label="Search" type="text" placeholder="Search..." class="input" id="searchMediaLibraryInput">
                    <select aria-label="File Type" class="input" id="mediaLibraryFileTypeSelect">
                        <option value="0" disabled>Images</option>
                        <option value="1" disabled>Documents</option>
                    </select>
                    <input aria-label="From" type="date" class="input" id="mediaLibraryDateFrom">
                    <input aria-label="To" type="date" class="input" id="mediaLibraryDateTo">
                    <div id="closeMediaLibrary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                        </svg>
                    </div>
                    <div id="mediaLibraryProgressBarContainer"></div>
                </div>
                <div id="mediaLibraryContent">
                    <div id="cellsWrapper">
                        <div id="cells">

                        </div>
                    </div>
                    <div id="mediaLibrarySidebar">
                        <div id="mediaLibrarySidebarMessageContainer"></div>
                    </div>
                </div>
                <div id="mediaLibraryBottomBar">
                    <button class="btn primary hidden" id="insertMedia">
                        Insert
                    </button>
                </div>
            </div>
        </div>
        <!-- Media Library end -->
        <div id="toTopButton">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script type="module" src="<?=ADMIN_ASSET_URL . '/js/global.js'?>"></script>
    <script type="module" src="<?=ADMIN_ASSET_URL . '/js/dashboard.js'?>"></script>
    <script type="module" src="<?=ADMIN_ASSET_URL . '/js/crud.js'?>"></script>
</body>
</html>