<?php

include '_connect.php';

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>New Project</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/form/index.php">Home</a>
    </div>
  </nav>

  <div class="container">
    <h3 class="my-2">Edit</h3>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `userdata` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    ?>
  </div>
  <div class="container my-2">
    <form class="row g-2" action="/form/update.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="col-md-4 my-2">
        <label for="inputfname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="inputfname" name="fname" value="<?php echo $row['firstname']; ?>" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="inputmname" class="form-label">Middle Name</label>
        <input type="text" class="form-control" id="inputmname" name="mname" value="<?php echo $row['middlename']; ?>" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="inputlname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="inputlname" name="lname" value="<?php echo $row['lastname']; ?>" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $row['email']; ?>" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="inputphone" class="form-label">Phone No</label>
        <input type="text" class="form-control" id="inputphone" name="phone" value="<?php echo $row['phone']; ?>" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="uploadresume" class="form-label">Upload Resume</label>
        <input type="file" name="resume" value="<?php echo $row['resume']; ?>" required>
      </div>
      <div class="col-12 my-2">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" name="address" value="<?php echo $row['address']; ?>" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="inputqualification" class="form-label">Qualification</label>
        <input type="text" class="form-control" id="inputqualification" name="qualification" value="<?php echo $row['qualification']; ?>" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="inputinstitutename" class="form-label">Institute Name</label>
        <input type="text" class="form-control" id="inputinstitutename" name="institutename" value="<?php echo $row['institutename']; ?>" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="inputexperience" class="form-label">Experience</label>
        <input type="text" class="form-control" id="inputexperience" name="experience" value="<?php echo $row['experience']; ?>" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="inputskills" class="form-label">Skills</label>
        <input type="text" class="form-control" id="inputskills" name="skills" value="<?php echo $row['skills']; ?>" required>
      </div>
      <div class="col-12 my-2">
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
    </form>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>