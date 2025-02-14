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
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-file-earmark-medical"></i> Uploaded Prescriptions</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>User Name</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Note</th>
                        <th>Delivery Time</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy Data Row 1 -->
                    <tr>
                        <td>John Doe</td>
                        <td>123 Main St, City</td>
                        <td>+1234567890</td>
                        <td>Deliver ASAP</td>
                        <td>10AM - 12PM</td>
                        <td>
                            <a href="uploads/sample1.jpg" target="_blank">
                                <img src="uploads/sample1.jpg" width="60" height="60" class="img-thumbnail">
                            </a>
                        </td>
                        <td>
                            <a href="prepare_quotation.php?prescription_id=1" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil-square"></i> Prepare Quotation
                            </a>
                        </td>
                    </tr>
                    
                    <!-- Dummy Data Row 2 -->
                    <tr>
                        <td>Jane Smith</td>
                        <td>456 Elm St, Town</td>
                        <td>+0987654321</td>
                        <td>Include painkillers</td>
                        <td>2PM - 4PM</td>
                        <td>
                            <a href="uploads/sample1.jpg" target="_blank">
                                <img src="uploads/sample1.jpg" width="60" height="60" class="img-thumbnail">
                            </a>
                        </td>
                        <td>
                            <a href="prepare_quotation.php?prescription_id=2" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil-square"></i> Prepare Quotation
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <a href="pharmacy_dashboard.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>