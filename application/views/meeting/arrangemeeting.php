
<form name="addMeet" method="post" action="">
	<table>
		<tr><th>Meeting Title</th><th><input type="text" name="title"></th></tr>
        <br>
		<tr class = "hiddenRow"><td>Meeting Timeslot</td><td><input readonly type="text" name="timeslotId" value="<?php echo $_GET['selecttimeslot']; ?>"></td></tr>
		<tr class = "hiddenRow"><td>Lecturer Attendee</td><td><input readonly type="text" name="lecturerId" value="<?php echo $lecturer['usr_id']; ?>"></td></tr>
		<tr class = "hiddenRow"><td>Student Attendee</td><td><input readonly type="text" name="studentId" value="<?php if(!empty($student)) {
				//Current user is a student, arranging a meeting with their assigned lecturer
				echo $student['usr_id']; 
			} else {
				//Current user is a lecturer, arranging a meeting with the student defined in the selectstudent GET variable
				echo $_GET['selectstudent'];
			}?>"></td></tr>
	</table>
    <br>
	<input type="submit" name="addMeetSubmit" value="Submit">
	<input type="reset" name="addMeetClear" value="Clear">
</form>
<?php echo validation_errors(); ?>