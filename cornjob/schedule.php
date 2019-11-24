<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title> cron </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    

</head>
<body>
<?php


date_default_timezone_set("Asia/Dhaka");


$local=0;

if($local==1) {
    $con = mysqli_connect("localhost", "root", "root", "foralldoctors");
}
else{
 $con=mysqli_connect("localhost","foralldo_v1db","B_$?-mu~B5i&","foralldo_v1db");
    $con->set_charset("utf8");
}
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




//echo date_default_timezone_get();

echo "<br>";

//current time UTS
echo $localtime = date("Y-m-d H:i");



$sql = "SELECT * FROM appointment  where schedule_date LIKE '$localtime%'  AND  'status' = 0 AND doctor_country = 1";
$result = $con->query($sql);





if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>date</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['email']."</td><td>".date('Y-m-d H:i', strtotime($row["schedule_date"]))." ".$row["status"]."</td></tr>";



        $sql2 = "SELECT * FROM public_website  where country = 1 AND user_id != ".$row['doctor_id']." AND profession = ".$row['doctor_profession']."  ";
        $result2 = $con->query($sql2);


        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
               print_r($row2);




                // print_r($row);
                $dbdate = date('Y-m-d H:i', strtotime($row["schedule_date"]));
                if($localtime == $dbdate){
                    //// msg update to users
                    //$sql = "UPDATE 'appointment' SET 'doctor_id' = '".$row2['user_id']."', 'email' = '".$row2['business_email']."', 'first_name' = '".$row2['business_email']."' WHERE 'id' = '".$row['id']."' ";
                    $sql = "UPDATE appointment SET doctor_id = '".$row2['user_id']."', email = '".$row2['business_email']."', first_name = '".$row2['business_email']."'   WHERE id = $row[id] ";
                    $result = $con->query($sql);

                    echo 'update running Check :) ';

                    //$fbtitle =  $row["title"];
                    //$finalurl = 'https://crickbangla.com/blog/'.$row['id'];


                }
                else{
                    echo "False";
                }




            }
        }






    }
    echo "</table>";
} else {
    echo "NOT execute the query";
}

mysqli_close($con);






?>

</body>



