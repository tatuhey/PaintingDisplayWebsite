<?php
session_start();

// Now you can retrieve the session username
$currentUserName = $_SESSION['user_id'];

// Include the database connection script
include('database/db_connect.php');

// Prepare and execute a SQL query to retrieve the user's subscription status
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$currentUserName]);
$user_info = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if $user_info is an array before accessing its elements
if (is_array($user_info)) {
    // Now $user_info contains the user's subscription status
    $newsletter_subscription = $user_info['newsletter_unsubscribe_request'];
    $breaking_news_subscription = $user_info['breaking_news_unsubscribe_request'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>User page</title>
</head>



<body>
    <?php include('components/navbar.php'); ?>

    <?php include('database/db_update_subs.php'); ?>

    <div class=" vh-100 container d-flex justify-content-center align-items-center">
    <div class="d-flex flex-column">
    <form action="userpage.php" method="post">
        <h1>Change Preferences</h1>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="newsletter" id="newsletterCheckbox" <?php echo $newsletter_subscription ? 'checked' : ''; ?>>
            <label class="form-check-label" for="newsletterCheckbox">
                Subscribe to Monthly Newsletter
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="breakingNews" id="breakingNewsCheckbox" <?php echo $breaking_news_subscription ? 'checked' : ''; ?>>
            <label class="form-check-label" for="breakingNewsCheckbox">
                Subscribe to Breaking News
            </label>
        </div>
        <br>
        <input type="hidden" name="userId" value="<?php echo $currentUserName ?>">
        <button type="submit" class="btn btn-primary">Save Preferences</button>
        <br>
        <br>
        <input type="hidden" name="newsletterStatus" value="unsubscribed">
        <button type="submit" class="btn btn-danger"> <i class="bi bi-trash"></i> Delete Account </button>
    </form>
    <br>
    <a href="logout.php"><button class="btn btn-primary">Logout</button></a>
    </div>
</div>

</body>
</html>