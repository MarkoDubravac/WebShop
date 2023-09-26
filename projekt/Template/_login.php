<?php
if (isset($_POST['k_ime']) && isset($_POST['lozinka'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user_name = validate($_POST['k_ime']);
    $password = validate($_POST['lozinka']);

    if (empty($user_name)) {
        header("Location: login.php?error=Niste unjeli korisničko ime");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Niste unjeli lozinku");
        exit();
    } else {
        // Retrieve the hashed password from the database
        $sql = "SELECT * FROM user WHERE user_name='$user_name'";
        $result = $db->con->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_pass = $row['password'];

            // Verify the entered password with the stored hashed password
            if (password_verify($password, $hashed_pass)) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=Neispravna lozinka");
                exit();
            }
        } else {
            header("Location: login.php?error=Neispravno korisničko ime");
            exit();
        }
    }
}
?>
<div class="text-center">
<div class="rounded w-50 p-3 bg-light mx-auto">
<form action="login.php" method="post">
    <h2>Login Form</h2>
    <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">User Name</label>
        <div class="col-sm-10">
    <input class="form-control" type="text" name="k_ime" placeholder="User Name">
        </div>
    </div>
    <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
    <input class="form-control" type="password" name="lozinka" placeholder="Password">
        </div>
    </div>
    <button type="submit" class="btn bg-dark text-light font-size-12 py-2">Login</button>
</form>
<div>
    <a href="register.php" class="text-decoration-none">Don't have an account? Register here!</a>
</div>
</div>
</div>


