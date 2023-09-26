<?php

if (isset($_POST['ime']) && isset($_POST['k_ime']) && isset($_POST['lozinka']) && isset($_POST['lozinka2'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['ime']);
    $uname = validate($_POST['k_ime']);
    $pass = validate($_POST['lozinka']);
    $pass2 = validate($_POST['lozinka2']);

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    if (empty($name)) {
        header("Location: registracija.php?error=Niste unjeli vaše ime");
        exit();
    }else if (empty($uname)) {
        header("Location: registracija.php?error=Niste unjeli korisničko ime");
        exit();
    }else if(empty($pass)){
        header("Location: registracija.php?error=Niste unjeli lozinku");
        exit();
    }else if($pass != $pass2){
        header("Location: registracija.php?error=Niste unjeli jednake lozinke");
        exit();
    }else{

        $sql = "INSERT INTO user (name, user_name, password) VALUES ('$name', '$uname', '$hashed_pass')";

        if ($db->con->query($sql) === TRUE) {
            echo "Dodani ste u bazu";
        }else{
            header("Location: registracija.php?error=Nešto je krenulo po zlu");
            exit();
        }
    }

}
?>
<div class="text-center">
    <div class="rounded w-50 p-3 bg-light mx-auto">
<form action="register.php" method="post">
    <h2>Register Form</h2>
    <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Your Name</label>
        <div class="col-sm-10">
    <input class="form-control" type="text" name="ime" placeholder="Your Name">
        </div>
    </div>
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
    <div class="form-group row py-2">
    <label class="col-sm-2 col-form-label">Reenter Password</label>
        <div class="col-sm-10">
    <input class="form-control" type="password" name="lozinka2" placeholder="Password one more time">
        </div>
    </div>
    <button type="submit" class="btn bg-dark text-light  font-size-12 py-2">Register</button>
</form>
<div>
    <a href="login.php" class="text-decoration-none">Already have an account? Log in here!</a>
</div>
    </div>
</div>



