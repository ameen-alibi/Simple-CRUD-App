<?php 

include __DIR__ . '/inc/header.php';
include 'functions.php';

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'POST'){
  createUser($_POST);
  header('Location:index.php');
}

if ($request_method === 'GET'):
?>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card p-5">
            <div class="card-header">
              <h3>Create User</h3>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="m-3">
                <label for="id" class="form-label">Id:</label>
                <input name="id" type="text" class="form-control" id="id" ">
              </div>
              <div class="m-3">
                <label for="name" class="form-label">Name:</label>
                <input name="name" type="text" class="form-control" id="name" ">
              </div>
              <div class="m-3">
                <label for="username" class="form-label">Username:</label>
                <input name="username" type="text" class="form-control" id="username" ">
              </div>
              <div class="m-3">
                <label for="email" class="form-label">Email:</label>
                <input name="email" type="text" class="form-control" id="email" ">
              </div>
              <div class="m-3">
                <label for="phone" class="form-label">Phone:</label>
                <input name="phone" type="text" class="form-control" id="phone" ">
              </div>
              <div class="m-3">
                <label for="website" class="form-label">Website:</label>
                <input name="website" type="text" class="form-control" id="website" ">
              </div>
              <button type="submit" class="btn btn-outline-success">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



<?php
endif;
include __DIR__ . '/inc/footer.php';?>