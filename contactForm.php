<?php 
    $cn=mysqli_connect("localhost","root","","foodee") or die("Connection failed: " . $conn->connect_error);

    if(isset($_POST['sub'])){
        $usrname = $_POST['user_name'];
        $email = $_POST['email'];
        $datentime = $_POST['date_n_time'];
        $feedback = $_POST['feedback'];
        $selection = $_POST['selection'];
        $phno = $_POST['tele'];
        // echo $datentime;
        // echo $usrname;
        // echo $email;
        // echo $feedback;
        // echo $selection;
        // echo $phno;
        $mobile_no = "9066879276";
        $message = "hello....";

        //made all the database column names small letters and the same changes are reflected in user.sql
        $query = "INSERT INTO user (username,email,datentime,feedback,selection,phno) values ('$usrname','$email','$datentime','$feedback','$selection','$phno')";
        // $sql = mysqli_query($cn,$qury);
        if(mysqli_query($cn,$query) === True){
            common_sms_fun($mobile_no,$message);
            // header ('Location: index.php');

       }
        else{
            echo "failed ".mysqli_connect_error();
        } 
    }

    function common_sms_fun($mobile_no, $message){
    $result = '';
	echo $message,'----',$mobile_no."</br>";
    //Service Provider "VARIFORM SOLUTION"
    $url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=11A2115d7c7b4b246fd480b611c8886028e&to=" . $mobile_no . "&sender=SLVTCC&message=" . urlencode($message);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
	
    curl_close($ch);
	// $update_query_slvtc = "update sms_to_be_sent set send_status=1 where slno ='".$slno."'";
	// $result = mysqli_query($db,$update_query_slvtc);
    // return $result;
    }
?>