<?php
include './Includes/Functions/functions.php';
include './Includes/Functions/auth.php';


$expense = $params['expense'];
$expense['user_id'] = $_SESSION['user']['id'];

if (empty($expense['amount']) || empty($expense['description']) || empty($expense['category_id'])) {
    $_SESSION['ERROR'] = "All fields are required";
    if ($update) {
        header("Location: add_edit_expense.php?expense_id=$expense_id");
    } else {
        header("Location: add_edit_expense.php");
    }

    die;
}

if ($update) {
    $db->update("expenses", $expense, array("id" => $expense_id));
} else {
    $expense['datetime_added'] = get_datetime();

    $db->insert("expenses", $expense);
}


$_SESSION['SUCCESS'] = "Saved successfully";
header("Location: manage_expenses.php");
die;