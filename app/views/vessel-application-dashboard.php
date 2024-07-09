<?php require APP_ROOT . 'views/include/header.php'; ?>
<body>
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-12 mb-3 mb-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增申請案</h5>
                    <p class="card-text text-secondary">上傳規格書或者手動輸入船舶資訊，並選擇先前上傳的申請案，以確認校對結果是否正確</p>
                    <a href="./?url=page/application-case" class="btn btn-sm btn-primary">點擊前往功能</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">申請案追蹤</h5>
                    <p class="card-text text-secondary"></p>
                    <a href="#" class="btn btn-sm btn-primary">點擊前往功能</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">歷史資料統計</h5>
                    <p class="card-text text-secondary"></p>
                    <a href="#" class="btn btn-sm btn-primary">點擊前往功能</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>