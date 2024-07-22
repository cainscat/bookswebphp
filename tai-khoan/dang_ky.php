<?php

    if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['repassword'])&&isset($_POST['fullname'])&&isset($_POST['birthday'])&&isset($_POST['phone'])&&isset($_POST['address']))
    {
        $data = array(
            'username'=>$_POST['username'],
            'password'=>$_POST['password'],
            'repassword'=>$_POST['repassword'],
            'fullname'=>$_POST['fullname'],
            'sex'=>$_POST['sex'],
            'birthday'=>$_POST['birthday'],
            'phone'=>$_POST['phone'],
            'address'=>$_POST['address']
        );
        if(empty($data['username'])||empty($data['password'])||empty($data['repassword'])||empty($data['fullname'])||empty($data['birthday'])||empty($data['phone'])||empty($data['address']))
        {
            echo "<font color='red'>* </font>Chưa nhập đủ thông tin";
        }
        else
        {
            if($data['password']!=$data['repassword'])
            {
                echo "<font color='red'>* </font>2 mật khẩu không khớp nhau";

            }
            else
            {
                $partern1 = "/^[a-zA-Z0-9]{6,20}$/";
                $partern2 = "/^[0-9]{10,11}$/";
                if(!preg_match($partern1,$data['username'])||!preg_match($partern1,$data['password'])||!preg_match($partern1,$data['repassword']))
                {
                    echo "<font color='red'>* </font>Tài khoản và mật khẩu không có ký tự đặt biệt và độ dài từ 6 đến 20 ký tự";
                }
                else if(!preg_match($partern2,$data['phone']))
                {
                    echo "<font color='red'>* </font>Số điện thoại chỉ chứa ký tự số và độ dài 10 hoặc 11 ký tự";
                }
                else
                {

                    $sql1 = "select * from account where username='".$data['username']."'";
                    $result = mysqli_query($con,$sql1) or die("Không đăng ký thành công!");
                    $num = @mysqli_num_rows($result);
                    if($num > 0)
                        echo "<font color='red'>* </font>Tài khoản đã tồn tại!";
                    else
                    {
                        $data['password'] = md5($_POST['password']);
                        $sql2 = "INSERT INTO `account`(`username`, `password`, `fullname`, `sex`, `birthday`, `phone`, `address`) VALUES ('".$data['username']."','".$data['password']."','".$data['fullname']."','".$data['sex']."','".$data['birthday']."','".$data['phone']."','".$data['address']."')";
                        $result = mysqli_query($con,$sql2) or die("Không đăng ký thành công!");
                        $_SESSION['menu']='dangnhap';
                        $_SESSION['thanhcong'] = "dangky";
                        echo "<script>location.href='index.php'</script>";

                    }
                }
            }
        }

    }
?>
<div>
    <div class="div-panel">
        <label>ĐĂNG KÝ TÀI KHOẢN MỚI</label>
    </div>
    <div class="div-body-panel" style="padding-top:70px;height: 900px;">
      <div style="width:70%;margin:auto;border-radius: 30px;">
        <div class="div-panel" style="background-color: orange;border-radius: 25px 25px 0px 0px;color:black;font-weight:bold;font-size:20px;">
            <label>ĐĂNG KÝ TÀI KHOẢN</label>
        </div>
        <div style="background-color: rgb(255, 214, 158);border-radius: 0px 0px 25px 25px;font-weight:bold;">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <table border="0" cellpadding="5" align="center">
                  <tr>
                      <td class="td-width">
                          Tên tài khoản:
                      </td>
                      <td>
                          <input class="form-control" id="1" type="text" name="username"/>
                      </td>
                  </tr>
                    <tr>
                      <td class="td-width">
                          Mật khẩu:
                      </td>
                      <td>
                          <input class="form-control" id="2" type="password" name="password"/>
                      </td>
                  </tr>
                   <tr>
                      <td class="td-width">
                          Nhập lại mật khẩu:
                      </td>
                      <td>
                          <input class="form-control" id="3" type="password" name="repassword"/>
                      </td>
                  </tr>
                   <tr>
                      <td class="td-width">
                          Họ và tên:
                      </td>
                      <td>
                          <input class="form-control" id="4" type="text" name="fullname"/>
                      </td>
                  </tr>
                  <tr>
                      <td class="td-width">
                          Giới tính:
                      </td>
                      <td>
                          Nam <input  type="radio" name="sex" value="1" checked/>
                          Nữ <input  type="radio" name="sex" value="0"/>
                      </td>
                  </tr>
                   <tr>
                      <td class="td-width">
                          Ngày sinh:
                      </td>
                      <td>
                          <input class="form-control" id="5" type="date" name="birthday"/>
                      </td>
                  </tr>
                  <tr>
                      <td class="td-width">
                          SĐT:
                      </td>
                      <td>
                          <input class="form-control" id="6" type="text" name="phone"/>
                      </td>
                  </tr>
                    <tr>
                      <td class="td-width">
                          Địa chỉ:
                      </td>
                      <td>
                          <input class="form-control" id="7" type="text" name="address"/>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2" style="text-align: center;">
                          <input class="btn btn-info col-4" type="submit" value="Xác nhận"/>
                          <input class="btn btn-info col-4"type="reset" value="Nhập lại" style="margin-right: 10px;" onclick="clearText()"/>
                      </td>
                  </tr>
              </table>
            </form>
        </div>
      </div>
    </div>
</div>
<script>
    function clearText()
    {
            document.getElementById('1').value='';
            document.getElementById('2').value='';
            document.getElementById('3').value='';
            document.getElementById('4').value='';
            document.getElementById('5').value='';
            document.getElementById('6').value='';
            document.getElementById('7').value='';
    }
</script>
