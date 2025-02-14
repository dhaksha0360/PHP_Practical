<?php
session_start();
if (!isset($_SESSION['pharmacy_id'])) {
    header("Location: pharmacy_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h3><i class="bi bi-house-door"></i> Pharmacy Dashboard</h3>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <!-- View Prescriptions -->
                <div class="col-md-4 mb-3">
                    <a href="view_prescriptions.php" class="btn btn-outline-primary w-100 py-3">
                        <i class="bi bi-file-earmark-medical"></i> View Prescriptions
                    </a>
                </div>
                <!-- Notifications -->
                <div class="col-md-4 mb-3">
                    <a href="pharmacy_notifications.php" class="btn btn-outline-warning w-100 py-3">
                        <i class="bi bi-bell"></i> Notifications
                    </a>
                </div>
                <!-- Logout -->
                <div class="col-md-4 mb-3">
                    <a href="logout.php" class="btn btn-outline-danger w-100 py-3">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>