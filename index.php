<?php

$insert = false;
include '_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['register'])) {

    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $qualification = $_POST['qualification'];
    $institutename = $_POST['institutename'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $file = $_FILES['resume'];


    $fileName = $_FILES['resume']['name'];
    $fileTmpName = $_FILES['resume']['tmp_name'];
    $fileSize = $_FILES['resume']['size'];
    $fileType = $_FILES['resume']['type'];
    $fileError = $_FILES['resume']['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf', 'doc', 'docx');
    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 100000000) {
          $fileNameNew = uniqid('', true) . "." . $fileActualExt;
          $fileDestination = 'resumes/' . $fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
        } else {
          echo "File is too large.";
        }
      } else {
        echo "Error uploading file.";
      }
    } else {
      echo "Invalid file Type!";
    }

    $sql = "INSERT INTO `userdata`(`firstname`, `middlename`, `lastname`, `email`, `phone`, `resume`, `address`, `qualification`, `institutename`, `experience`, `skills`) VALUES ('$firstname', '$middlename', '$lastname', '$email', '$phone', '$fileName', '$address', '$qualification', '$institutename', '$experience', '$skills')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      $insert = true;
    } else {
      echo "Error occured" . mysqli_error($conn);
    }
  }
}

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
      <form class="d-flex" action="search.php" method="post" target="_blank">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
      </form>
    </div>
  </nav>

  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Registered Successfully!</strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  ?>


  <div class="container my-2">
    <form class="row g-2" action="/form/index.php" method="post" enctype="multipart/form-data">
      <div class="col-md-4 my-2">
        <label for="inputfname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="inputfname" name="fname" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="inputmname" class="form-label">Middle Name</label>
        <input type="text" class="form-control" id="inputmname" name="mname" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="inputlname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="inputlname" name="lname" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="email" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="inputphone" class="form-label">Phone No</label>
        <input type="text" class="form-control" id="inputphone" name="phone" required>
      </div>
      <div class="col-md-4 my-2">
        <label for="uploadresume" class="form-label">Upload Resume</label>
        <input type="file" name="resume" required>
      </div>
      <div class="col-12 my-2">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" name="address" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="inputqualification" class="form-label">Qualification</label>
        <input type="text" class="form-control" id="inputqualification" name="qualification" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="inputinstitutename" class="form-label">Institute Name</label>
        <input type="text" class="form-control" id="inputinstitutename" name="institutename" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="inputexperience" class="form-label">Experience</label>
        <input type="text" class="form-control" id="inputexperience" name="experience" required>
      </div>
      <div class="col-md-6 my-2">
        <label for="inputskills" class="form-label">Skills</label>
        <input type="text" class="form-control" id="inputskills" name="skills" required>
      </div>
      <div class="col-12 my-2">
        <button type="submit" class="btn btn-primary" name="register">Register</button>
      </div>
    </form>
  </div>

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Sr no</th>
          <th scope="col">First Name</th>
          <th scope="col">Middle Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone No</th>
          <th scope="col">Resume</th>
          <th scope="col">View</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>


        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `userdata`";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        $srno = 0;
        if ($queryResults > 0) {
          
          while ($row = mysqli_fetch_assoc($result)) {
            $fileName = $row['resume'];
            $id = $row['id'];
            $srno = $srno + 1;
            echo "<tr>
          <th scope='row'>" . $srno . "</th>
          <td>" . $row['firstname'] . "</td>
          <td>" . $row['middlename'] . "</td>
          <td>" . $row['lastname'] . "</td>
          <td>" . $row['email'] . "</td>
          <td>" . $row['phone'] . "</td>
          <td>" . $row['resume'] . " <a href='download.php?file=$fileName'>Download</a></td>
          <td><a href='view.php?id=$id' target='_blank'><button type='button' class='btn btn-info my-2'>View</button></td>
          <td><a href='edit.php?id=$id' target='_blank'><button type='button' class='btn btn-warning my-2'>Edit</button></td>
          <td><a href='delete.php?id=$id'><button type='button' class='btn btn-danger my-2'>Delete</button></td>
          </tr>";
          }
        }

        ?>
      </tbody>
    </table>
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