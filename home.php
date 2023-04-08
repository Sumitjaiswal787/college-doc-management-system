<?php
    
        
        $insert = false;
if(isset($_POST['auth'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "fainal";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password,$db_name);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    //upload file
    $filename=$_FILES["fileupload"] ["name"];
$tmpname=$_FILES["fileupload"]["tmp_name"];
$folder ="uploads/".$filename;
move_uploaded_file($tmpname,$folder);
    
    $auth = $_POST['auth'];
    $des = $_POST['des'];
    $dep = $_POST['dep'];
    $act = $_POST['act'];
    $date = $_POST['date'];
    $org = $_POST['org'];
    $title = $_POST['title'];
    //$filename=$_POST['tmp_name'];
    $sql = "INSERT INTO `data` (`sr.no`,`auth`, `des`, `dep`, `act`, `date`, `org`, `title`  ) VALUES ('0','$auth', '$des', '$dep', '$act', current_timestamp() , '$org', '$title' );";
    //echo "$sql";

    if($con->query($sql) == true){
        echo "Successfully inserted";
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    // $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to College Doc</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css" >
</head>
<body>
    <img class="bg" src="bg.jpg" alt="collegeclub">
    <div class="container">
        <h1>Welcome to College Doc</h3>
        <p>Articles Published in Referred Journals </p>

        <?php
        if($insert == true){
        echo "<p class= 'submitMsg'>Thanks for submitting your form </p>";
        }
        ?>
    

        <form action="home.php" method="post" enctype="multipart/form-data">
        <!-- <img class="bg" src="bg.jpg" alt="collegeclub"> -->
        <label> AUTHOR NAME (Incase two or more authors, mention all) </label>
            <input type="text" name="auth" id="auth" placeholder="Enter Author Name" required="">
            <label>Designation :</label>
            <input type="text" name="des" id="des" placeholder="Enter Your Designation" required="">
            <label>Department :</label>
            <input type="text" name="dep" id="dep" placeholder="Enter Name Of Your  Department" required="">
            <label>Type of Activity :</label>
            <input type="text" name="act" id="act" placeholder="Enter Type of Activity " required="">
            <label>Select Date :</label>
            <input type="date" name="date" id="date" placeholder="choose date" required="">
            <label>Name Of Organization \ Institution \Publication</label>
            <input type="text" name="org" id="org" placeholder="Enter Name Of Your Organization" required="">
            <label>Title of Your Document</lebel>
            <input type="text" name="title" id="title" placeholder="Enter Title Of Your Document" required="">
            <br>



            <!-- <form action="upload.php" -->
          <!-- method="post" -->
          <!-- enctype="multipart/form-data"> -->
          <div class="input_field" >
          <input type="file" name="fileupload" style=" width: 100%">
         
         <input type="submit" 
         name="upload"
         value="Upload" class="btn" >
     
     
     
      
      
      
      
      <br>
      
     
           
            <!-- <a href="view.php" class="btn">View</a> -->
            
          
        </form>
    
    
    
    
    
    
    
    
	
      
      

      
      
      
<button href="home.php" class="btn">Home</button>          
<a href="logout.php" class="btn">Logout</a>
<a href="display.php" class="btn">Display Data</a>

    </div>

    <script src="home.js"></script>

    
</body>
</html>