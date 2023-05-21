<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "forms";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$name = "";
$email = "";
$subject = "";
$message = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $sql = "INSERT INTO form (name, email, subject, message) " .
        "VALUES (?, ?, ?, ?)";

    $statement = $connection->prepare($sql);
    $statement->bind_param("ssss", $name, $email, $subject, $message);

    if ($statement->execute()) {
        $name = "";
        $email = "";
        $subject = "";
        $message = "";
        header("location: formdata.php");
        exit;
    } else {
        $errorMessage = "Error: " . $statement->error;
    }

    $statement->close();
}

$connection->close();
?>
<div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
    <div class="container ie-h-align-center-fix">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                <div id="google-map"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
                <div class="tm-bg-white tm-p-4">
                    <form action="form.php" method="post" class="contact-form">
                        <div class="form-group">
                            <input type="text" id="contact_name" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" id="contact_email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" id="contact_subject" name="subject" value="<?php echo $subject; ?>" class="form-control" placeholder="Subject" required/>
                        </div>
                        <div class="form-group">
                            <textarea id="contact_message" name="message" class="form-control" rows="9" placeholder="Message" required><?php echo $message; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary tm-btn-primary">Send Message Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
