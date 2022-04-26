<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databaseindustrial";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT StudID FROM students WHERE id = 1";
$result = $conn->query($sql);    
   
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    
$to = "gbitounis1@yahoo.gr";
$subject = "College Absences";
$headers = "From: gbitounis4@gmail.com\r\n";
$headers .= "Reply-To: replytomail@gmail.com\r\n";
    
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
    
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>CS Number:</strong> </td> <td>". $row["StudID"]. "</td></tr>";
$message .= "<tr><td><strong>Information Security:</strong> </td><td>0</td></tr>";
$message .= "<tr><td><strong>Software Development</strong> </td><td>1</td></tr>";
$message .= "<tr><td><strong>Mathematics</strong> </td><td>0</td></tr>";
$message .= "<tr><td><strong>Networks:</strong> </td><td>0</td></tr>";
   
$message .= "</table>";
$message .= "</body></html>";

 }
} else {
    echo "0 results";
}

$conn->close();

if(mail($to,$subject,$message,$headers))
    {
echo "Mail Send Sucuceed";
    }
else{
      echo "Mail Send Failed";    
    }
?>