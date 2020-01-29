function login() {
    document.getElementById("submit").addEventListener("click", function(event) {
        event.preventDefault();
        var xhttp = new XMLHttpRequest();
        const formDatas = new URLSearchParams(new FormData(LoginForm)).toString();
        xhttp.open("POST", "/index.php/user/Api/checkUserLoginAPI", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(formDatas);
        xhttp.onreadystatechange = function() {
            if (this.status == 200) {
                window.location = "../../index.php/user/viewHomePage";
            } else {
                alert('The entered Data\'s not found');
            }
        }
    });
};