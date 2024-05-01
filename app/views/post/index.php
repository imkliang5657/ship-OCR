<?php
$tbody = "";
foreach ($data as $value) {
    $tbody.= <<<HTML
      <tr>
        <th scope="row">1</th>
        <td>{{$value['id']}}</td>
        <td>{{$value['title']}}</td>
        <td>{{$value['body']}}</td>
      </tr>
HTML;
}
?>

<?php require APPROOT . 'views/inc/header.php';?>

  <div class="container px-3 py-5">
    <h1 class="mb-4">Index</h1>
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
          <?= $tbody?>
      </tbody>
    </table>
  </div>

<?php require APPROOT . 'views/inc/footer.php';?>
