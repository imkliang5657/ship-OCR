<?php require APPROOT . 'views/inc/header.php';?>

  <div class="container px-3 py-5">
    <h1 class="mb-4">Show</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td><?= $data[0]['id'] ?></td>
          <td><?= $data[0]['name'] ?></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td><?= $data[1]['id'] ?></td>
          <td><?= $data[1]['name'] ?></td>
        </tr>
      </tbody>
    </table>
  </div>

<?php require APPROOT . 'views/inc/footer.php';?>