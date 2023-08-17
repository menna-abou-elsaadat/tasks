<?php

namespace App\Services;

use App\Models\Task;

class TaskService 
{
	public static function createTask($name,$user_id)
	{
		$task = new Task();
		$task->name = $name;
		$task->user_id = $user_id;
		$task->save();

		return $task;
	}

	public static function updateTask($task,$name)
	{
		$task->name = $name;
		$task->save();

		return $task;
	}

	public static function deleteTask($task)
	{
		$task->delete();
	}
}
?>