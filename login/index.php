<?php
$error = false;
header('AMP-Access-Control-Allow-Source-Origin: *');


if(isset($_POST['username'])) {

        // validate credentials
        if(($_POST['username'] == 'test') && ($_POST['password'] == 'test') ) {

                //login successful, set cookie
                setcookie('auth', true, time()+3600,  "/");
				
                // close login window
                ?>
                <script type="text/javascript">
                        window.onload = function(e) {
                                window.close();
                        }
                </script>
                <?php
                exit();
        }
		
		if(($_POST['username'] == 'admin') && ($_POST['password'] == 'test') ) {

                //login successful, set cookie
                setcookie('auth', true, time()+3600,  "/");
				setcookie('admin', true, time()+3600,  "/");
                // close login window
                ?>
                <script type="text/javascript">
                        window.onload = function(e) {
                                window.close();
                        }
                </script>
                <?php
                exit();
        }
		
        $error = true;
}

// close login window
if(!isset($_REQUEST['rid'])) {
?>
        <script type="text/javascript">
                window.close();
        </script>
<?php
}

// display login error
echo ($error ? "<h2>Invalid Credentials</h2>" : "");
?>

<h3>Login Form</h3>

<form method="post" action="/login/index.php">

        <label for="username">Username</label><br>
        <input type="text" value="test" name="username"><hr>

        <label for="password">Password</label><br>
        <input type="password" value="test" name="password"><hr>

        <input type="hidden" value="<?= $_REQUEST['url']; ?>" name="redirect">
        <input type="hidden" value="<?= $_REQUEST['rid']; ?>" name="ampid">
		
        <input type="submit" value="Login" />

</form>
