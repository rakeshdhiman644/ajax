 <?php
include"database.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form action="searchdata.php" method="post">
    <input type="text" name="name" />
    <input type="submit" name="search" value="serach" /><br>
<?php
            if(isset($_POST['search'])){
             $search = mysqli_real_escape_string($connect, $_POST['name']);
             $query = "select * from tbemp WHERE empno LIKE '%$search%' OR name LIKE '%$search%' OR adress LIKE '%$search%' OR salary LIKE '%$search%'";
            $result = mysqli_query($connect, $query);
             echo "There are ".mysqli_num_rows($result)." results";
            if (mysqli_num_rows($result) > 0) {
                echo "<table border=1 cellspacing=0 cellpadding=5 >";
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo "<td>$row[empno]</td>";
                    echo "<td>$row[name]</td>";
                    echo "<td>$row[adress]</td>";
                    echo "<td>$row[salary]</td>";
                    echo '</tr>';
                }
                echo "</table>";
            } else {
                // echo"no data found";
            }
            }
            ?>
</form>
</body>
</html>