<?php

include __DIR__ . '/inc/header.php';
require  __DIR__ . '/functions.php';


if (!isset($_GET['id'])) {
  include __DIR__ . '/inc/not_found.php';
  exit;
}

$user_id = $_GET['id'];
$user = getUserById($user_id);
if (!$user) {
  include __DIR__ . '/inc/not_found.php';
  exit;
}

$request_method = strtolower($_SERVER['REQUEST_METHOD']);

if ($request_method === 'post') {
  updateUser($_POST, $user_id);
}
?>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card p-5">
          <?php if ($request_method === 'get') : ?>
            <div class="card-header">
              <h3>Update User : <?php echo $user->name ?></h3>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="m-3">
                <label for="name" class="form-label">Name:</label>
                <input name="name" type="text" class="form-control" id="name" value="<?php echo $user->name ?>">
              </div>
              <div class="m-3">
                <label for="username" class="form-label">Username:</label>
                <input name="username" type="text" class="form-control" id="username" value="<?php echo $user->username ?>">
              </div>
              <div class="m-3">
                <label for="email" class="form-label">Email:</label>
                <input name="email" type="text" class="form-control" id="email" value="<?php echo $user->email ?>">
              </div>
              <div class="m-3">
                <label for="phone" class="form-label">Phone:</label>
                <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $user->phone ?>">
              </div>
              <div class="m-3">
                <label for="website" class="form-label">Website:</label>
                <input name="website" type="text" class="form-control" id="website" value="<?php echo $user->website ?>">
              </div>
              <button type="submit" class="btn btn-outline-success">Submit</button>
            </form>
          <?php elseif ($request_method === 'post') : 
            header('location:index.php');?>
            <div class="alert alert-success" role="alert">
              User Details Updated Succesfully!
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


<?php include __DIR__ . '/inc/footer.php'; ?>