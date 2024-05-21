<?php require APP_ROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-9 mb-3 mb-sm-4">
            <div class="card" style="background-color: #353A4A">
                <div class="card-body">
                    <h5 class="card-title text-light"> 國內風場位置圖</h5>
                    <p class="card-text text-secondary">顯示國內各個風場的位置與分佈。</p>
                    <img class="card-img-top" src="./img/wind-farm.png" alt="wind-farm">
                </div>
            </div>
        </div>
        <div class="col-sm-2 mb-3 mb-sm-4">
            <div class="card" style="background-color: #353A4A">
                <div class="card-body">
                    <h5 class="card-title text-light">台灣風場</h5>
                    <p class="card-text text-secondary">選擇下列風場</p>
                    <div class="row mb-3">
                        <?php foreach ($data['categories'] as $i => $category): ?>
                        <?php if ($i % 3 == 0): ?>
                    </div>
                    <div class="row mb-3">
                        <?php endif; ?>
                        <div class="col-md-4">
                            <a href="./?url=page/create-wind-farm&id=<?php echo $category['id'] ?>" class="btn btn-primary" role="button"><?php echo $category['name'] ?></a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>