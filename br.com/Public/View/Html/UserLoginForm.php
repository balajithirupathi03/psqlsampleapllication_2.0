<!DOCTYPE html>
<html>
<head>
<script src="../../Public/View/JavaScript/login.js"></script>
</head>
<body>
    <div class = "container">
        <form method="POST" name='LoginForm' onsubmit="login(event);return false;">
            <table>
                <tr>
                    <td colspan = 2><h1>User Login</h1></td>
                </tr>
                <tr>
                    <td class = 'lable'>Mail Id</td>
                    <td> : <input  type = "email" name = "loginMailId" placeholder = "Enter your mail id" pattern = "[^()\[\]\\.,;&:\s@\-0-9]+[a-zA-Z0-9._\-]+@[a-zA-Z.\-]+\.[a-zA-Z]{2,4}" required><td>
                </tr>
                <tr>
                    <td class = 'lable'>Passsword</td>
                    <td> : <input type = "password" name = "loginPassword"
                        placeholder = "Ex:Password@123" name = "password" autocomplete  = "off" required></td>
                </tr>
                <tr class = 'message'>
                    <td colspan = 2 ><?php echo $message; ?></td>
                </tr>
                <tr>
                    <td colspan = 2 ><input type = "submit" id = 'submit' name = "userLoginSubmition" value = "Login"></td>
                </tr>
                <tr>
                    <td colspan = 2 >New user? Signup <b><a class = 'link' onclick = "location.href = 'index.php/User/createAccount'" >here. </a></b></td>
                </tr>
        </table>
    </form>
    </div>
</body>
</html>




