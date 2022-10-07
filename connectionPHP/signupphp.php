<?php


// function selectsql($userkey, $userpasskey) {
   
//   $username = $userkey;
//   $userpassword = $userpasskey;
//   $sqlconnection = new mysqli('localhost', 'root','','logindani');

  
//   if($sqlconnection->connect_errno != 0){
//     echo $sqlconnection->connect_error;
//     exit();
//   }
//   $selectsql = $sqlconnection->prepare("SELECT * FROM users WHERE user_first = ? and user_pwd = ?");  
//   $selectsql->bind_param("ss", $username, $userpassword);
//   $selectsql->execute();
//   $selectsqlResult = $selectsql->get_result();
//   $selectsqlResultData = $selectsqlResult->fetch_assoc();

//   if($sqlconnection->affected_rows ==0){
//     echo "no user found";
//   }else{
//     foreach ($selectsqlResultData as $key ) {
//       echo "$key <br>";
//     }
//   }
// }

// selectsql("nedic", "nedic");
  // insert data function

    // $insertsql = $sqlconnection->prepare("INSERT into users('user_first', 'user_last','user_email','user_uid','user_pwd') values(");


  // select data function
  // 
  
// $dbconnect = new mysqli('localhost','root','','logindani');
//   $username = "John";
//   $lastname = 'Nedic';
//  if($dbconnect->connect_errno !=0){

//   return;
//  }else{
//   $stmt = $dbconnect->prepare("SELECT* FROM users WHERE user_first =? and user_last =?");
//   $stmt->bind_param("ss", $username, $lastname);

//   $stmt->execute();
//   $result = $stmt->get_result();
//   $resultFetched = $result->fetch_assoc();

//   if($dbconnect->affected_rows ==0){
//     echo "no user found";
//   }else{
//     foreach($resultFetched as $key){
//       echo $resultFetched['user_uid'];
//     }
//   }
//  }

// ------------------------------------------------------ eto ung gagamitin ko (ung asa lower part)--------------------------

if (isset($_POST['submit'])) {
  
  require "phpconnect.php";
  $first = $_POST['firstname'];
$last = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
$usertype = $_POST['usertype'];

// check empty fields
  if (empty($first) || empty($last) || empty($email) || empty($password) || empty($username) || empty($usertype)){
    header("Location:../signupINDEX.php?signup=empty");  
  exit();
  }
  // check not alphabet char in first and lastname
  else if(!preg_match("/^[a-zA-Z ]+$/", $first) || !preg_match("/^[a-zA-Z]+$/", $last)){
    header("Location:../signupINDEX.php?signup=charInvalid"); 
    exit();
  }
  //check if email is valid
  else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    header("Location:../signupINDEX.php?signup=emailInvalid&first=$first&last=$last&username=$username"); 
    exit();
  }
  // initiate check data to database if there's existing user
  else{
    $uniqid = uniqid("",true);
    $sqlsignupsearch = $dbconnect->prepare("SELECT * from usermaindata WHERE userfirstname = ? AND userlastname = ? AND useremail = ? AND userusername = ? and userpassword = ? AND usertype = ? and userdataacross=?;");
    $sqlsignupsearch->bind_param("sssssss",$first, $last, $email, $username,$password,$usertype,$uniqid);
    $sqlsignupsearch->execute();
    $selectResult = $sqlsignupsearch->get_result()->fetch_assoc();
    
    // check if theres no existing user in data table
    if ($dbconnect->affected_rows !=0) {
      header("Location:../signupINDEX.php?signup=userExist");
      exit();
      
    }else{
      $sqlsignupsearch->close();
     $usernamecheck = $dbconnect->prepare("SELECT * from usermaindata where userusername =?");
     $usernamecheck->bind_param("s", $username);
     $usernamecheck->execute();
     $usernameResultcheck = $usernamecheck->get_result()->fetch_assoc();

     if($dbconnect->affected_rows != 0){
      header("Location:../signupINDEX.php?signup=usernameTaken&first=$first&last=$last");
     }else{
      $emailcheckifexist = $email;
      $usernamecheck->close();
      $emaildbchecker = $dbconnect->prepare("SELECT * from usermaindata WHERE useremail = ?;");
      $emaildbchecker->bind_param("s",$emailcheckifexist);
      $emaildbchecker->execute();
      $emailExistResut = $emaildbchecker->get_result()->fetch_assoc();
      echo $dbconnect->affected_rows;
      if($dbconnect->affected_rows != 0){
        header("Location:../signupINDEX.php?signup=emailExist&first=$first&last=$last&username=$username");
        $first = $_GET['first'];
        $last = $_GET['last'];
        
      exit();
      }else{
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
       $status = "false";
        $sqlinsertdata = $dbconnect->prepare("INSERT INTO usermaindata(userfirstname,
      userlastname,useremail,userusername,userpassword,usertype,userdataacross) VALUES(?,?,?,?,?,?,?);");
      $sqlinsertdata->bind_param("sssssss",$first, $last, $email, $username,$hashPassword,$usertype,$uniqid);
      $sqlinsertdata->execute();
      $profileinsert = $dbconnect->prepare("INSERT INTO userprofiledata(status,dataacross) values(?,?)");
      $profileinsert->bind_param('ss',$status, $uniqid);
      $profileinsert->execute();
      header("Location:../signupINDEX.php?signup=success");
      
      }
     }
    }
  }
}else{
  header("Location:../signupINDEX.php");  
  exit();
}