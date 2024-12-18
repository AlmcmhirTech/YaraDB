<?php

require_once '../../classes/user_classes.php';

session_start();

$user_id = $clinic_id = '';

if(isset($_SESSION["login"])){
    $user_id = $_SESSION["user_id"];
}
else {
    header("Location: ../login/user_login.php");
    exit();
}

if (isset($_GET['clinic_id'])) {
    $clinic_id = $_GET['clinic_id'];
}
// else{
//     header("Location: ../login/user_login.php");
// }


$leaveReviewObj = new User;

$rating = $quality = $comment = '';
$ratingErr = $qualityErr = $commentErr = '';
$countErr = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rating = htmlspecialchars($_POST['rating'], ENT_QUOTES, 'UTF-8');
    $quality = implode(',', $_POST['quality']);
    $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');

    if (empty($rating)) {
        $ratingErr = "Required!";
        $countErr++;
    }
    if (empty($quality)) {
        $qualityErr = "Required!";
        $countErr++;
    }
    if (empty($comment)) {
        $commentErr = "Required!";
        $countErr++;
    }
    if ($countErr == 0) {

        $leaveReviewObj->rating = $rating;
        $leaveReviewObj->quality = $quality;
        $leaveReviewObj->comment = $comment;
        
        $user_id = 1;
        $clinic_id = 1;

        $leaveReviewObj->leaveReview($user_id, $clinic_id);
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Review</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/leave_review.css">
</head>
<body>
    <!-- NAVIGATOR BAR-->
    <?php require_once("navigator.php");?>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Leave a Review:</h2>

                <!-- Review Form -->
                <form action="leave_review.php" method="POST">

                    <!-- Clickable and Hoverable Stars for Rating -->
                    <div class="stars-display mb-3" id="stars">
                        <span><?= $ratingErr?></span>
                        <i class="lni lni-star-filled" data-value="1"></i>
                        <i class="lni lni-star-filled" data-value="2"></i>
                        <i class="lni lni-star-filled" data-value="3"></i>
                        <i class="lni lni-star-filled" data-value="4"></i>
                        <i class="lni lni-star-filled" data-value="5"></i>

                    </div>
                    
                    <!-- Hidden Input to Store the Rating -->
                    <input type="hidden" id="rating-value" name="rating" value="">

                    <!-- Check All That Apply for Reasons -->
                    <div class="mb-3">
                        <label class="form-label">Check all that apply:</label>
                        <span><?= $qualityErr?></span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="quality[]" value="Quality of Service" id="quality1">
                            <label class="form-check-label" for="quality[]">Quality of Service</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="quality[]" value="Reasonable Price" id="reason2">
                            <label class="form-check-label" for="quality[]">Reasonable Price</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="quality[]" value="Professional Staff" id="reason3">
                            <label class="form-check-label" for="quality[]">Professional Staff</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="quality[]" value="Clean Environment" id="reason4">
                            <label class="form-check-label" for="quality[]">Clean Environment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="quality[]" value="Timely Service" id="reason5">
                            <label class="form-check-label" for="quality[]">Timely Service</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="quality[]" value="Clear Communication" id="reason6">
                            <label class="form-check-label" for="quality[]">Clear Communication</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="quality[]" value="Overall Satisfaction" id="reason7">
                            <label class="form-check-label" for="quality[]">Overall Satisfaction</label>
                        </div>
                    </div>

                    <!-- Review Text Area -->
                    <div class="mb-3 mt-3">
                        <span><?= $commentErr?></span>
                        <label for="comment" class="form-label">Your Review</label>
                        <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Write your review"></textarea>
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
    <script src="../../js/user_interface.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>