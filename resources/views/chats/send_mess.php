<?php
   session_start();
 
   include ('../bd/connexionDB.php');
 
   $DB = new connexionDB();
 
   if(isset($_SESSION['id'])){ 
 
      $mess = htmlspecialchars(trim($_GET['message']));
 
      if(isset($mess) && !empty($mess)){
 
         $verif_user = $DB->query("SELECT id FROM user WHERE id = ?",
            array($_SESSION['id']));
 
         $verif_user = $verif_user->fetch();
 
         if(isset($verif_user['id'])){
 
            $date_message = date('Y-m-d H:i:s');
 
            $DB->insert("INSERT INTO tchat (id_pseudo, message, date_message) VALUES (?, ?, ?)",
               array($_SESSION['id'], $mess, $date_message));
 
            $lastID = $DB->query("SELECT id FROM tchat WHERE id_pseudo = ? ORDER BY date_message DESC LIMIT 1", 
               array($_SESSION['id']));
 
            $lastID = $lastID->fetch();
 
            $date_message = date_create($date_message);
            $date_message = date_format($date_message, 'd M Y à H:i:s');
 
            ?><div style="float: right;width: auto; max-width: 80%; margin-right: 26px;position: relative;padding: 7px 20px;color: #fff;background: #0B93F6;border-radius: 5px;margin-bottom: 15px; clear: both"><span id="<?= $lastID['id'] ?>"><?= nl2br($mess) ?></span>               
                  <div style="font-size: 10px; text-align: right; margin-top: 10px">Par <?= $_SESSION['pseudo'] ?>, le <?= $date_message ?></div></div>
 
               <script>document.getElementById('msg').scrollTop = document.getElementById('msg').scrollHeight;
               </script><?php
 
         }
      }      
   }
?>