<form name="addMeet" method="post" action="">
	<table>
		<tr><td>Meeting Title</td><td><input type="text" name="title"></td></tr>
		<tr><td>Meeting Timeslot</td><td><input readonly type="text" name="timeslotId" value="<?php echo $_GET['selecttimeslot']; ?>"></td></tr>
		<tr><td>Lecturer Attendee</td><td><input readonly type="text" name="lecturerId" value="<?php echo $lecturer['usr_id']; ?>"></td></tr>
		<tr><td>Student Attendee</td><td><input readonly type="text" name="studentId" value="<?php if(!empty($student)) {
				//Current user is a student, arranging a meeting with their assigned lecturer
				echo $student['usr_id']; 
			} else {
				//Current user is a lecturer, arranging a meeting with the student defined in the selectstudent GET variable
				echo $_GET['selectstudent'];
			}?>"></td></tr>
	</table>
	<input type="submit" name="addMeetSubmit" value="Submit">
	<input type="reset" name="addMeetClear" value="Clear">
</form>