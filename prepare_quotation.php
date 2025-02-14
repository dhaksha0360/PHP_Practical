<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prepare Quotation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script>
        function addDrugField() {
            const drugContainer = document.getElementById("drugs-container");
            const drugRow = document.createElement("div");
            drugRow.className = "row mb-2";
            drugRow.innerHTML = `
                <div class="col-md-4">
                    <input type="text" class="form-control" name="drug_name[]" placeholder="Drug Name" required>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" required>
                </div>
                <div class="col-md-3">
                    <input type="number" step="0.01" class="form-control" name="price[]" placeholder="Price" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove();">X</button>
                </div>
            `;
            drugContainer.appendChild(drugRow);
        }

        function redirectToDashboard(event) {
            event.preventDefault();
            alert("Quotation sent successfully!");
            window.location.href = "pharmacy_dashboard.php";
        }
    </script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4><i class="bi bi-receipt"></i> Prepare Quotation</h4>
        </div>
        <div class="card-body">
            <h5><i class="bi bi-person"></i> John Doe</h5>

            <h6><i class="bi bi-images"></i> Prescription Images:</h6>
            <div class="d-flex flex-wrap gap-2">
                <img src="uploads/sample1.jpg" class="img-thumbnail" width="120">
                <img src="uploads/sample1.jpg" class="img-thumbnail" width="120">
            </div>

            <form onsubmit="redirectToDashboard(event)">
                <h6 class="mt-3"><i class="bi bi-capsule"></i> Add Drugs:</h6>

                <div id="drugs-container">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="drug_name[]" placeholder="Drug Name" required>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" required>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="0.01" class="form-control" name="price[]" placeholder="Price" required>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove();">X</button>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-info btn-sm mt-2" onclick="addDrugField()">
                    <i class="bi bi-plus-circle"></i> Add More
                </button>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-send"></i> Send Quotation
                    </button>
                    <a href="view_prescriptions.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>