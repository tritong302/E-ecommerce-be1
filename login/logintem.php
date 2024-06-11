<?php
session_start();
// session_destroy();

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_SESSION['usernamedangky'])) {
    // echo  "<script>alert('Successful account registration! '); </script>";
}

require_once("../config/Database.php");
require_once("../models/model.php");
require_once("../models/userModel.php");



//dang nhap

$error_message = "";

if (!empty($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $User = new User;
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kiểm tra nếu các trường trống
        if (empty($username) || empty($password)) {
            $error_message = "Vui lòng nhập tên tài khoản và mật khẩu.";
        } else {
            $checkLogin = $User->checkLogin($username, $password);
            if ($checkLogin) {
                $_SESSION['role_idd']  = $checkLogin[0]['role_id'];
                $_SESSION['username'] = $username;
                if ($checkLogin[0]['role_id'] == 1) {
                    $_SESSION['user']['username'] = $_POST['username'];
                    $_SESSION['user']['user_id'] = $User->getIdByUsername($username);

                    header("location: index.php");
                } else {
                    $_SESSION['user']['username'] = $_POST['username'];
                    $_SESSION['user']['user_id'] = $User->getIdByUsername($username);

                    header("location: ../index.php");
                }
            } else {
                $error_message = "Tên tài khoản hoặc mật khẩu không chính xác";
            }
        }
    }
}
//dang ky
$User = new User;
$getAllUser = $User->getAllUser();
if (!empty($_POST['register'])) {
	if (isset($_POST['usernamedangky']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['address'])) {
		$username = $_POST['usernamedangky'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirmpassword'];
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$address = $_POST['address'];
	}
	foreach ($getAllUser as $value) {

		if ($value['usernamedangky'] == $username || $password != $confirm_password) {
			echo "<script>alert('This account $username already exists or the password is incorrect!');</script>";
			exit;
		} else {
			$i = 1;
			$insertUser = $User->insertUser($username, $password, $email, $telephone, $address);
			header("location: logintem.php");
			exit;
		}

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!-- Thêm dòng này -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <style>
     .error {
    color: red;
}

.valid {
    border: 2px solid blue;
    border-radius: 5px;
}
.invalid {
    border: 2px solid red;
}

    </style>
</head>

<body>
    <h2>Đăng Nhập</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="logintem.php" method="post" onsubmit="return validateFormRegister()">
                <h1>Tạo Tài Khoản</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Hoặc sử dụng email của bạn để đăng ký</span>
                <input id="usernamedangky" type="text" name="usernamedangky" class="form-control" placeholder="Username" />
                <input type="text" name="email" class="form-control" placeholder="Email">
                <input type="text" name="telephone" class="form-control" placeholder="Phone">
                <input type="text" name="address" class="form-control" placeholder="Address">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <input type="password" name="confirmpassword" id="conf-pass" class="form-control" placeholder="Confirm Password">
                <button type="submit" name="register" value="Register">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
        <!--  -->
        <form method="post" onsubmit="return validateForm()">
    <h1>Đăng nhập</h1>
    <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <span>Hoặc sử dụng tài khoản của bạn</span>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" />
    <span id="usernameError" class="error"></span>
    <input type="password" name="password" id="pass" class="form-control" placeholder="Password" autocomplete="off">
    <span id="passwordError" class="error"><?php echo $error_message; ?></span>
    <a href="#">Quên Mật khẩu?</a>
    <button type="submit" name="submit" value="Login">Đăng nhập</button>
</form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng bạn trở lại!</h1>
                    <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn!</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button class="ghost" id="signUp" >Đăng Ký</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p>
    </footer> -->
    <!-- script(src="main.js") -->
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
        function validateForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('pass').value;

        // Kiểm tra nếu không nhập username
        if (username.trim() === "") {
            document.getElementById('usernameError').innerText = 'Vui lòng nhập tên đăng nhập';
            return false;
        } else {
            document.getElementById('usernameError').innerText = '';
        }

        // Kiểm tra nếu không nhập password
        if (password.trim() === "") {
            document.getElementById('passwordError').innerText = 'Vui lòng nhập mật khẩu';
            return false;
        } else {
            document.getElementById('passwordError').innerText = '';
        }

        return true;

    }


    </script>
</body>

</html>
