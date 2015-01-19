<?php

class login extends model {

    function __construct() {
        parent::__construct();
    }

    function check($user, $pass) {
       $pass=md5($pass);
       
        $query = $this->db->prepare("select * from users where user='$user' and pass='$pass'");
        $query->execute();
        $res = $query->fetchAll();
        if (!empty($res)) {
        
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getDetails($user) {
        $query = $this->db->prepare("select * from users where user='$user'");
        $query->execute();
        $res = $query->fetchAll();
        return $res[0];
    }

    function register($user, $pass, $email) {
        $rank = "user";
        $query = $this->db->prepare("insert into users values('','$user',md5('$pass'),'$rank','$email',0)");
        $query->execute();
    }

}

$user = @$_POST['user'];
$pass = @$_POST['pass'];
$email = @$_POST['email'];
 $session = new session();
$make = new login();

if (isset($user) && isset($pass)) {
   // print_r ($make->getDetails($user));
    if (isset($email)) {

        $make->register($user, $pass, $email);
        
        ?>
<div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Successfully Registered</strong>
          </div>

<?php
        
    } else if ($make->check($user, $pass)) {
        
       
        $session->createSession();
        $session->setSession("user", $user);
       // echo $session->getSession("user");
        $cand = $make->getDetails($user);
        $session->setSession("id", $cand['id']);
        header('Location:index');
        ?>

<div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Reload the page!</strong>
          </div>
<?php
    } else {
        
        ?>
<div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Oops Wrong password</strong>
          </div>

<?php
       
    }
    
}

?>
<div class="row-fluid span12">
<div id="login" class="span4" style="background:#eee;padding:10px;">
    <h3 align="center">Login</h3><hr>
    <form action="" method="post">
        Username: <input type="text" name="user" required><br>
            Password: <input type="password" name="pass" required><br><br>
            <input type="submit" style="width:85%;margin-left: 20px" class="btn btn-success btn-large" value="Login">
            </form>
            </div>
    <div class="divider-vertical"></div>
            <div class="span4" style="background:#eee;padding:10px;">
                <h3 align="center">Register</h3><hr>
                <form action="<?php echo $name ?>" method="post">
                    Username: <input type="text" name="user" required><br>
                    Password: &nbsp;<input type="password" name="pass" required><br>
                    Email id : &nbsp;&nbsp;<input type="email" name="email" required><br><br>

                 <input type="submit" style="width:85%;margin-left: 20px" class="btn btn-danger btn-large" value="Register">
                </form>
            </div>
</div>

<?php

?>
