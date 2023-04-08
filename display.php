<html>
    <head>
    <title>Display</title>
    <style>
      body
            {
                background: #D071f9

            }
        table
             {
                background-color: white;
             }
    </style>
    </head>   
<?php
//include("export_data.php");
//  include("db_conn.php");
//  error_reporting(0);
$server = "localhost";
$username = "root";
$password = "";
$db_name = "fainal";
$con = mysqli_connect($server, $username, $password,$db_name);



$query = "SELECT * FROM  data";   //* MEANS all
$data = mysqli_query($con,$query);

$total = mysqli_num_rows($data);





// echo $total;

if($total !=0)
{
    ?>


 
<form action="export.php" method="post">
<input type="submit" name="export" value="CSV Export">
</form>

<form action="exportxl.php" method="post">
<input type="submit" name="excel" value="Excel Export">
</form>






    <h1 align="center"><mark>Articles Published in Referred Journals</mark></h1>
   <center> <table border="1" cellspacing="7" width="1000" >
        <tr>
        <th width="5%"> Sr.No </th>
        <th width="30%"> Author Name </th>
        <th width="10%"> Designation </th>
        <th width="5%"> Department </th>
        <th width="10%"> Type Of Activity </th>
        <th width="10%"> Date  </th>
        <th width="20%"> Organization </th>
        <th width="20%"> Title </th>
        </tr>


    <?php
   while($result = mysqli_fetch_assoc($data))
   {
    echo" <tr>
          <td>".$result['sr.no']."</td>
          <td>".$result['auth']."</td>
          <td>".$result['des']."</td>
          <td>".$result['dep']."</td>
          <td>".$result['act']."</td>
          <td>".$result['date']."</td>
          <td>".$result['org']."</td>
          <td>".$result['title']."</td>
          </tr>
        ";


   }
}
else
{
    echo "No records found";
}
?>
</table>
</html>



<!-- echo $result['sr.no']."". $result['auth']."".$result['des']."".$result['dep']."".$result['act']."".$result['date']."".$result['org']."".$result['title']."<br>"; -->
