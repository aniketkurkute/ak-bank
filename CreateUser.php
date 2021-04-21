<?php
    session_start();
    require_once ".//util/header-footer.php";
    require_once ".//util/pdo.php";

    if(isset($_GET["add"])) {
        if ($_GET["add"]==1) {
            $stmt = $pdo->prepare('INSERT INTO `user`( `first_name`, `last_name`, `email`, `balance`) VALUES (:first_name, :last_name, :email, :balance)');
            $stmt->execute(array( ':first_name'=> $_GET['First_Name'], ':last_name'=> $_GET['Last_Name'], ':email'=> $_GET['email'], ':balance'=> $_GET['bal']));
            
            $_SESSION['success'] = "USER ADDED SUCESSFULLY";
            header("Location: CreateUser.php");
            return;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php
    head('Create User');
?>

<body style="background-color: #00EEEE;">
<?php
    navbar(2);
    flashMessage();
?>
<div class="w3-row">
    <div class="w3-display-container" style="height:550px;" width="100"> 
        <div class="w3-twothird w3-display-middle">
    
            <div class="w3-card-4">
                <div class="w3-container w3-blue">
                <h2>ADD NEW USER</h2>
            </div>

            <form id="add_new_user_form" class="w3-container sk-theme-navlink" method="GET">
                <p>
		<label>First Name</label></p>
                <input name="First_Name" class="w3-input w3-border w3-round-xlarge" type="text" required>
                <p> 
		<label>Last Name</label></p>    
                <input name="Last_Name" class="w3-input w3-border w3-round-xlarge" type="text" required>
                <p>
		<label>Email</label></p>
                <input name="email" class="w3-input w3-border w3-round-xlarge" type="email" required>
                <p> 
    		<label>Balance</label></p>
                <input name="bal" class="w3-input w3-border w3-round-xlarge" type="number" required>
                <div class="w3-row w3-margin">
                    <button class="w3-button w3-block w3-border w3-round-xxlarge w3-green w3-half" type="submit" name="add" value="1" >ADD NEW USER</button>
                    <input class="w3-button w3-block w3-border w3-round-xxlarge w3-red w3-half" type="reset" value="Reset"></input>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    foot();
?>
</body>

</html>