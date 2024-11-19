<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $sql = "UPDATE users SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', 
            age='$age', address='$address', course_section='$course_section' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>
            <input type="text" name="middle_name" value="<?php echo $row['middle_name']; ?>" required>
            <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>
            <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
            <input type="text" name="address" value="<?php echo $row['address']; ?>" required>
            <input type="text" name="course_section" value="<?php echo $row['course_section']; ?>" required>
            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
