<?php
    if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    echo $username."<br>";
    echo $password;
    $con=mysqli_connect('localhost','root','','php42');
    if(!$con){
        echo"ไม่สามารถเชื่อมต่อ database ได้";
     }else{
        echo "เชื่อมต่อ database สำเร็จ";
     }
     $sql="SELECT * FROM user WHERE username='$username' and password='$password";
    //  mysqli_query($sql,$con);
     $result=$con->query($sql);
    //  $row=mysql_fetcg_array($result);
    //  echo $row['username'];
    //  echo $row['password'];
    $num=mysqli_num_row($result);
    if($num==0){
        echo "username หรือ password ไม่ถูกต้อง";
    }else{
        echo "ล็อกอินสำเร็จ";
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body style="background:#ddd;">
    <div class="container w-25" style="margin-top:150px;">
        <div class="card">
            <div class="card-header bg-danger text-white">login</div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-lable">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-lable">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-secondary">login</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>