<?php
    $title = 'USER LOGIN';

    require_once 'includes/header.php';
    require_once 'db/conn.php';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = sha1($password.$username);

        $result = $users->getUser($username,$new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $result['id'];
            header("Location: viewrecords.php");
        }

    }
?>

<h1 style="font-family: cursive;" class="text-center"><?php echo $title ?> </h1>
<br/>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-sm">
            <tr>
                <td><label for="username" style="font-size:19px;font-family:monospace;">USERNAME: </label></td>
                <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
                </td>
            </tr>
            <tr>
                <td><label for="password" style="font-size:19px;font-family:monospace;">PASSWORD: </label></td>
                <td><input type="password" name="password" class="form-control" id="password">
                </td>
            </tr>
        </table>
        <div class="body">
        <input type="submit" value="Login" class="btn btn-primary" style="font-size: 22px;">
      </div>
      <div style="margin-bottom:130px">
        <a style="font-size:22px;font-family:monospace;" href="#"> Forgot Password </a>
      </div>
<style>
.body{
  text-align: center;
  margin: 20px 0px 40px 0px;
  font-family: cursive;
}
</style>

    </form>
    <div style="padding:16px 0px;"></div>

<?php
include_once 'includes/footer.php'
?>
