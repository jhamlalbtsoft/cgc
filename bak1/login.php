<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
require PATH_LIB . "page-top.php"; 
if ($_ADMIN){
  header('Location: index');
  die();
}
?>
<script>
function login() {
  adm.ajax({
    // Change this to absolute URL if you are getting file not found errors
    // E.g. http://mysite.com/ajax-session.php
    url : "ajax-session.php",
    data : {
      req : "in",
      username : document.getElementById("user_name").value,
      password : document.getElementById("user_password").value
    },
    ok : function(){
      location.href = "index.php";
    },
    error : function(){
      alert("Invalid user/password");
    }
  });
  return false;
}
</script>
<style>
#login-form{
  max-width: 340px;
  margin: 0 auto;
  padding: 10px 20px 20px 20px;
  background: #eee;
}
#login-form input{
  width: 100%;
}
</style>
<h1 id="logo1" style="width:310px; text-align:center; "><a href="#"><img src="../wp-content/uploads/2013/01/logo.png" alt="CCCI" title="CCCI"></a></h1>

<form id="login-form" onsubmit="return login();">
  <h2 style="text-align:center;">SIGN IN</h2>
  <label for="user_name">Username:</label>
  <input type="user_name" id="user_name" required value=""/>
  <label for="user_password">Password:</label>
  <input type="password" id="user_password" required value=""/>
  <input type="submit" value="login"/>
</form>
<?php require PATH_LIB . "page-bottom.php"; ?>