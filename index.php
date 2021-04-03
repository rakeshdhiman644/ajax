<?php
include'database.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
        <script src="jquery.js"></script>
        <!-- <script src="jquery.js" type="text/javascript"></script> -->
       <script>
        $(document).ready(function(){
            //alert("hello");
           var commentCount = 2;
            $("button").click(function(){
                commentCount = commentCount + 2;
                $("#comments").load("loadmoredata.php", {
                    commentNewCount: commentCount
                });
            });
        });
       </script>
    </head>
    <body>
        <div  id="comments">
            <?php
            $query = "select * from tbemp LIMIT 2";
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
        </div>
        <button>Show more data</button> 
    </body>
</html> 