<?php 
    $cn=mysqli_connect("localhost","root","","foodee") or die("Connection failed: " . $conn->connect_error);

    if(isset($_POST['sub'])){
        $usrname = $_POST['user_name'];
        $email = $_POST['email'];
        $DateNtime = $_POST['date_n_time'];
        $feedback = $_POST['feedback'];
        $selection = $_POST['selection'];
        $phno = $_POST['tele'];
        echo $DateNtime;
        echo $usrname;
        echo $email;
        echo $feedback;
        echo $selection;
        echo $phno;
        
        $query = "INSERT INTO user (usrname,Email,DatenTime,Feedback,Selection,phno) values ('$usrname','$email','$DateNtime','$feedback','$selection','$phno')";
        // $sql = mysqli_query($cn,$qury);
        if(mysqli_query($cn,$query) === True){
            header ('Location: index.php');

       }
        else{
            echo "failed ".mysqli_connect_error();
        } 
    }
?>