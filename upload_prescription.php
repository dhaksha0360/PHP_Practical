<?php
session_start();
include 'database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $note = $_POST['note'];
    $delivery_address = $_POST['delivery_address'];
    $delivery_time = $_POST['delivery_time'];
    $image_paths = [];

    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    foreach ($_FILES['prescription_images']['tmp_name'] as $key => $tmp_name) {
        if ($_FILES['prescription_images']['error'][$key] == 0) {
            $file_name = time() . "_" . $_FILES['prescription_images']['name'][$key];
            $file_path = "uploads/" . $file_name;
            move_uploaded_file($tmp_name, $file_path);
            $image_paths[] = $file_path;
        }
    }

    $images_json = json_encode($image_paths);
    
    $stmt = $conn->prepare("INSERT INTO prescriptions (user_id, images, note, delivery_address, delivery_time, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("issss", $user_id, $images_json, $note, $delivery_address, $delivery_time);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Failed to upload prescription.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-upload"></i> Upload Prescription</h4>
        </div>
        <div class="card-body">
            <?php if ($message): ?>
                <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-file-earmark-image"></i> Upload Prescription Images (Max 5):</label>
                    <input type="file" class="form-control" name="prescription_images[]" multiple required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-pencil-square"></i> Note:</label>
                    <textarea class="form-control" name="note" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-house-door"></i> Delivery Address:</label>
                    <input type="text" class="form-control" name="delivery_address" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-clock"></i> Delivery Time:</label>
                    <select class="form-select" name="delivery_time">
                        <option value="8AM - 10AM">8AM - 10AM</option>
                        <option value="10AM - 12PM">10AM - 12PM</option>
                        <option value="12PM - 2PM">12PM - 2PM</option>
                        <option value="2PM - 4PM">2PM - 4PM</option>
                        <option value="4PM - 6PM">4PM - 6PM</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success"><i class="bi bi-cloud-upload"></i> Submit</button>
                <a href="dashboard.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back to Dashboard</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>