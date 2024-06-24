<?php require APP_ROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row mt-2">
        <div class="col-sm-5 mb-4 mb-sm-4">
            <body class="card p-2" style="background-color: #2A3041">
            <form method="post" action="./?url=page/create-application-case">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <h4 class="card-title text-light mb-3">基本資料</h4>
                        </div>
                    </div>
                    <p><?//=var_dump($data['vessel_categories'])?></p>
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">風場</span>
                        <select class="form-select" name="wind_farm_id" aria-label="wind_farm_id" required>
                        <option selected disabled></option>
                        <?php foreach ($data['windFarms'] as $WindFarm): ?>
                            <option value="<?= $WindFarm['id'] ?>"><?= $WindFarm['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                     
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="work_item">工作項目</span>
                        <input type="text" class="form-control" name="work_item" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">船種</span>
                        <select class="form-select" name="vessel_category_id" aria-label="vessel_category_id" required>
                        <option selected disabled></option>
                        <?php foreach ($data['vessel_categories'] as $VesselCategory): ?>
                            <option value="<?= $VesselCategory['id'] ?>"><?= $VesselCategory['vessel_category_name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="start-ship">使用船期</span>
                        <input type="text" class="form-control datepicker" name="required_sailing_date" value="">
                        <span class="input-group-text">至</span>
                        <input type="text" class="form-control datepicker"name="required_return_date" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">描述</span>
                        <textarea class="form-control" rows="10" aria-label="With textarea" name="description" ></textarea>
                    </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> 提交</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="row">
        
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./js/datepicker.js"></script>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>