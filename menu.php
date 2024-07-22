<?php
session_start();
require "config.php";

  if(isset($_GET['menu']))
      {
          $_SESSION['menu'] = $_GET['menu'];
          if($_GET['menu'] == "taikhoan")
          {
            // Không đăng nhập thì ko vào quản lí tài khoản được
            if(!isset($_SESSION['user_id']))
            {
              unset($_SESSION['menu']);
            }
          }
               // Xóa hết session
          if($_SESSION['menu']=='dangxuat')
          {
              session_destroy();
          }

      }
  if(isset($_GET['menu_taikhoan']))
  {
      $_SESSION['menu_taikhoan'] = $_GET['menu_taikhoan'];
      if($_GET['menu_taikhoan'] != "edit" && $_GET['menu_taikhoan'] != "changepass" && $_GET['menu_taikhoan'] != "bill" && $_GET['menu_taikhoan'] != "history")
      {
        // Không phải admin thì ko vào được chức năng quản lý
        if($_SESSION['role'] != '1')
        {
          unset($_SESSION['menu_taikhoan']);
        }
      }
  }
  if(isset($_GET['buy']))
  {
   $_SESSION['buy'] = $_GET['buy'];
  }
  if(isset($_GET['bill_user_id']))
  {
    $_SESSION['bill_user_id'] = $_GET['bill_user_id'];
  }
  header("Location:index.php");
?>
