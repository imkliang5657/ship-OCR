<?php
echo <<<HTML
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
            <button type="button" class="btn btn-primary">儲存</button>
        </div>
    </div>
</div>
HTML;