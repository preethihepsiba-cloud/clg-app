<?php
// $conn = new mysqli("localhost", "root", "", "studentdb");
$conn = new mysqli("localhost", "dbadmin", "admin@12d", "studentdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = "";
$error = "";

if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);

    // Photo upload
    $photo_name = basename($_FILES['photo']['name']);
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $upload_path = "uploads/" . time() . "_" . $photo_name;

    // Validate image type
    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($_FILES['photo']['type'], $allowed_types)) {
        $error = "Only JPG and PNG files are allowed!";
    } else {

        if (move_uploaded_file($photo_tmp, $upload_path)) {

            // Prepared Statement
            $stmt = $conn->prepare("INSERT INTO students (name, email, phone, course, photo) VALUES (?, ?, ?, ?, ?)");

            if ($stmt) {

                $stmt->bind_param("sssss", $name, $email, $phone, $course, $upload_path);

                if ($stmt->execute()) {
                    $success = "Student Registered Successfully!";
                } else {
                    $error = "Execution Error: " . $stmt->error;
                }

                $stmt->close();

            } else {
                $error = "Prepare failed: " . $conn->error;
            }

        } else {
            $error = "Photo upload failed!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Student Registration Form</h2>

        <?php if($success) { ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php } ?>

        <?php if($error) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" accept="image/*" required>
            </div>

            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">
                    Register
                </button>
            </div>

        </form>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
