<?php require APP_ROOT . 'views/include/header.php'; ?>
<style>
    .th-property {
        width: 25%;
    }
</style>
<body class="text-white" style="background-color: #1F2634">
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container-sm my-5">
    <?php require APP_ROOT . 'views/components/application-stage.php'; ?>
    <div class="row m-5">
        <div class="card p-2" style="background-color: #2A3041">
            <div class="card-body">
                <input type="hidden" name="application_id" value="<?= $data['application']['id'] ?>">
                <table class="table table-striped table-hover">
                    <tr>
                        <th colspan="2" class="table-primary"> 風場基本資料</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table class="table mb-0">
                                <tr>
                                    <th class="th-property">風場</th>
                                    <td><?= $data['application']['wind_farm_name'] ?></td>
                                </tr>
                                <tr>
                                    <th class="th-property">工作項目</th>
                                    <td><?= $data['application']['work_item'] ?></td>
                                </tr>
                                <tr>
                                    <th class="th-property">船種</th>
                                    <td><?= $data['application']['vessel_category_name'] ?></td>
                                </tr>
                                <tr>
                                    <th class="th-property">船期</th>
                                    <td><?= $data['application']['required_sailing_date'] ?> ~ <?= $data['application']['required_return_date'] ?></td>
                                </tr>
                                <tr>
                                    <th class="th-property">描述</th>
                                    <td><?= $data['application']['description'] ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="table-primary">需求規格</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table class="table mb-0">
                                <?php foreach ($data['columns'] as $index => $column) : ?>
                                    <tr>
                                        <th class="th-property"><?= $column ?></th>
                                        <td><?= $data['application']['specification_' . $index + 1] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="table-primary">所選船隻</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table class="table mb-0">
                                <tr>
                                    <th class="th-property">船名</th>
                                    <td><?= $data['application']['vessel_name'] ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    確認送出
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">警告</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger">送出後不可進行修改，是否確認送出</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                                <a href="./?url=upsert-application-content&id=<?= $data['application']['id'] ?>" class="btn btn-primary" role="button">提交審查</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>