<!DOCTYPE html>

<?php

echo lagSQL();

function lagSQL(){  //function for å lage SQL UPDATE setning

  $teller = 0;                                                                    //teller brukes til å se om det må legges til komma i SQL
  if (isset($_POST['studentname'])&&$_POST['studentname']!=NULL){$teller++;}      //Ser om studentname er satt
  if (isset($_POST['email'])&&$_POST['email']!=NULL){$teller++;}                  //Ser om email er satt
  if (isset($_POST['program'])&&$_POST['program']!=NULL){$teller++;}              //ser om program er satt

  if(isset($_POST['update'])&&$teller != 0){                                      //ser om submit knappen er trykket
    if(isset($_POST[$_POST['studentid']])&&$_POST['studentid'] != NULL){          //Hvis studentID ikke er satt..
      echo "Missing StudentID, go back to Update.php and type in input.".         //..echo feilmelding..
           "<br/> <a href='Update.php'>Press here to go back</a>";                //..og echo link til update.php
      exit;
    }
    $sql=
    "UPDATE studentinfo.students WHERE studentid = '".$_POST['studentid']."' SET ";
    if(isset($_POST['studentname'])&&$_POST['studentname']!=NULL){                //Hvis studentname er satt og ikke er NULL..
      $sql .= "name = '".$_POST['studentname']."'";                               //..name = 'studentname'
      if($teller>1){$sql .= ", "; $teller--;}                                     //..name = 'Legger til komma om det kommer flere variabler'
    }
    if(isset($_POST['email'])&&$_POST['email']!=NULL){                            //Hvis email er satt og ikke er NULL..
      $sql .= "email = '".$_POST['email']."'";                                    //..email = 'email'
      if($teller>1){$sql .= ", "; $teller--;}                                     //..name = 'Legger til komma om det kommer flere variabler'
    }
    if(isset($_POST['program'])&&$_POST['program']!=NULL){                        //Hvis program er satt og ikke er NULL..
      $sql .= ".program = '".$_POST['program']."'";                               //..name = 'program'

    }
    $sql .= ";";                                                                  //Avslutter SQL setning
  }
  else{                                                                           //Hvi update ikke er satt..
    echo "No input, go back to Update.php and type in input.".                    //..skriv feilmelding..
         "<br/> <a href='Update.php'>Press here to go back</a>";                  //.. skriv link til update.php
    exit;
  }
  return $sql;                                                                    //returner SQL setningen
}                                                                                 //avslutter lagSQL function

function dbConnetion(){ //function for å koble til databasen
  $servername = "10.10.2.5";
  $username = "maxscaleuser";
  $password = "maxscalepass";
  $dbname = "studentinfo" ;

  // Create connection
  $db = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
  }
  return $db;
}



 ?>
