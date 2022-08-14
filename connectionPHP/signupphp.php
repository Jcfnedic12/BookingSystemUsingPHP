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
  if (empty($first) || empty($last) || empty($email) || empty($password) || empty($username)){
    header("Location:../signupINDEX.php?signup=empty");  
  exit();
  }else if(!preg_match("/^[a-zA-Z]+$/", $first) || !preg_match("/^[a-zA-Z]+$/", $last)){
    header("Location:../signupINDEX.php?signup=charInvalid"); 
    exit();
  }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    header("Location:../signupINDEX.php?signup=emailInvalid&first=$first&last=$last&username=$username"); 
    exit();
  }else{
    $sqlsignupsearch = $dbconnect->prepare("SELECT * from users WHERE user_first = ? AND user_last = ? AND user_email = ? AND user_uid = ? AND user_pwd = ?;");
    $sqlsignupsearch->bind_param("sssss",$first, $last, $email, $username,$password);
    $sqlsignupsearch->execute();
    $selectResult = $sqlsignupsearch->get_result()->fetch_assoc();
    
    if ($dbconnect->affected_rows !=0) {
      header("Location:../signupINDEX.php?signup=userExist");
      exit();
      
    }else{
      $emailcheckifexist = $email;
      $sqlsignupsearch->close();
      $emaildbchecker = $dbconnect->prepare("SELECT * from users WHERE user_email = ?;");
      $emaildbchecker->bind_param("s",$emailcheckifexist);
      $emaildbchecker->execute();
      $emailExistResut = $emaildbchecker->get_result()->fetch_assoc();
      echo $dbconnect->affected_rows;
      if($dbconnect->affected_rows != 0){
        header("Location:../signupINDEX.php?signup=emailExist&first=$first&last=$last&username=$username");
        $first = $_GET['first'];
        $last = $_GET['last'];
        $username = $_GET['username'];
      exit();
      }else{
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sqlinsertdata = $dbconnect->prepare("INSERT INTO users(user_first,
      user_last,user_email,user_uid,user_pwd) VALUES(?,?,?,?,?);");
      $sqlinsertdata->bind_param("sssss",$first, $last, $email, $username,$hashPassword);
      $sqlinsertdata->execute();
      header("Location:../signupINDEX.php?signup=success");
      
      }
      

    }
  }
}else{
  header("Location:../signupINDEX.php");  
  exit();
}