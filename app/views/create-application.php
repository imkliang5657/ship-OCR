<?php require APPROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APPROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row mt-2">
        <div class="col-sm-5 mb-4 mb-sm-4">
            <div class="card p-2" style="background-color: #2A3041">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <h4 class="card-title text-light mb-3">基本資料</h4>
                        </div>
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">風場</span>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">工作項目</span>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">使用船期</span>
                        <input type="text" class="form-control datepicker" value="">
                        <span class="input-group-text">至</span>
                        <input type="text" class="form-control datepicker" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">說明</span>
                        <textarea class="form-control" rows="10" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7 mb-3 mb-sm-4">
            <div class="card p-2" style="background-color: #2A3041">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <h4 class="card-title text-light mb-3">船舶資料</h4>
                        </div>
                        <div class="col-7" style="text-align: end">
                            <button type="button" class="btn btn-secondary ms-1">
                                <i class="bi bi-save"></i> 匯入規格書
                            </button>
                            <button type="button" class="btn btn-secondary ms-1">
                                <i class="bi bi-save"></i> 匯入船級證書
                            </button>
                        </div>
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">船名</span>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">船種</span>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">IMO</span>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格一</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格二</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格三</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格四</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格五</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3 mb-sm-4">
            <div class="card p-2" style="background-color: #353A4A">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <h4 class="card-title text-light mb-3">
                                需求規格
                            </h4>
                        </div>
                        <div class="col-7" style="text-align: end">
                            <button type="button" class="btn btn-success ms-1"><i class="bi bi-send-check"></i> 送出</button>
                            <button type="button" class="btn btn-danger ms-1"><i class="bi bi-file-earmark-excel"></i> 退件</button>
                        </div>
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格一</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格二</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格三</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格四</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格五</span>
                        <input type="text" class="form-control" value="">
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./js/datepicker.js"></script>
<?php require APPROOT . 'views/include/footer.php'; ?>
</body>