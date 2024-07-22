<?php
    unset($_SESSION['status']);
    if(isset($_POST['passwordold'])&&isset($_POST['repasswordnew'])&&isset($_POST['passwordnew']))
    {
        $data = array(
            'pwo'=>$_POST['passwordold'],
            'pwn'=>$_POST['passwordnew'],
            'rpwn'=>$_POST['repasswordnew']
        );
        if(empty($data['pwo'])||empty($data['pwn'])||empty($data['rpwn']))
        {
            $_SESSION['status'] = "<font color='red' size='4'>*</font> Chưa nhập đủ thông tin!";
        }
        else
        {
             $partern2 = "/^[0-9A-Za-z]{6,20}$/";
            if(!preg_match($partern2,$data['pwn']))
            {
                $_SESSION['status'] = "<font color='red' size='4'>*</font> Mật khẩu chỉ từ 6 đến 20 ký từ và không có ký tự đặc biệt!";
            }
            else
            {
                if($data['pwn']!=$data['rpwn'])
                {
                        $_SESSION['status'] = "<font color='red' size='4'>*</font> 2 mật khẩu mới không khớp!";
                }
                else
                {
                    require "config.php";
                    $data['pwo'] = md5($data['pwo']);
                    $data['pwn'] = md5($data['pwn']);
                    $sql = "select * from account where username='".$_SESSION['username']."' and password='".$data['pwo']."'";
                    $result = mysqli_query($con,$sql) or die("Không truy vấn được dữ liệu");
                    $num = @mysqli_num_rows($result);
                    if($num < 1)
                    {
                        $_SESSION['status'] = "<font color='red' size='4'>*</font> Không đúng mật khẩu cũ!";
                    }
                    else
                    {
                         $sql = "update account set password='".$data['pwn']."' where username='".$_SESSION['username']."'";
                        $result = mysqli_query($con,$sql) or die("Không truy vấn được dữ liệu");
                        $_SESSION['status'] = "<font color='red' size='4'>*</font> Đổi mật khẩu thành công!";
                    }
                }

            }
        }
    }
?>
<div class="div-body-panel" style="padding-top:70px;height: 900px;">
  <div style="width:70%;margin-left: 23.5%;border-radius: 30px;height: 243px">
    <div class="div-panel" style="background-color: orange;border-radius: 25px 25px 0px 0px;color:black;font-weight:bold;font-size:20px;">
        <label>Đổi mật khẩu</label>
    </div>
    <div style="background-color:rgb(255, 214, 158);border-radius: 0px 0px 25px 25px;font-weight:bold;">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
           <table  border="0" width="70%" cellpadding="5" align="center" style="text-align:center;">
               <tr>
                   <td>Mật khẩu cũ: </td>
                   <td><input class="form-control" type="password" name="passwordold" placeholder="Nhập mật khẩu cũ.."
                   /></td>
               </tr>
               <tr>
                   <td>Mật khẩu mới: </td>
                   <td><input class="form-control" type="password" name="passwordnew" placeholder="Nhập mật khẩu mới.." /></td>
               </tr>
                <tr>
                   <td>Nhập lại mật khẩu mới: </td>
                   <td><input class="form-control"type="password" name="repasswordnew" placeholder="Nhập lại mật khẩu mới" /></td>
               </tr>
               <tr>
                   <td colspan="2" style="text-align: center;"><input class="btn btn-info col-4" type="submit" value="Xác nhận đổi" /></td>
               </tr>
           </table>
            <p align="center"> <?php if(isset($_SESSION['status'])) echo $_SESSION['status'];?></p>
       </form>
    </div>
  </div>
</div>
