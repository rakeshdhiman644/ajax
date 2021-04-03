<?php  
include_once'database.php';
$limit = 2;
if (isset($_GET["page"])) {
	$page  = $_GET["page"];
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
// echo $start_from;
// die();
$result = mysqli_query($connect,"SELECT * FROM tbemp ORDER BY empno ASC LIMIT $start_from, $limit");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>id</th>  
<th>Name</th>
<th>Address</th>
<th>salary</th> 
</tr>  
<thead>  
<tbody>  
<?php  
if($row = mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_array($result)) {  
?>  
            <tr>  
				<td><?php echo $row["empno"]; ?></td>  
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["adress"]; ?></td>
				<td><?php echo $row["salary"]; ?></td>
            </tr>  
<?php  
 }}else{
  ?> 
  <tr>
    <td>No Record Found!</td>
  </tr>
  <?php
 };  
?>  
</tbody>  
</table>  
<?php  

$result_db = mysqli_query($connect,"SELECT COUNT(empno) FROM tbemp");
$row_db = mysqli_fetch_row($result_db); 
$total_records = $row_db[0]; 
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
?>

<?php  
$pagLink = "<ul class='pagination'>"; 
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='pagination.php?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";  
?>
</div>
</body> 
</html>