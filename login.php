<?php
  require_once("connection.php");

  # Parametri in input
  # Condizione ? Risultato se true : Risultato se false
  $email = isset($_POST["email"]) ? $_POST["email"] : null;
  $password = isset($_POST["password"]) ? $_POST["password"] : null;
  
      $password = md5($password);

      $query = "SELECT * FROM users WHERE email = '". $email ."' AND password = '". $password ."'";

      $result = mysqli_query($conn, $query);

      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

      if(count($rows) > 0){
          # Risposta "Utente loggato"
          # echo(1);
          # ritornare due campi status_message:user logged in e status_code 1 e user ID
          $post_data = array(
            'status_code' -> 1,
            'status_message' -> 'Successfully logged in'
            #non so mettere l'id
          );
          echo json_encode($post_data)."\n";
      }else{
          # Risposta "Utente non loggato"
          #echo(0); 
          # ritornare due campi status_message:user not logged in e status_code 0
          $post_data = array(
            'status_code' -> 0,
            'status_message' -> 'Unsuccessful logged in'
          );
          echo json_encode($post_data)."\n";
      }

  
?>