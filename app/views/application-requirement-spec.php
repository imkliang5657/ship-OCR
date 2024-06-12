<?php require APP_ROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
        <div class="container my-5">
            <div class="card-body">
                <form method="post" action="./?url=page/application-ship" >
                    <div class="row">
                        <div class="col-5">
                            <h4 class="card-title text-light mb-3">
                                需求規格
                            </h4>
                        </div>
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格一</span>
                        <select class="form-select" name="windfarm_id" aria-label="windfarm_id" >
                        <option selected disabled></option>
                        <?=$i=1?>
                        <?php foreach ($data['columns'] as $Column): ?>
                            <option value="<?= $i ?>"><?= $Column['COLUMN_NAME'] ?></option>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </select>
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格二</span>
                        <select class="form-select" name="windfarm_id" aria-label="windfarm_id" >
                        <option selected disabled></option>
                        <?=$i=1?>
                        <?php foreach ($data['columns'] as $Column): ?>
                            <option value="<?= $i ?>"><?= $Column['COLUMN_NAME'] ?></option>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </select>
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格三</span>
                        <select class="form-select" name="windfarm_id" aria-label="windfarm_id" >
                        <option selected disabled></option>
                        <?=$i=1?>
                        <?php foreach ($data['columns'] as $Column): ?>
                            <option value="<?= $i ?>"><?= $Column['COLUMN_NAME'] ?></option>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </select>
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格四</span>
                        <select class="form-select" name="windfarm_id" aria-label="windfarm_id" >
                        <option selected disabled></option>
                        <?=$i=1?>
                        <?php foreach ($data['columns'] as $Column): ?>
                            <option value="<?= $i ?>"><?= $Column['COLUMN_NAME'] ?></option>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </select>
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text">規格五</span>
                        <select class="form-select" name="windfarm_id" aria-label="windfarm_id" >
                        <option selected disabled></option>
                        <?=$i=1?>
                        <?php foreach ($data['columns'] as $Column): ?>
                            <option value="<?= $i ?>"><?= $Column['COLUMN_NAME'] ?></option>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </select>
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-success ms-1"><i class="bi bi-cursor-fill"></i> 提交</button>
                </form>
            </div>
        </div>
<script src="./js/datepicker.js"></script>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>