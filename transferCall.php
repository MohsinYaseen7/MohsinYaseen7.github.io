<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
include 'connection.php';

$amount = $_POST['amount'];
$from = $_POST['transfer-from'];
$to = $_POST['transfer-to'];
$extra = "AND $amount !> current_balance";

if (!$conn)
    echo "Something was wrong!" . mysqli_connect_error();
else {

    if ($from == $to) {
        echo '<script>alert("You cannot transfer from the same account")</script>';
?>
        <div class="container pt-5">
            <div class="alert alert-warning">
                <h4>Transaction isn't proceed <br> Please go again</h4>
                <a class="btn btn-primary mt-3" href="./transfer.php">Transfer Money</a>
            </div>
        </div>
<?php
    } else {
        $query = "UPDATE `customers` SET `current_balance` =  (current_balance + $amount)  where `acc_num` =  '" . $to . "';";
        $query .= "UPDATE `customers` SET `current_balance` =  (current_balance - $amount)  where `acc_num` =  '" . $from . "';";
        $query .= "INSERT INTO history (from_acc, to_acc, amount) Values ( '" . $from . "', '" . $to . "', '" . $amount . "');";
        $result = mysqli_multi_query($conn, $query);
        header("Location: transfer.php");
    }
}
