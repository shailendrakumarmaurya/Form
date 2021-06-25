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
    <h3 class="my-2">Search results</h3>
        <?php
        if (isset($_POST['submit'])) {
          $search = mysqli_real_escape_string($conn, $_POST['search']);
          if(empty(trim($search))){
            echo "Search cannot be blank.";
          }else{
            echo "<table class='table'>
              <thead>
                <tr>
                  <th scope='col'>Sr no</th>
                  <th scope='col'>First Name</th>
                  <th scope='col'>Middle Name</th>
                  <th scope='col'>Last Name</th>
                  <th scope='col'>Email</th>
                  <th scope='col'>Phone No</th>
                  <th scope='col'>Resume</th>
                  <th scope='col'>View</th>
                  <th scope='col'>Edit</th>
                  <th scope='col'>Delete</th>
                </tr>
              </thead>
              <tbody>";
            
            $sql = "SELECT * FROM `userdata` WHERE `firstname` LIKE '%$search%' OR `middlename` LIKE '%$search%' OR `lastname` LIKE '%$search%' OR `email` LIKE '%$search%' OR `phone` LIKE '%$search%' OR `resume` LIKE '%$search%' OR `address` LIKE '%$search%' OR `qualification` LIKE '%$search%' OR `institutename` LIKE '%$search%' OR `experience` LIKE '%$search%' OR `skills` LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);
            echo "There are " . $queryResults . " Results:";
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
            } else {
              echo "No results found.";
            }
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