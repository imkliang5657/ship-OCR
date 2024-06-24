<?php require APP_ROOT . 'views/include/header.php'; ?>

<body class="text-white" style="background-color: #1F2634">
    <?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
    <div class="container my-5 ">
        <div class="card p-2" style="background-color: #2A3041">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <h4 class="card-title text-light mb-3">國外船舶選擇</h4>
                    </div>
                </div>
                <form method="post" action="./?url=page/post-applicationship">
                    <div class="input-group my-3">
                        <label for="ship_id" class="form-label"></label>
                        <input class="form-control" list="datalistOptions" id="ship_id" name="foreign_vessel_id" placeholder="Type to search...">
                        <datalist id="datalistOptions" require>
                            <option selected disabled></option>
                            <?php foreach ($data['ship'] as $ship) : ?>
                                <option value="<?= $ship['id'] ?>"><?= $ship['name'] ?></option>
                            <?php endforeach; ?>
                        </datalist>
                        <button type="submit" class="btn btn-success ms-1"><i class="bi bi-cursor-fill"></i> 提交</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="col-7" style="text-align: end">
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
                        <span class="input-group-text" id="basic-addon1">IMO</span>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">國籍</span>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">船長</span>
                        <input type="text" name="length" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">船寬</span>
                        <input type="text" name="breadth" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">船深</span>
                        <input type="text" name="depth" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">最大吃水</span>
                        <input type="text" name="draft_max" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">最小吃水</span>
                        <input type="text"  name="draft_min"class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">最大航速</span>
                        <input type="text"  name="speed_max"class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">巡航航速</span>
                        <input type="text" name="transitSpeed"  class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">甲板空間</span>
                        <input type="text" name="freeDeckSpace" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">甲板乘載力</span>
                        <input type="text" name="deck_load_max" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">載重量</span>
                        <input type="text" name="capacity_weigth" class="form-control" value="">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">定位系統</span>
                        <input type="text" name="DPC_class" class="form-control" value="">
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
                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> 送出</button>
            </div> -->




        <script src="./js/datepicker.js"></script>
        <?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>