<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <form id="form1">
     <select id="courses">
		<option selected disabled>Select Department</option>
       <?php
		$select = file_get_contents('Courses_list.txt');
		$lines = explode("\n", $select);
		$i = 1;
		foreach($lines as $line) {
			echo '<option value="'.$i.'">'.$line.'</option>';
			$i += 1;
		}
	    ?>
    </select> 
    </form>
</body>
</html>