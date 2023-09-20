<?php include_once "../backend-php/connect.php";?>

<?php 

    $stmt = $conn->prepare("SELECT * FROM registered_users");
    $stmt->execute();
    $result = $stmt->get_result();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCl | Overview</title>
    <link rel="icon" href="../images/note.png">
    <style>
        td, th, tr, table {
            border: 1px solid black;
            border-collapse: collapse;
            font-family: monospace;
        }

        h1 {
            font-family: monospace;
        }
    </style>
</head>
<body>
    <h1>User Accounts</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <table>
            <tr>
                <th>Email</th>
                <th>Username</th>
                <th>Profile Picture</th>
            </tr>

            <?php 
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
            ?>
            <td> <img witdth="100" height="100" src="../profile/<?php echo $row['profile']; ?>" alt=""> </td>
            <?php
            echo "<td><input type='submit' name='delete'> </td>"; 
            }
            ?>
        </table>
    </form>
    <?php 
        if (isset($_POST['delete'])) {
            echo "<script>console.log('Hello LOL'); </script>";
        }
    ?>
    <?php 

        $stmt = $conn->prepare("SELECT * FROM college_users");
        $stmt->execute();
        $result = $stmt->get_result();

    ?>
    <h1>College Accounts</h1>
    <table>
        <tr>
            <th>Email</th>
            <th>Username</th>
            <th>Profile Picture</th>
        </tr>

        <?php 
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['firstname'] . "</td>";
        ?>
        <td> <img witdth="100" height="100" src="../college-profile/<?php echo $row['profile']; ?>" alt=""> </td>
        <?php
        }
        ?>
    </table>
    
</body>
</html>