<?php require APPROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APPROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row mt-2" id="form-container">
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
                            <span class="input-group-text" id="basic-addon1">船種</span>
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
                        <button type="button"  class="btn btn-primary">提交</button>
                        <button type="button" id="add-form" class="btn btn-primary">新增表單</button>
                    </div>
                </di>
            </div>
    </div>
</div>




<script>
document.getElementById('add-form').addEventListener('click', function() {
    var formContainer = document.getElementById('form-container');
    var newForm = document.createElement('div');
    newForm.innerHTML = `
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
    `;
    formContainer.appendChild(newForm);
});
</script>

<script src="./js/datepicker.js"></script>
</body>
