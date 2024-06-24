<?php require APP_ROOT . 'views/include/header.php'; ?>

<body class="text-white" style="background-color: #1F2634">
    <?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
    <div class="container m-5 ">
        <div class="card-head">
            <div class="row">
                <div class="col-3">
                    <h4 class="card-title text-light mb-3">
                        需求規格
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="./?url=page/post-requirement">
                <?php foreach ($data as $index =>$Column) : ?>
                    <div class="input-group my-3">
                        <span class="input-group-text"><?= $Column ?></span>
                        <span class="input-group-text">為</span>
                        <input type="text" class="form-control" name="<?= $index+1 ?>" placeholder="">
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-success ms-1"><i class="bi bi-cursor-fill"></i> 提交</button>
            </form>
        </div>
    </div>
    </div>
    <script src="./js/datepicker.js"></script>
    <?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>