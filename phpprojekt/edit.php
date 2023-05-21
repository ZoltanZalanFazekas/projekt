<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'forms';

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $updateSql = "UPDATE form SET name = ?, email = ?, subject = ?, message = ? WHERE id = ?";
    $updateStatement = $connection->prepare($updateSql);
    $updateStatement->bind_param("ssssi", $name, $email, $subject, $message, $id);
    $updateStatement->execute();
    $updateStatement->close();

    header("Location: formdata.php");
    exit;
}

$sql = "SELECT * FROM form WHERE id = ?";
$selectStatement = $connection->prepare($sql);
$selectStatement->bind_param("i", $id);
$selectStatement->execute();
$result = $selectStatement->get_result();

if (!$result) {
    die("Invalid query: " . $connection->error);
}

$row = $result->fetch_assoc();

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Edit Form</h1>
        <a class="btn btn-primary" href="formdata.php" role="button">Return</a>
        <br><br>
        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="<?php echo $row['subject']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" class="form-control" rows="9" required><?php echo $row['message']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
