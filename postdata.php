<!DOCTYPE HTML>
<html>
</body>

<?php
$weekdays=array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

  echo <center><h4> Test Scheduler - 2 Hour Blocks </h4></center>
	
	echo <center>
	echo <table>

  foreach ($weekdays as $day)
  {

	  echo <tr>
		      <h5> Group Member 1 </h5>
		      <td>
		      $day:<br>
			      <input type="checkbox" name="time" value="time_slot">8:00 - 9:50 am<br>
			      <input type="checkbox" name="time" value="time_slot">10:00 - 11:50 am<br>
			      <input type="checkbox" name="time" value="time_slot">12:00 - 1:50 pm<br>
			      <input type="checkbox" name="time" value="time_slot">2:00 - 3:50 pm<br>
			      <input type="checkbox" name="time" value="time_slot">4:00 - 5:50 pm<br>
			      <input type="checkbox" name="time" value="time_slot">6:00 - 7:50 pm<br>
			      <input type="checkbox" name="time" value="time_slot">No Free Time<br>
		      </td>
	      </tr>
  } //endloop

?>

</body>
</html>

