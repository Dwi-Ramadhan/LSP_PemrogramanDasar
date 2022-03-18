<?php
if (isset($_POST["submit"])) {
    include_once 'connection.php';

    $result = $conn->query("SELECT nama,password FROM user;");
    $users = $result->fetch_all(MYSQLI_ASSOC);
    $users_count = count($users);
    //checking occurances for each row in table user
    for ($i = 0; $i < $users_count; ++$i) {
        if ($_REQUEST['nama'] == $users[$i]['nama'] && $_REQUEST['pswd'] == $users[$i]['password']) {
            //goto homepage
            header("Location: daftarBarang.php");
            break;
        } else if ($i == $users_count - 1) {
            //if there is no occurance
            print('Error: authentication_failed');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="segment">
        <h1>Login</h1>
    </div>
    <form action="" method="post" class="container login_container">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" class="form-control"><br>
        <label for="nama">Password : </label>
        <input type="text" name="pswd" id="pswd" class="form-control"><br>
        <input type="submit" value="Login" name="submit" class="btn btn-primary btn-lg btn-block">
    </form>
</body>

</html>