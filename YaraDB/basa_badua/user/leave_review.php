<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Review</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- NAVIGATOR BAR-->
    <?php require_once("navigator.php");?>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Leave a Review:</h2>

                <!-- Review Form -->
                <form action="submit_review.php" method="POST">

                    <!-- Clickable and Hoverable Stars for Rating -->
                    <div class="stars-display mb-3" id="stars">
                        <i class="lni lni-star-filled" data-value="1"></i>
                        <i class="lni lni-star-filled" data-value="2"></i>
                        <i class="lni lni-star-filled" data-value="3"></i>
                        <i class="lni lni-star-filled" data-value="4"></i>
                        <i class="lni lni-star-filled" data-value="5"></i>
                    </div>

                    <!-- Hidden Input to Store the Rating -->
                    <input type="hidden" id="rating-value" name="rating" value="0">

                    <!-- Check All That Apply for Reasons -->
                    <div class="mb-3">
                        <label class="form-label">Check all that apply:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reasons[]" value="Quality of Service" id="reason1">
                            <label class="form-check-label" for="reason1">Quality of Service</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reasons[]" value="Reasonable Price" id="reason2">
                            <label class="form-check-label" for="reason2">Reasonable Price</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reasons[]" value="Professional Staff" id="reason3">
                            <label class="form-check-label" for="reason3">Professional Staff</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reasons[]" value="Clean Environment" id="reason4">
                            <label class="form-check-label" for="reason4">Clean Environment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reasons[]" value="Timely Service" id="reason5">
                            <label class="form-check-label" for="reason5">Timely Service</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reasons[]" value="Clear Communication" id="reason6">
                            <label class="form-check-label" for="reason6">Clear Communication</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reasons[]" value="Overall Satisfaction" id="reason7">
                            <label class="form-check-label" for="reason7">Overall Satisfaction</label>
                        </div>
                    </div>

                    <!-- Review Text Area -->
                    <div class="mb-3 mt-3">
                        <label for="review" class="form-label">Your Review</label>
                        <textarea class="form-control" id="review" name="review" rows="4" placeholder="Write your review" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- FOOTER BAR -->
    <?php require_once("footer.php");?>

    <!-- JavaScript for Interactive Star Rating -->
    <script>
        const stars = document.querySelectorAll('#stars i');
        const ratingInput = document.getElementById('rating-value');
        
        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = star.getAttribute('data-value');
                ratingInput.value = rating;

                // Highlight the clicked stars
                stars.forEach(s => {
                    if (s.getAttribute('data-value') <= rating) {
                        s.style.color = 'gold';
                    } else {
                        s.style.color = '';
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
