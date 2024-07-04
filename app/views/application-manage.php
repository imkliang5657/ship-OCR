<?php require APP_ROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <a href="./?url=page/application-case" class="btn btn-primary" role="button">新增申請案</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>申請案</th>
                        <th>填表階段</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['applications'] as $application): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td> <?= $application['id'] ?> </td>
                            <td><?= $application['status']?></td>
                            <td><a href="./?url=page/application-stage&id=<?= $application['id'] ?>" class="btn btn-primary">修改</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="./js/datepicker.js"></script>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>