<?php
include("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Customers Data | MR Bank</title>
</head>

<body>
  <?php
  include 'nav.php';
  ?>
  <div class="container pt-4 d-flex flex-column justify-content-center align-items-center">
    <!-- <h1 class="h1">MR Bank</h1> -->
    <h3 class="h3">Customers Data</h4>
  </div>

  <div class="container pt-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Benificary Name</th>
          <th scope="col">Account Number</th>
          <th scope="col">Email Address</th>
          <th scope="col">Current Balance</th>
        </tr>
      </thead>
      <tbody>


        <?php
        $num = 1;
        if (!$conn) {
          echo "Something went wrong" . mysqli_connect_error();
        } else {
          $query = "SELECT id, name, acc_num, email, current_balance FROM customers;";
          $answer = mysqli_query($conn, $query);

          if (mysqli_num_rows($answer) > 0) {
            while ($rows = mysqli_fetch_array($answer)) {
              if (isset($rows)) {
        ?>
                <tr>
                  <td><?= $num++ ?></td>
                  <td><?= $rows['name'] ?></td>
                  <td><?= $rows['acc_num'] ?></td>
                  <td><?= $rows['email'] ?></td>
                  <td><?= $rows['current_balance'] ?></td>
                </tr>
        <?php
              }
            }
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php
  include 'footer.php';
  mysqli_close($conn);
  ?>
</body>

</html>