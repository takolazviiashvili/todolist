$(document).ready(function() {
	var form = $('#form');
	var task = form.find('input[name="todolist"]');
	var time = form.find('input[name="todolisttime"]');
	var button = form.find('button[type="submit"]');
	var edit = $('.edit-list');
	var lists = $('.list');
	var updateId;
	var remove = $('.remove-list');
	$(document).on('click', 'button[type="submit"]', function(e) {
		e.preventDefault();
		var taskf = timef = false;
		var IsTrue = ($(this).attr('data-update') == "true");
		if (task.val()) {
			taskf = true;
		} else {
			alert('New Task Field is Empty');
		}
		if (time.val()) {
			timef = true;
		} else {
			alert('Time Field is Empty!');
		}
		if (taskf && timef) {
			if (!IsTrue) {
				$.ajax({
					type: "POST",
					url: "addtolist.php",
					data: {
						task: task.val(),
						time: time.val()
					},
					dataType: 'json'
				}).done(function(data) {
					$('.to-do-lists-container').prepend('<div class="list" data-list-id="' + data[0].id + '"><p class="task">' + data[0].todo + '</p><span class = "date">' + data[0].date + '</span><span class="edit-list"></span><span class="remove-list"></span></div>');
					time.val('');
					task.val('');
				});
			} else {
				$.ajax({
					type: "POST",
					url: "editlist.php",
					data: {
						id: updateId,
						task: task.val(),
						time: time.val()
					},
					dataType: 'json'
				}).done(function(data) {
					if (data) {
						var list = $('div.list[data-list-id="' + updateId + '"]');
						list.children('.task').html(task.val());
						list.children('.date').html(time.val());
						list.css('background', 'rgb(255,255,255)');
						button.html('add');
						button.attr('data-update', false);
						task.val('');
						time.val('');
					}
				})
			}
		}
	})
	$(document).on('click', '.edit-list', function(e) {
		e.preventDefault();
		$(this).parent().parent().children().css('background', 'rgb(255,255,255)');
		$(this).parent().css('background', '#E9D9D9');
		task.val($(this).parent().children('p').text());
		time.val($(this).parent().children('span.date').text());
		button.html('update');
		button.attr('data-update', true);
		updateId = $(this).parent().attr('data-list-id');
	})
	remove.click(function(e) {
		e.preventDefault();
		var conf = confirm('Are you sure you want to delete this task?');
		if (conf) {
			var removeId = $(this).parent().attr('data-list-id');
			$.ajax({
				type: "POST",
				url: "removelist.php",
				data: {
					id: removeId
				}
			}).done(function(data) {
				if(data){
					$('div.list[data-list-id="' + removeId + '"]').remove();	
				}
			});
		}
	})
/*
	form.find('input');
	var 
*/
})