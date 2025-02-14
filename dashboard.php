<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-person-circle"></i> User Dashboard</h4>
        </div>
        <div class="card-body text-center">
            <h2 class="fw-bold text-primary">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
            <p class="text-muted"><i class="bi bi-envelope"></i> <?php echo htmlspecialchars($user['email']); ?></p>

            <div class="d-grid gap-3 col-6 mx-auto mt-4">
                <a href="upload_prescription.php" class="btn btn-outline-primary btn-lg">
                    <i class="bi bi-upload"></i> Upload Prescription
                </a>
                <a href="notification.php" class="btn btn-outline-secondary btn-lg">
                    <i class="bi bi-file-text"></i> Notification
                </a>
                <a href="logout.php" class="btn btn-outline-danger btn-lg">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>