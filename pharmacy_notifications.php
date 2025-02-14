<?php
session_start();
include 'database.php';

if (!isset($_SESSION['pharmacy_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in as admin
    exit();
}

$result = $conn->query("SELECT * FROM quotations WHERE status != 'pending' ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4"><i class="bi bi-bell"></i> Quotation Responses</h2>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-clipboard-check"></i> Approved/Rejected Quotations</h4>
        </div>
        <div class="card-body">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="alert <?php echo ($row['status'] == 'approved') ? 'alert-success' : 'alert-danger'; ?>">
                        <h5>Quotation ID: <?php echo $row['id']; ?></h5>
                        <p>Status: <strong><?php echo ucfirst($row['status']); ?></strong></p>
                        <p>Date: <?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Dummy Data for Testing -->
                <div class="alert alert-success">
                    <h5>Quotation ID: 101</h5>
                    <p>Status: <strong>Approved</strong></p>
                    <p>Date: 10 Feb 2025, 02:30 PM</p>
                </div>
                <div class="alert alert-danger">
                    <h5>Quotation ID: 102</h5>
                    <p>Status: <strong>Rejected</strong></p>
                    <p>Date: 12 Feb 2025, 04:15 PM</p>
                </div>
            <?php endif; ?>

            <a href="pharmacy_dashboard.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>