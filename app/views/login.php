<?php
if ($data['error']) {
    $displayErrorMessage = <<<HTML
      <div class="m-3">
        <div class="alert alert-danger" role="alert">帳號或密碼輸入錯誤</div>
      </div>
    HTML;
} else {
    $displayErrorMessage = "";
}
?>

<?php require APPROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APPROOT . 'views/components/publicNavBar.php'; ?>
<div class="container my-5">
    <div class="row mt-2">
        <div class="col-sm-5 mb-4 mb-sm-3">
            <div class="card" style="background-color: #353A4A">
                <div class="card-body">
                    <form action="./?url=login" method="post">
                        <h2 class="card-title text-center mb-4 mt-3 text-light">帳號登入</h2>
                        <?= $displayErrorMessage ?>
                        <div class="m-3 text-light">
                            <hr class="border border-2">
                        </div>
                        <div class="m-3">
                            <label for="inputAccount" class="form-label text-light">帳號</label>
                            <input name="account" type="text" required class="form-control" id="inputAccount"
                                   placeholder="Account">
                        </div>
                        <div class="m-3">
                            <label for="inputPassword" class="form-label text-light">密碼</label>
                            <input name="password" type="password" required class="form-control" id="inputPassword"
                                   placeholder="Password">
                        </div>
                        <div class="m-3 mt-5">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">登入</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php require APPROOT . 'views/include/footer.php'; ?>