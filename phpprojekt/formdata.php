<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Forms</h1>
        <a class="btn btn-primary" href="index.php" role="button">Return to main page</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'forms';

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];

                    $deleteSql = "DELETE FROM form WHERE id = ?";
                    $deleteStatement = $connection->prepare($deleteSql);
                    $deleteStatement->bind_param("i", $id);
                    $deleteStatement->execute();
                    $deleteStatement->close();
                }

                $sql = "SELECT * FROM form";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['subject']}</td>
                        <td>{$row['message']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-primary btn-sm' href='formdata.php?delete={$row['id']}'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
