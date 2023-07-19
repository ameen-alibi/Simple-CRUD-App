<?php

include_once __DIR__ . '/functions.php';

$user_id = $_GET['id'];

$user = getUserById($user_id);

?>

<?php include __DIR__ . '/inc/header.php'; ?>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <?php if ($user) : ?>
          <div class="card">
            <div class="card-header bg-primary text-white">
              User Details
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $user->name; ?></h5>
              <p class="card-text"><strong>Username:</strong> <?php echo $user->username; ?></p>
              <p class="card-text"><strong>Email:</strong> <?php echo $user->email; ?></p>
              <p class="card-text"><strong>Phone:</strong> <?php echo $user->phone; ?></p>
              <p class="card-text"><strong>Website:</strong> <a href="https://<?php echo $user->website ?>" target="_blank">
                  <?php echo $user->website ?>
                </a></p>
            </div>
          </div>
        <?php else : ?>
          <div class="alert alert-danger" role="alert">
            User not found!
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

<?php include __DIR__ . '/inc/footer.php'; ?>