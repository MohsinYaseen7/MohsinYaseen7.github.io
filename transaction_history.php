<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Transaction History | MR Bank</title>
</head>

<body>
    <?php
    include 'connection.php';
    include 'nav.php';
    ?>

    <div class="container pt-4 d-flex flex-column justify-content-center align-items-center">
        <!-- <h1 class="h1">MR Bank</h1> -->
        <h3 class="h3">Transaction History</h4>
    </div>

    <div class="container pt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Send By Acc.</th>
                    <th scope="col">Received By Acc.</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$conn) {
                    echo "Something went wrong" . mysqli_connect_error();
                } else {
                    $query = "SELECT * FROM history;";
                    $answer = mysqli_query($conn, $query);

                    if (mysqli_num_rows($answer) > 0) {
                        while ($rows = mysqli_fetch_array($answer)) {
                            if (isset($rows)) {
                ?>
                                <tr>

                                    <td><?= $rows['tid'] ?></td>
                                    <td><?= $rows['from_acc'] ?></td>
                                    <td><?= $rows['to_acc'] ?></td>
                                    <td><?= $rows['amount'] ?></td>
                                    <td><?= $rows['time'] ?></td>
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
    include 'footer.php'
    ?>

</body>

</html>