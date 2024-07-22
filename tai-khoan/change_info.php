<?php

    unset($_SESSION['status']);
    // Xử lí trang đổi thông tin
            if(isset($_POST['fullname'])&&isset($_POST['sex'])&&isset($_POST['birthday'])&&isset($_POST['phone'])&&isset($_POST['address']))
            {
                $data = array(
                    'fullname'=>$_POST['fullname'],
                    'sex'=>$_POST['sex'],
                    'birthday'=>$_POST['birthday'],
                    'phone'=>$_POST['phone'],
                    'address'=>$_POST['address']
                );
                if(empty($data['fullname'])||empty($data['sex'])||empty($data['birthday'])||empty($data['phone'])||empty($data['address']))
                {
                    $_SESSION['status'] = "<font color='red' size='4'>*</font> Chưa nhập đủ thông tin!";


                }
                else
                {
                    $partern2 = "/^[0-9]{10,11}$/";
                    if(!preg_match($partern2,$data['phone']))
                    {
                        $_SESSION['status'] = "<font color='red'>* </font>Số điện thoại chỉ chứa ký tự số và độ dài 10 hoặc 11 ký tự";
                    }
                    else
                    {   require "config.php";
                        $sql = "update account set fullname='".$data['fullname']."',sex='".$data['sex']."',birthday='".$data['birthday']."',phone='".$data['phone']."',address='".$data['address']."' where username='".$_SESSION['username']."'";
                        $result = mysqli_query($con,$sql) or die ("Không cập nhật thành công!");
                        $_SESSION['status'] = "<font color='red'>* </font> Sửa thông tin thành công!";
                    }
                }
            }
$sql_hienthi = "select * from account where username='".$_SESSION['username']."'";
$result_hienthi = mysqli_query($con,$sql_hienthi);
$row_hienthi = @mysqli_fetch_array($result_hienthi);
?>
    <div class="div-body-panel" style="padding-top:70px;height: 900px;">
      <div style="width:70%;margin-left: 23.5%;border-radius: 30px;height: 326px;">
        <div class="div-panel" style="background-color: orange;border-radius: 25px 25px 0px 0px;color:black;font-weight:bold;font-size:20px;">
            <label>Sửa thông tin cá nhân</label>
        </div>
        <div style="background-color: rgb(255, 214, 158);border-radius: 0px 0px 25px 25px;font-weight:bold;">
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <table border="0" cellpadding="5" width="70%" align="center" style="text-align:center;" >
                  <tr>
                      <td>Họ và tên: </td>
                      <td><input class="form-control" type="text" name="fullname" placeholder="<?php echo $row_hienthi['fullname'];?>" /></td>
                  </tr>
                  <tr >
                      <td>Giới tính: </td>
                      <td style="text-align:left;">Nam <input   type="radio" name="sex" value="1" <?php if($row_hienthi['sex'] == 1) echo "checked";?>/> Nữ <input type="radio" name="sex" value="0" <?php if($row_hienthi['sex'] == 0) echo "checked";?>/></td>
                  </tr>
                  <tr>
                      <td>Ngày sinh: </td>
                      <td><input  class="form-control"  type="date" name="birthday" value="<?php echo $row_hienthi['birthday'];?>"/></td>
                  </tr>
                  <tr>
                      <td>Số điện thoại: </td>
                      <td><input class="form-control" type="text" name="phone" placeholder="<?php echo $row_hienthi['phone'];?>"/></td>
                  </tr>
                  <tr>
                      <td>Địa chỉ: </td>
                      <td><input class="form-control"  type="text" name="address" placeholder="<?php echo $row_hienthi['address'];?>"/></td>
                  </tr>
                  <tr>
                      <td colspan="2" style="text-align:center;"><input class="btn btn-info col-4" type="submit" value="Xác nhận đổi"/></td>
                  </tr>
              </table>

                      <p align="center"> <?php if(isset($_SESSION['status'])) echo $_SESSION['status'];?></p>
          </form>
        </div>
      </div>
    </div>
