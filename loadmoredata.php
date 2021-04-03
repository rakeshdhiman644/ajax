
<?php

include'database.php';

$commentNewCount = $_POST['commentNewCount'];

$query = "select * from tbemp LIMIT $commentNewCount";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<table border=1 cellspacing=0 cellpadding=5 >";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo "<td>$row[empno]</td>";
                    echo "<td>$row[name]</td>";
                    echo "<td>$row[adress]</td>";
                    echo "<td>$row[salary]</td>";
                    echo '</tr>';
                }
                echo "</table>";
            } else {
                echo"no data found";
            }
            ?>