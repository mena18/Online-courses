<?php

class course_model extends DataBase {

	public static $table_name = "courses";
	public static $class_name = "course_model";
	public static $fill = ['name','description','image',
	'instructor_id','category_id','avg_rating','duration_weeks','finished'];





	public function rating(){
		$id = $this->id;
		$sql = "SELECT AVG(rating) FROM user_courses WHERE course_id = '$id' AND finished='1'; ";
		return self::get_one($sql)[0];

	}

	public function total_time(){
		$id = $this->id;
		$sql = "SELECT  sum(duration) FROM lesson WHERE course_id = '$id'; ";
		return self::get_one($sql)[0];
	}


	public function instructor(){
		$id = $this->instructor_id;
		$sql = "SELECT * from user where id='$id' ";
		return self::query_fetch($sql,'user_model');
	}

	public function lessons(){
		$sql = "SELECT * from lesson where course_id='$this->id' ORDER BY week_number,id";
		return self::query_fetch_all($sql,'lesson_model');
	}

	public function quizzes(){
		$sql = "SELECT * FROM quiz WHERE course_id = '$this->id'  ORDER BY week_num,id ;";
		return self::query_fetch_all($sql,'quiz_model');
	}

	public function assignments(){
		$sql = "SELECT * FROM assignment WHERE course_id = '$this->id'  ORDER BY week_num,id ;";
		return self::query_fetch_all($sql,'assignment_model');
	}

	public function unseen_messages(){
		$sql = "SELECT messages.*,user.name FROM messages INNER JOIN user on messages.user_id=user.id
		where messages.course_id = '$this->id' AND archived = '0' ";
		return self::query_fetch_all($sql,'messages_model');
	}

	public function seen_messages(){
		$sql = "SELECT messages.*,user.name FROM messages INNER JOIN user on messages.user_id=user.id
		where messages.course_id = '$this->id' AND archived = '1' ";
		return self::query_fetch_all($sql,'messages_model');
	}

	public function total_marks(){
		$sql_1 = "SELECT sum(total_marks) from quiz where course_id = '$this->id' ";
		$sql_2 = "SELECT sum(total_marks) from assignment where course_id = '$this->id' ";

		return self::get_one($sql_1)[0] + self::get_one($sql_2)[0];
	}

	public function weeks(){
		$lessons = $this->lessons();
		$quizzes = $this->quizzes();
		$assignments = $this->assignments();

		$weeks = [];
		for($i=1;$i<=($this->duration_weeks);$i++){
			$weeks[$i] = [];
		}
		foreach ($lessons as $less) {
			$weeks[$less->week_number][] = ["type"=>"lesson","content"=>$less];
		}
		foreach ($quizzes as $quiz) {
			$weeks[$quiz->week_num][] = ["type"=>"quiz","content"=>$quiz];
		}
		foreach ($assignments as $ass) {
			$weeks[$ass->week_num][] = ["type"=>"assignment","content"=>$ass];
		}

		return $weeks;

	}


	public function reviews($lim=-1){
		$sql = "SELECT user_courses.*,user.* FROM user_courses inner join user on user.id = user_courses.user_id
		 WHERE user_courses.course_id = '$this->id' AND rating != 0 ORDER BY rating LIMIT $lim ";
		return self::query_fetch_all($sql,"user_model");
	}

	public function resourses(){
		$sql = "SELECT * FROM resourses WHERE course_id  = '$this->id';";
		return self::query_fetch_all($sql,"resourses_model");
	}

	public function users(){
		$sql = "SELECT user_courses.*,user.* FROM user_courses INNER JOIN user 	ON user_courses.user_id = user.id
				WHERE course_id = '$this->id' ";
		return self::query_fetch_all($sql,"user_model");
	}



	/* replace  soon */
	public function toggle_in_course($user_id,$course_id){

		$sql = "INSERT INTO user_courses (user_id, course_id)
    		VALUES ('$user_id','$course_id');";

    	if(self::user_course($user_id,$course_id)){
    		$sql = "DELETE FROM user_courses WHERE user_id='$user_id' AND course_id = '$course_id' ";
    	}
		self::query($sql);
	}



	/* remove soon */
	public function user_finish($user_id,$course_id,$rating,$review){
		$sql = "UPDATE user_courses SET finished = '1',rating = '$rating' ,review = '$review'  WHERE course_id='$course_id' AND user_id = '$user_id' ";
		self::query($sql);
	}

	public function instructor_finish($id){
		$sql = "UPDATE courses set finished = '1' where id = '$id' ";
		self::query($sql);
	}

	public function admin_finish($id){
		$sql = "UPDATE courses set finished = '2' where id = '$id' ";
		self::query($sql);
	}

	public function user_course($user_id,$course_id){
		$sql = "SELECT * from user_courses where course_id='$course_id' AND user_id = '$user_id' ";
		return self::query_fetch($sql);
	}




}
