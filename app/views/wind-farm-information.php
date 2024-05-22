<?php require APP_ROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <p class="fs-2"><?= $data['windFarm']['name'] ?></p>
    <div class="row min-vh-100 mt-2" id="form-container">
        <?php foreach (array_merge($data['windFarmInformation'], [null]) as $info): ?>
            <?php $id = $info['id']; ?>
            <?php require APP_ROOT . 'views/components/wind-farm-new-form.php'; ?>
        <?php endforeach; ?>
    </div>
</div>
<script src="./js/datepicker.js"></script>
<?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>
