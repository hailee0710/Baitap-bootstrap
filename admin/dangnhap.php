<?php
    if(!session_start()){
        session_start();
    }

    if(isset($_SESSION['tk'])){
        header('location:index.php');
    }
    else{
        include_once "../ketnoi.php";

        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $sql = "select * from tbl_nguoidung where tendangnhap='$username' and matkhau='$password'";

            $nd = null;
            $kq = mysql_query($sql);
            $loi = "sai thong tin";

            if($kq){
                $nd = mysql_fetch_object($kq);

                if($nd != null){
                    $_SESSION['tk']['hienthi'] = $nd -> tenhienthi;
                    $_SESSION['tk']['dangnhap'] = $nd -> tendangnhap;
                    $_SESSION['tk']['id'] = $nd -> id;
                    header('location:index.php');
                }
                else{
                    session_destroy();
                    echo "<div id='loginErrorMsg' class='alert alert-error hidden'><?php echo $loi;?></div>";

                }

            }
            else{
                session_destroy();
                echo "<div id='loginErrorMsg' class='alert alert-error hidden'><?php echo $loi;?></div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  
      <link rel="stylesheet" href="css/dangnhap.css">

  
</head>

<body>

  <body class="align">

  <div class="grid">

    <form method="post" class="form login">

      <header class="login__header">
        <h3 class="login__title">Login</h3>
      </header>

      <div class="login__body">

        <div class="form__field">
          <input type="text" name="username" placeholder="Email" required>
        </div>

        <div class="form__field">
          <input type="password" name="password" placeholder="Password" required>
        </div>

      </div>

      <footer class="login__footer">
        <input type="submit" name="login" value="Login">

        <p><span class="icon icon--info">?</span><a href="#">Forgot Password</a></p>
      </footer>

    </form>

  </div>

</body>
  
  

</body>

</html>