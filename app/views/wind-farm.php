<?php require APP_ROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-9 mb-3 mb-sm-4">
            <div class="card" style="background-color: #353A4A">
                <div class="card-body">
                    <h5 class="card-title text-light"> 國內風場位置圖</h5>
                    <p class="card-text text-secondary">顯示國內各個風場的位置與分佈。</p>ㄌ
                    <img class="card-img-top" src="./img/wind-farm.png" alt="wind-farm">
                </div>
            </div>
        </div>

        <div class="col-sm-2 mb-3 mb-sm-4">
            <div class="card" style="background-color: #353A4A">
                <div class="card-body">
                    <h5 class="card-title text-light">台灣風場</h5>
                    <p class="card-text text-secondary">選擇下列風場</p>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=1" class="btn btn-primary" role="button">台電一期</a>
                            </div>
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=2" class="btn btn-primary" role="button">台電二期</a>
                            </div>
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=3" class="btn btn-primary" role="button">中能</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=4" class="btn btn-primary" role="button">允能</a>
                            </div>
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=5" class="btn btn-primary" role="button">大彰化东南</a>
                            </div>
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=6" class="btn btn-primary" role="button">大彰化西北</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=7" class="btn btn-primary" role="button">大彰化西南</a>
                            </div>
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=8" class="btn btn-primary" role="button">彰芳</a>
                            </div>
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=9" class="btn btn-primary" role="button">海洋</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=10" class="btn btn-primary" role="button">海能</a>
                            </div>
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=11" class="btn btn-primary" role="button">海龙二号</a>
                            </div>
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=12" class="btn btn-primary" role="button">海龙三号</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <a href="./?url=page/create-wind-farm&id=13" class="btn btn-primary" role="button">西岛</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . 'views/include/footer.php'; ?>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>