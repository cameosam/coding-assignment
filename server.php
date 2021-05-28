<?php
  require_once 'database.php';

  // update record
  $sql = "SELECT value_data FROM airsuite_interview WHERE id=3 LIMIT 1;";
  if ($result = $mysqli -> query($sql)) {
    $new_data = "";
    while ($row = $result -> fetch_assoc()) {
      $words = explode(" ", $row['value_data']);
      foreach($words as $word){
        if (strtoupper($word) == $word) {
          $new_data .= strtolower($word) ." ";
        } else {
          $new_data .= strtoupper($word) ." ";
        }
      }
    }
    $result -> free_result();
  }

  $stmt = $mysqli->prepare("UPDATE airsuite_interview SET value_data=? WHERE id=3");
  $stmt->bind_param("s", $new_data);
  $stmt->execute();
  if ($stmt->error) {
    echo "Could not update value: " . $stmt->error;
  }

  // select second
  $sql = "SELECT * FROM airsuite_interview WHERE value_key='SECOND';";
  if ($result = $mysqli -> query($sql)) {
    while ($row = $result->fetch_assoc()) {
      $secondrecord = $row;
    //   echo $secondrecord;
    }
  }
  $result -> free_result();

  //  output as json
  $all_data = array();
  if ($result = $mysqli->query("SELECT * FROM airsuite_interview")) {
    while($row = $result->fetch_assoc()) {
      $all_data[] = $row;
    }
  }
  $result -> free_result();
  $myJSON = json_encode($all_data);
  echo $myJSON;
  $mysqli->close();