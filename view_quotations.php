<?php
session_start();
include 'database.php';

// Restrict access to only admin@gmail.com
if (!isset($_SESSION['pharmacy_id']) || $_SESSION['pharmacy_email'] !== 'admin@gmail.com') {
    header("Location: login.php"); // Redirect unauthorized users
    exit();
}

$result = $conn->query("SELECT p.*, u.name, u.address, u.contact_no, u.email FROM prescriptions p JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prescriptions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4"><i class="bi bi-file-earmark-medical"></i> View Prescriptions</h2>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-list"></i> Uploaded Prescriptions</h4>
        </div>
        <div class="card-body">
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>User Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Note</th>
                            <th>Delivery Time</th>
                            <th>Uploaded Date</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                <td><?php echo htmlspecialchars($row['contact_no']); ?></td>
                                <td><?php echo htmlspecialchars($row['note']); ?></td>
                                <td><?php echo htmlspecialchars($row['delivery_time']); ?></td>
                                <td><?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?></td>
                                <td>
                                    <?php 
                                    $images = json_decode($row['images'], true);
                                    if (!empty($images) && is_array($images)) {
                                        foreach ($images as $image): ?>
                                            <a href="<?php echo htmlspecialchars($image); ?>" target="_blank">
                                                <img src="<?php echo htmlspecialchars($image); ?>" width="60" height="60" class="img-thumbnail">
                                            </a>
                                        <?php endforeach;
                                    } else {
                                        echo "<span class='text-danger'>No Image</span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="prepare_quotation.php?prescription_id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil-square"></i> Prepare Quotation
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning text-center">
                    <i class="bi bi-exclamation-triangle"></i> No prescriptions uploaded yet.
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