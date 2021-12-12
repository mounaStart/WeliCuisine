<?php
   session_start();
 
   include('bd/connexionDB.php');
 
   $see_tchat = $DB->query("SELECT t.*, u.pseudo 
      FROM tchat t
      LEFT JOIN user u ON u.id = t.id_pseudo
      ORDER BY date_message
      LIMIT 100");
 
   $see_tchat = $see_tchat->fetchAll();
?>