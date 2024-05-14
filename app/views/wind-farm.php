<?php require APPROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APPROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-9 mb-3 mb-sm-4">
            <div class="card" style="background-color: #353A4A">
                <div class="card-body">
                    <h5 class="card-title text-light">  國內風場位置圖</h5>
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
                    
                     <div class="btn-group-vertical">
                            <button type="button" class="btn btn-primary">海洋</button>
                            <button type="button" class="btn btn-primary">海能</button>
                            <button type="button" class="btn btn-primary">台電一期</button>
                            <button type="button" class="btn btn-primary">允能</button>
                            <button type="button" class="btn btn-primary">彰芳</button>
                            <button type="button" class="btn btn-primary">西島</button>
                            <button type="button" class="btn btn-primary">大彰化東南</button>
                            <button type="button" class="btn btn-primary">大彰化西南</button>
                            <button type="button" class="btn btn-primary">大彰化西北</button>
                            <button type="button" class="btn btn-primary">中能</button>
                            <button type="button" class="btn btn-primary">海龍二號</button>
                            <button type="button" class="btn btn-primary">台電二期</button>
                            <button type="button" class="btn btn-primary">海龍三號</button>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php require APPROOT . 'views/include/footer.php'; ?>