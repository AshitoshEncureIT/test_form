<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title><?= $title ?></title>
  </head>
  <body>

    <div class="container">
      <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="<?= base_url('Home') ?>" class="nav-link <?= ($active_li == 'upload_file')? 'active':''; ?>">Upload JSON file</a></li>
          <li class="nav-item"><a href="#" class="nav-link <?= ($active_li == 'dynamic_form')? 'active':''; ?>">Dynamic form</a></li>
        </ul>
      </header>
    </div>