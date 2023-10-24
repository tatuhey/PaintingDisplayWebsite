<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Page</title>
    <style>
        /* Add custom CSS for table */
        table {
            width: 100%;
            margin-top: 5rem;
            margin-bottom: 1rem;
            color: #212529;
        }

        table th,
        table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<?php include('components/navbar.php'); ?>


<div class="container d-flex justify-content-center align-items-center">

<?php
// Include your database connection script (e.g., db_connect.php)
include('database/db_connect.php');

// Query to retrieve user information
$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);

// Check if there are any users in the database
if ($stmt->rowCount() > 0) {
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>User ID</th>';
    echo '<th>Username</th>';
    echo '<th>Email</th>';
    echo '<th>Newsletter Subscription</th>';
    echo '<th>Breaking News Subscription</th>';
    echo '<th>Newsletter Request</th>';
    echo '<th>Breaking News Request</th>';
    echo '<th>Account Deletion Request</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';


        $reverseValue1 = ($row['newsletter_subscription'] == '1') ? '0' : '1';
        
        // Display a dropdown for each user
        echo '<td>';
        echo '<form method="post" class="d-flex flex-column justify-content-center" action="database/db_sub_edit_form.php">';
        echo '<input type="hidden" name="userId" value="' . $row['user_id'] . '">';
        echo '<select name="options">';
        echo '<option value="' . $row['newsletter_subscription'] . '">' . $row['newsletter_subscription'] . '</option>';
        echo '<option value="' . $reverseValue1 . '">' . $reverseValue1 . '</option>';
        echo '</select>';
        echo '<input type="hidden" name="user_id" value="' . $row['user_id'] . '">';
        echo '<input type="submit" class="btn btn-secondary btn-sm" value="Submit">';
        echo '</form>';
        echo '</td>';


        $reverseValue2 = ($row['breaking_news_subscription'] == '1') ? '0' : '1';
        
        // Display a dropdown for each user
        echo '<td>';
        echo '<form method="post" class="d-flex flex-column justify-content-center" action="database/db_sub_two_edit_form.php">';
        echo '<input type="hidden" name="userId" value="' . $row['user_id'] . '">';
        echo '<select name="options">';
        echo '<option value="' . $row['	breaking_news_subscription'] . '">' . $row['breaking_news_subscription'] . '</option>';
        echo '<option value="' . $reverseValue2 . '">' . $reverseValue2 . '</option>';
        echo '</select>';
        echo '<input type="hidden" name="user_id" value="' . $row['user_id'] . '">';
        echo '<input type="submit" class="btn btn-secondary btn-sm" value="Submit">';
        echo '</form>';
        echo '</td>';


        echo '<td>' . ($row['newsletter_unsubscribe_request'] == 1 ? 'Subscribe' : 'Unsubscribed') . '</td>';
        echo '<td>' . ($row['breaking_news_unsubscribe_request'] == 1 ? 'Subscribe' : 'Unsubscribed') . '</td>';
        echo '<td>' . ($row['newsletter_status']  == "subscribed" ? 'No' : 'Yes') . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No users found in the database.';
}
?>

</div >
    <form method="POST" action="../html/database/db_delete_users.php" class="container d-flex justfiy-content-center">
        <input type="text" class="" name="username">
        <button type="submit" class="btn btn-danger" name="deleteEntry">
            <i class="bi bi-trash"></i> Delete
        </button>
    </form>

</body>
</html>
