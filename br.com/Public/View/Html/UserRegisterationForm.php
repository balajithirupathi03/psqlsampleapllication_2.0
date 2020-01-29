<html>
<head>
<script src = "../Public/View/JavaScript/UserRegisterationForm.js"></script>
</head>
<h1>User Registration Form</h1>
<body>
    <form method = "post">
    <table>
    <tr><td>Name</td><td> : <input type = "text" name = "name" pattern = "^[A-Za-z]*\s*[A-Za-z]*$" placeholder = "Enter your Name" required></td></tr>
    <tr><td>Gender</td><td><input type="radio" name="gender" value="m" checked> Male
    <input type="radio" name="gender" value="f"> Female
    <input type="radio" name="gender" value="other"> Other  </td></tr>
    <tr><td>Mail Id </td><td> : <input type = "email" name = "mailid" placeholder = "Enter your Mail" required> </td></tr>
    <tr><td>Contect Number</td><td> : <input type = "text" name = "contactnumber" pattern = "[6-9][0-9]{9}"  placeholder = "+91" required></td></tr>
    <tr><td>Account Type</td><td> : <input type="radio" name="AccountType" value="b" checked> Buyer
    <input type="radio" name="AccountType" value="s"> Seller </td></tr>
    <tr><td>Country</td><td> : <input type="radio" name="country" value="india"> India 
    <input type="radio" name="country" value="usa"> USA 
    <input type="radio" name="country" value="japan"> Japan 
    <input type="radio" name="country" value="uk"> UK 
    <input type="radio" name="country" value="malaysia"> Malaysia  </td></tr>
    <tr><td>Password </td><td> : <input type = "password" name = "passsword" required ></td></tr>
    <tr><td><input type='submit' name='CreateAccount'></td><td></td></tr>
</table>
    </form>
</body>
</html>
