<?php
    if(isset($_SESSION['thanhcong']))
                if($_SESSION['thanhcong'] == 'dangky')
                {
                    echo "<font color='red'>* </font>Bạn đã đăng ký thành công! <br>";;
                    unset($_SESSION['thanhcong']);
                }
    if(isset($_POST['username'])&&isset($_POST['password']))
    {
        $data = array(
            'username'=>$_POST['username'],
            'password'=>$_POST['password']
        );
        if(empty($data['username'])||empty($data['password']))
        {
             echo "<font color='red'>* </font>Bạn chưa nhập đủ thông tin! <br>";;
        }
        else
        {
            $pattern = "/^[a-zA-Z0-9]{5,20}$/";
            if(!preg_match($pattern, $data['username']) || !preg_match($pattern,$data['password']))
            {
                echo "<font color='red'>* </font>Tài khoản và mật khẩu không có ký tự đặt biệt và độ dài từ 6 đến 20 ký tự";
            }
            else
            {
                //$data['password'] = md5($data['password']);
                 $sql1 = "select * from account where username='".$data['username']."' and password='".$data['password']."'";
                $result = mysqli_query($con,$sql1) or die ("Không thực hiện được truy vấn dữ liệu");
                $row = @mysqli_fetch_array($result);
                $num = @mysqli_num_rows($result);
                if($num < 1)
                {
                    $sql_login = "select * from account where username='".$data['username']."'";
                    $result_login = mysqli_query($con,$sql_login);
                    $row = @mysqli_fetch_array($result_login);
                    if($row['login_count'] == 3)
                    {
                        $login_count = 0;
                        $sql_login = "update account set login_count='".$login_count."',login_time='".$date_current."' where username = '".$data['username']."'";
                        $result_login = mysqli_query($con,$sql_login);
                        echo "<font color='red'>* </font>Bạn đã đăng nhập sai quá nhiều lần! Xin vui lòng đợi 10 phút rồi đăng nhập tiếp! <br>";
                    }
                    else
                    {
                      if($row['login_time'] == '')
                      {
                        $login_count = $row['login_count'] + 1;
                        $sql_login = "update account set login_count='".$login_count."' where username = '".$data['username']."'";
                        $result_login = mysqli_query($con,$sql_login);
                      }
                      echo "<font color='red'>* </font>Sai tài khoản hoặc mật khẩu! <br>";
                    }

                }
                else
                {
                    if($row['status'] == 1)
                    {
                        if($row['login_time'] != '')
                        {
                          $time = strtotime($date_current)-strtotime($row['login_time']);
                          $sophut = ceil($time/60)-1;
                          $sogiay = $time%60;
                          if($time > $login_time_block) // ở file config.php
                          {
                            $sql_login = "update account set login_time=NULL where username = '".$data['username']."'";
                            $result_login = mysqli_query($con,$sql_login);
                              $_SESSION['user_id'] = $row['user_id'];
                              $_SESSION['role'] = $row['role'];
                              $_SESSION['username'] = $row['username'];
                              $_SESSION['password'] = $row['password'];
                              $_SESSION['fullname'] = $row['fullname'];
                              $_SESSION['sex'] = $row['sex'];
                              $_SESSION['birthday'] = $row['birthday'];
                              $_SESSION['phone'] = $row['phone'];
                              $_SESSION['address'] = $row['address'];
                              $_SESSION['menu'] = 'trangchu';
                              echo "<script>location.href='index.php'</script>";
                          }
                          else
                          {
                            echo "<font color='red'>* </font>Chưa đủ thời gian 10 phút! xin phút lòng quay lại! Hiện tại là ".$sophut." phút ".$sogiay."  giây <br>";
                          }
                        }
                        else
                        {
                            $_SESSION['user_id'] = $row['user_id'];
                            $_SESSION['role'] = $row['role'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['password'] = $row['password'];
                            $_SESSION['fullname'] = $row['fullname'];
                            $_SESSION['sex'] = $row['sex'];
                            $_SESSION['birthday'] = $row['birthday'];
                            $_SESSION['phone'] = $row['phone'];
                            $_SESSION['address'] = $row['address'];
                            $_SESSION['menu'] = 'trangchu';
                            echo "<script>location.href='index.php'</script>";
                        }
                    }
                    else if ($row['status'] == 0)
                    {
                        echo "<font color='red'>* </font>Tài khoản của bạn đã bị khóa! <br>";
                    }
                }
            }

        }
    }
?>
<div>
    <div class="div-panel">
        <label>VUI LÒNG ĐĂNG NHẬP</label>
    </div>
    <div class="div-body-panel" style="padding-top:70px;height: 900px;">
      <div style="width:70%;margin:auto;border-radius: 30px;">
        <div class="div-panel" style="background-color: orange;border-radius: 25px 25px 0px 0px;color:black;font-weight:bold;font-size:20px;">
            <label>ĐĂNG NHẬP TÀI KHOẢN</label>
        </div>
        <div style="background-color: rgb(255, 214, 158);border-radius: 0px 0px 25px 25px;font-weight:bold;">
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <table border="0" cellpadding="5" width="70%" align="center" style="text-align:center;">
                  <tr>
                      <td class="td-width">
                           Tài khoản:
                      </td>
                      <td>
                          <input class="form-control col-8" type="text" name="username"/>
                      </td>
                  </tr>
                  <tr>
                      <td  class="td-width">
                          Mật khẩu:
                      </td>
                      <td>
                          <input  class="form-control col-8" type="password" name="password"/>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2" style="text-align:center">
                          <input class="btn btn-info col-4" type="submit" value="Đăng nhập"/>
                      </td>
                  </tr>
              </table>
          </form>
        </div>
      </div>
    </div>
</div>
