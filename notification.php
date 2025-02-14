<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Dummy notifications data
$notifications = [
    [
        "id" => 1,
        "date" => "2025-02-14 10:30 AM",
        "images" => ["uploads/sample1.jpg", "uploads/sample1.jpg"],
        "drugs" => [
            ["name" => "Paracetamol", "quantity" => 2, "price" => 5],
            ["name" => "Amoxicillin", "quantity" => 1, "price" => 12]
        ],
        "total" => 22
    ],
    [
        "id" => 2,
        "date" => "2025-02-13 4:45 PM",
        "images" => ["uploads/sample1.jpg"],
        "drugs" => [
            ["name" => "xyzzy", "quantity" => 2, "price" => 100]
        ],
        "total" => 8
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-bell"></i> Notifications</h4>
        </div>
        <div class="card-body">
            <?php if (empty($notifications)): ?>
                <p class="text-muted text-center">No new notifications.</p>
            <?php else: ?>
                <?php foreach ($notifications as $notification): ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong><i class="bi bi-calendar"></i> Date: <?php echo $notification['date']; ?></strong>
                        </div>
                        <div class="card-body">
                            <h6><i class="bi bi-images"></i> Prescription Images:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <?php foreach ($notification['images'] as $image): ?>
                                    <img src="<?php echo $image; ?>" class="img-thumbnail" width="120">
                                <?php endforeach; ?>
                            </div>

                            <h6 class="mt-3"><i class="bi bi-capsule"></i> Quotation Details:</h6>
                            <ul class="list-group">
                                <?php foreach ($notification['drugs'] as $drug): ?>
                                    <li class="list-group-item">
                                        <strong><?php echo $drug['name']; ?></strong> - 
                                        <?php echo $drug['quantity']; ?> pcs @ 
                                        $<?php echo $drug['price']; ?> each
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <h6 class="mt-3 text-success">Total Amount: $<?php echo $notification['total']; ?></h6>

                            <div class="mt-2">
                                <a href="#" class="btn btn-success btn-sm">
                                    <i class="bi bi-check-circle"></i> Accept
                                </a>
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-circle"></i> Reject
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>