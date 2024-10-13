<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- NAVIGATOR BAR-->
    <?php require_once("navigator.php");?>

    <div class="container mt-5 py-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Payment:</h2>

                <!-- Review Form -->
                <form method="POST">
                    
                    <!-- Payment Method-->
                    <div class="form-group">
                        <label>Payment Method:</label><br>
                        <select class="form-control" id="payment-field" name="pmethod" required>
                            <option>--Select Payment Method--</option>
                            <option>Gcash</option>
                            <option>Maya</option>
                            <option>Paypal</option>
                        </select>
                    </div>

                    <!-- Review Text Area -->
                    <div class="mb-3 mt-3">
                        <label class="form-label">Service Type:</label>
                        <h2><strong>Teeth Whitening</strong></h2>
                    </div>


                    <div class="mb-3 mt-3">
                        <label class="form-label">Price:</label>
                        <h2><strong>P1000</strong></h2>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FOOTER BAR -->
    <?php require_once("footer.php");?>


    <script src="style.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
