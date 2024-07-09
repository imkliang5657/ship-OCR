<?php require APP_ROOT . 'views/include/header.php'; ?>
<body>
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-12 mb-3 mb-sm-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary" scope="col">船名</th>
                        <th class="table-primary" scope="col">可用船期</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $data['name'] ?></td>
                    <td>114/01/01 - 114/12/31</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>