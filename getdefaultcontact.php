?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
 
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  
  if(!empty($res)){
    header("Status-Code:1");
    header("summary:Success");
    
    $cid = $pdo -> query("select cid from user where uid = '$uid';") -> fetch();
    
    $ins = $pdo -> query("select * from contact where cid = '$cid';") -> fetch();
  
    $arr = array(
              "cid" => $col['cid'],
              "name" => $col['name'],
              "phone" => $col['phone'],
              "email" => $col['email']
            )
    echo json_encode($arr);
  }else{
   
    header("Status-Code:-1");
    header("summary:Token out of date");
  }
  
?>
