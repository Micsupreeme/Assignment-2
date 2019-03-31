<form name="addMeet" method="post" action="">
	<p>Title <input type="text" name="title"></p>
	<p>Timeslot <input readonly type="text" name="timeslotId" value="<?php echo $_GET['selecttimeslot']; ?>"></p>
	<p>Lecturer <input readonly type="text" name="lecturerId" value="<?php echo $lecturer['usr_id']; ?>"></p>
	<p>Student <input readonly type="text" name="studentId" value="<?php if(!empty($student)) {
			//Current user is a student, arranging a meeting with their assigned lecturer
			echo $student['usr_id']; 
		} else {
			//Current user is a lecturer, arranging a meeting with the student defined in the selectstudent GET variable
			echo $_GET['selectstudent'];
		}?>"></p>
	<input type="submit" name="addMeetSubmit" value="Submit">
	<input type="reset" name="addMeetClear" value="Clear">
</form>