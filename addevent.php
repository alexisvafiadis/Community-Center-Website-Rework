<?php
include('config.php');
if (isset($_POST["addevent"])) {
$name = $_POST["name"];
$date = date("Y-m-d", strtotime($_POST['date'])); 
$time = $_POST["time"]. ":00";
$description = $_POST["description"]; 
$organizers = $_POST["organizers"]; 
$sql = "SELECT * FROM event WHERE date = '" . $date . "' AND time = '" . $time . "';";
$query_check_datetime = $conn->query($sql);
  if ($query_check_datetime->num_rows == 1) {
      echo "Sorry, that event time spot is taken!";
  } else {
      $sql = "INSERT INTO event (name, date, time, description, organizers)
VALUES('" . $name . "', '" . $date . "', '" . $time . "', '" . $description . "', '" . $organizers . "');";
      $query_new_event_insert = $conn->query($sql);
      if ($query_new_event_insert) {
          echo "The event has been created successfully. You can now log in.";
      } else {
          echo "Sorry, the event registration has failed. Please go back and try again.";
      }
  }
}
?>

<html>
<form method="post" action="" name="addevent-form">
  <div class="form-element">
    <label>Name</label>
    <input type="text" name="name" required />
  </div>
  <div class="form-element">
    <label>Date</label>
    <input type="date" name="date" required />
  </div>
  <div class="form-element">
    <label>Time</label>
  <select name="time" required>
  <option value="10:00">10 am</option>
  <option value="10:30">10:30 am </option>
  <option value="11:00">11:00 am</option>
  <option value="11:30">11:30 am</option>
  <option value="12:00">12:00 pm</option>
  <option value="12:30">12:30 pm</option>
  <option value="13:00">1:00 pm</option>
  <option value="13:30">1:30 pm</option>
  <option value="14:00">2:00 pm</option>
  <option value="14:30">2:30 pm</option>
  <option value="15:00">3:00 pm</option>
  <option value="15:30">3:30 pm</option>
  <option value="16:00">4:00 pm</option>
  <option value="16:30">4:30 pm</option>
  <option value="17:00">5:00 pm</option>
  <option value="17:30">5:30 pm</option>
  <option value="18:00">6:00 pm</option>
  <option value="18:30">6:30 pm</option>
  <option value="19:00">7:00 pm</option>
  <option value="20:30">7:30 pm</option>
  <option value="20:00">8:00 pm</option>
  <option value="20:30">8:30 pm</option>
  <option value="21:00">9:00 pm</option>
  <option value="21:30">9:30 pm</option>
  <option value="22:00">10:00 pm</option>
  <option value="22:30">10:30 pm</option>
  <option value="23:00">11:00 pm</option>
  <option value="23:30">11:30 pm</option>
  <option value="00:00">12:00 am</option>
  <option value="00:30">12:30 am</option>
  <option value="01:00">1 am</option>
</select>
</div>
  <div class="form-element">
  <textarea rows = "5" cols = "60" name = "description">Describe the event</textarea>
  </div>
  <div class="form-element">
    <label>Organizers</label>
    <input type="text" name="organizers" required />
  </div>
  <button type="submit" name="addevent" value="addevent">Add Event</button>
</form>
</html>