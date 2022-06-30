<?php
require("cnt.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>


<body style="background-color:black;">
    <?php

    $Sorgu = $db->prepare("SELECT * FROM chatbot ORDER BY id DESC LIMIT 30");
    $Sorgu->execute();
    $SorguSayisi = $Sorgu->rowCount();
    $SorguKayitlari = $Sorgu->fetchAll();

    ?>

    <div class="container">
        <h3 style="color:white;" class="text-center">Chat room</h3>
        <h4 style="color:red;" class="text-center">Your Ip Is Your Username</h4><br />
        <h5 style="color:red;" class="text-center">Everything you send is being recorded</h5>

        <hr>
        <div class="msg_history">
            <?php foreach ($SorguKayitlari as $messages) { ?>
                <div class="incoming_msg">
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p> <?php echo $messages['message']; ?></p>
                            <span class="time_date"><?php echo $messages['date']; ?></span>
                            <span class="time_date"> <?php echo "from " . $_SERVER['REMOTE_ADDR']; ?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>


        <div class="messaging">
            <form action="bot.php" method="POST">
                <div class="inbox_msg">
                            <textarea type="text" class="inset" name="message" placeholder="Type a message" ></textarea>
                            <button type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>