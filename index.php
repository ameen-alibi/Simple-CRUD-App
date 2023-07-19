<?php

declare(strict_types=1);

include_once __DIR__ . '/User.php';
include_once __DIR__ . '/functions.php';

$users = getUsers();
?>

<?php include __DIR__ . '/inc/header.php'; ?>

<body>
  <table class="table table-borderless">
    <thead class="table-dark">
      <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Website</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?php echo $user->name ?></td>
          <td><?php echo $user->username ?></td>
          <td><?php echo $user->email ?></td>
          <td><?php echo $user->phone ?></td>
          <td>
            <a href="https://<?php echo $user->website ?>" target="_blank">
              <?php echo $user->website ?>
            </a>
          </td>
          <td>
            <a href="view.php?id=<?php echo $user->id ?>" class="btn btn-outline-info">View</a>
            <a href="update.php?id=<?php echo $user->id ?>" class="btn btn-outline-secondary">Update</a>
            <a href="delete.php?id=<?php echo $user->id ?>" class="btn btn-outline-danger">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <?php include __DIR__ . '/inc/footer.php'; ?>