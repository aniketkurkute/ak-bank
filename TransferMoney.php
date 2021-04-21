<?php
    session_start();
    require_once ".//util/header-footer.php";
    require_once ".//util/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
    head('Create User');
?>

<body style="background-color: #00EEEE;">
<?php
    navbar(3);
    flashMessage();
?><br>
<div class="w3-row">
    <div class="w3-container" > 
    <div class="w3-content" style="max-width:1000px">
            <table class="w3-table-all w3-small sk-table" style="max-height:500px;">
                <tr class="w3-yellow">
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-Mail</th>
                    <th>Balance</th>
                    <th>Operation</th>
                </tr>
                <?php
                    $stmt = $pdo->prepare('SELECT * FROM `user`');
                    $stmt->execute();
                    $user = $stmt->fetchall();
                    $count=0;
                    foreach ($user as $r){
                        if ($count%2==0){
                            echo('<tr class="w3-light-blue">');
                        } else{
                            echo('<tr class="w3-blue">');
                        }
                        $count=$count+1;
                        echo('<td>'.$r['id'].'</td>
                            <td>'.$r['first_name'].'</td>
                            <td>'.$r['last_name'].'</td>
                            <td>'.$r['email'].'</td>
                            <td>'.$r['balance'].'</td> 
                            <td><a href="selecteduserdetail.php?id='.$r['id'].'"> <button type="button" class="btn" style="background-color : #00ff00;">Transfer</button></a></td>
                        </tr>');
                    }

                ?>
            </table>
            </div>
    </div>
</div><br>
<?php
    foot();
?>
</body>

</html>