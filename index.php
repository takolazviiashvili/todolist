<?php
 
require_once 'getlist.php';

?>
<!DOCTYPE html>
<html>
<head> 
  <title>To Do List</title>
  <script src="jquery-1.10.2.min.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post" action="todolist.php" id="form">
<fieldset>
<legend>TO DO LIST</legend>
<div>
<label>Add New Task</label>
 <input type="text" name="todolist" placeholder="New Task">
</div>
<div>
	<label>Time</label>
	<input type="text" name="todolisttime" placeholder="ex: mm/dd/yyyy 12:00am">
</div>
<button type="submit" name="add" data-update=false>add</button>
</fieldset>
</form>
<div class="to-do-lists-container">
	<?php foreach(array_reverse($data) as $list): ?> 
	<div class = "list" data-list-id = "<?php print $list->id; ?>">
	  <p class="task"> <?php print $list->todo; ?> </p>
	  <span class="date"><?php print $list->date; ?></span>
	  <span class="edit-list"></span>
	  <span class="remove-list"></span>
	</div>
	<?php endforeach; ?>
</div>
</body>
</html> 