<?php require APPROOT . 'views/inc/header.php';?>

  <div class="container px-3 py-5">
    <h1 class="mb-4">Show</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Body</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td><?= $data['id'] ?></td>
          <td><?= $data['title'] ?></td>
          <td><?= $data['body'] ?></td>
        </tr>
      </tbody>
    </table>
  </div>

<?php require APPROOT . 'views/inc/footer.php';?>