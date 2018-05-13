<?php
    if (session_start()) {
        
        if( isset ( $_SESSION ['tk'])){
            session_destroy();        
            header( 'location:dangnhap.php');
        }
        else {
            echo "Ban chua dang nhap</br>";
            echo "An vao <a href='dangnhap.php'>day</a> de tro ve dang nhap.";
        }
    }
    

?>