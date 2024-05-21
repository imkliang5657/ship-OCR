<?php require APP_ROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-12 mb-3 mb-sm-4">
            <div class="card" style="background-color: #2A3041">
                <div class="card-body">
                    <h5 class="card-title text-light">新增申請案</h5>
                    <p class="card-text text-secondary">上傳規格書或者手動輸入船舶資訊，並選擇先前上傳的申請案，以確認校對結果是否正確</p>
                    <a href="./?url=page/create-application" class="btn btn-sm btn-primary">點擊前往功能</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-4">
            <div class="card" style="background-color: #353A4A">
                <div class="card-body">
                    <h5 class="card-title text-light">申請案追蹤</h5>
                    <p class="card-text text-secondary"></p>
                    <a href="#" class="btn btn-sm btn-primary">點擊前往功能</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-4">
            <div class="card" style="background-color: #353A4A">
                <div class="card-body">
                    <h5 class="card-title text-light">歷史資料統計</h5>
                    <p class="card-text text-secondary"></p>
                    <a href="#" class="btn btn-sm btn-primary">點擊前往功能</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>