<?php require APPROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APPROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <button type="button" id="add-form" class="btn btn-primary">新增表單</button>
    <div class="row min-vh-100 mt-2" id="form-container"></div>
</div>
<script>
    $(document).ready(function() {
        $('#add-form').click(function() {
            $('#form-container').append(`<?php require APPROOT . 'views/components/wind-farm-new-form.php'; ?>`);
        });
    });
</script>
<script src="./js/datepicker.js"></script>
<?php require APPROOT . 'views/include/footer.php'; ?>
</body>
