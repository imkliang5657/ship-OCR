<?php require APP_ROOT . 'views/include/header.php'; ?>

<body class="text-white" style="background-color: #1F2634">
  <?php require APP_ROOT . 'views/components/userNavBar.php'; ?>
  <div class="container-sm my-5">
    <?php require APP_ROOT . 'views/components/application-stage.php'; ?>
    <div class="row m-5">
      <div class="card p-2" style="background-color: #2A3041">
        <div class="card-body">
          <table class="table table-striped table-hover">
            <thead>
              <th colspan="3" class="table-primary"> 風場基本資料</th>
            </thead>
            <tbody>
              <td colspan="3">
                <table class="table mb-0">

                  <tr>
                    <th colspan="2">風場</th>
                    <td><?= $data['WindFarm']['name'] ?></td>
                  </tr>
                  <tr>
                    <th colspan="2" scope="row">工作項目</th>
                    <td><?= $data['Information']['work_item'] ?></td>
                  </tr>
                  <tr>
                    <th colspan="2" scope="row">船種</th>
                    <td><?= $data['VesselCategory']['vessel_category_name'] ?></td>
                  </tr>
                  <tr>
                    <th colspan="2" scope="row">船期</th>
                    <td><?= $data['Information']['required_sailing_date'] ?> ~ <?= $data['Information']['required_return_date'] ?></td>
                  </tr>
                  <tr>
                    <th colspan="2" scope="row">描述</th>
                    <td><?= $data['Information']['description'] ?></td>

                  </tr>

                </table>
              </td>

              <tr>
                <th colspan="3" class="table-primary">需求規格</th>
              </tr>
              <td colspan="3">
                <table class="table mb-0">
                  <?php foreach ($data['columns'] as $index => $column) : ?>
                    <tr>
                      <th><?= $column ?></th>
                      <td><?= $data['vesselDetail']['specification_' . $index + 1] ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </td>
              <tr>
                <th colspan="3" class="table-primary">所選船隻</th>
              </tr>
              <td colspan="3">
                <table class="table mb-0">
                  <tr>
                    <th colspan="2">船名</th>
                    <td><?= $data['Vessel']['name'] ?></td>
                  </tr>
                </table>
              </td>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  <script src="./js/datepicker.js"></script>
  <?php require APP_ROOT . 'views/include/footer.php'; ?>
</body>