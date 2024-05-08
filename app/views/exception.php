<?php require APPROOT . 'views/include/header.php'; ?>
<?php require APPROOT . 'views/components/publicNavBar.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<div class="container my-5">
    <div class="row mt-2">
        <div class="col-sm-12">
            <p class="display-4"><i class="bi bi-bug-fill"></i> <?= $data['status'] ?></p>
            <h5><?= $data['message'] ?></h5>
        </div>
    </div>
</div>
</body>
<?php require APPROOT . 'views/include/footer.php'; ?>