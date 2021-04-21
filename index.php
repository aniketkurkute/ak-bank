<?php
    require_once ".//util/header-footer.php";
    require_once ".//util/pdo.php";

?>
<!DOCTYPE html>
<html lang="en">

<?php
    head('AK BANK');
?>

<body style="background-color: #00EEEE;" >
<?php
    navbar(1);
?>
<img src="akbank.jpg" style="width:1600px;height:350px;>
<div class="w3-row">
   <div class="w3-twothird w3-card-4 ">
        <header class="w3-container w3-blue">
            <h1>Recent Transactions</h1>
        </header>
        <table class="w3-table-all w3-small sk-table" style="max-height:500px;">
                <tr class="w3-yellow">
                    <th>Sender</th>
                    <th>Reciver</th>
                    <th>Amount</th>
                </tr>
                <?php
                    $stmt = $pdo->prepare('SELECT * FROM `user`');
                    $stmt->execute();
                    $user = $stmt->fetchall();
                    $user_data=[];
                    foreach ($user as $r){
                        $user_data[$r['id']]=array("fname"=>$r['first_name'],"lname"=>$r['last_name']);
                    }
                    $stmt = $pdo->prepare('SELECT * FROM `transactions` Order by `timestamp` DESC Limit 5');
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
                        echo('<td>'.$user_data[$r['sender_user_id']]['fname'].' '.$user_data[$r['sender_user_id']]['lname'].'</td>
                            <td>'.$user_data[$r['reciver_user_id']]['fname'].' '.$user_data[$r['reciver_user_id']]['lname'].'</td>
                            <td>'.$r['amount'].'</td>
                        </tr>');
                    }

                ?>
            </table>
    </div>
    <div class="w3-third w3-card-4 " >
    <header class="w3-container w3-blue">
            <h1>Recently Added Users</h1>
        </header>
        <div class="w3-container w3-center sk-theme-navlink" style="height: 210px;">
            <?php
                $stmt = $pdo->prepare('SELECT `first_name`,`last_name`,`balance` FROM `user` order by id DESC LIMIT 5');
                $stmt->execute();
                $user = $stmt->fetchall();
                foreach($user as $r) {
                    echo('<p><b>'.$r['first_name'].' '.$r['last_name'].' ('.$r['balance'].')</b></p>');
                }
            ?>
        </div>
   </div>
</div>
</body>
<?php
    foot();
?>
</html>