<?php

	function register_user($register_data) {
		
		array_walk($register_data, 'array_sanitize');
		
		// encrypt the password to make it more secure
		$register_data['password'] = md5($register_data['password']);
		
		// the field names
		$fields = '`' . implode('`,`', array_keys($register_data)) . '`';
		// the data we are actually inserting
		$data = '\'' . implode('\', \'', $register_data) . '\'';
		
		// CHECK : echo "INSERT INTO users ($fields) VALUES ($data)"; die();

		mysql_query("INSERT INTO anatomy_login ($fields) VALUES ($data)");
		
		email($register_data['username'], 'PARSEC: Activate your account', "Hello " . $register_data['first_name'] . ",\n\nThank you for siging up to PARSEC.\n\nIn order to verify your email address and activate your account, please click on the link below:\n\n http://www.cs1.ucc.ie/~reoc1/PARSEC/activate.php?email=" . $register_data['username'] . "&email_code=" . $register_data['email_code'] . "\n\n- PARSEC
		");
	}
	
	function user_data($user_id) {
		$data = array();
		
		// create an integer from that input. can't pass any sql injection strings into our query later. Sanitize it!
		$user_id = (int)$user_id;
		
		// count the number of arguments
		$func_num_args = func_num_args();
		// get the arguments. it's an array.
		$func_get_args = func_get_args();
		
		if($func_num_args > 1) {
			
			// unset the fist element of the array. Want to create a field set from this data so removed the id
			unset($func_get_args[0]);
			// converting an array into a string. We can pass this string into a query
			$fields = '`' . implode('`, `', $func_get_args) . '`';

			$data = mysql_fetch_assoc(mysql_query("SELECT '$fields' FROM anatomy_login WHERE user_id = '$user_id'"));
			
			return $data;
			
		}
	}

	function logged_in() {
		
		return (isset($_SESSION['user_id'])) ? true : false;

	}
	function logged_in_imports() {
		
		return (isset($_SESSION['user_id_imports'])) ? true : false;

	}
	function logged_in_historical_pieces() {
		
		return (isset($_SESSION['user_id_historical_pieces'])) ? true : false;

	}
	
	function logged_in_prosections() {
		
		return (isset($_SESSION['user_id_prosections'])) ? true : false;

	}
	

function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}


	function user_exists($cnx,$username) {
		
	//TODO MOK This is a double search in DB for existance and then repeated 
            $findUser ="SELECT COUNT(user_id) FROM anatomy_login WHERE username = '$username'";
            $userResult = mysqli_query($cnx, $findUser) 
                or die("Connect Connect to DB - userExists");
            return $userResult;
            // if user id = 0 then the user does not exist so no point going further to check the password against a non-existent username. So check. 
	    // return (mysql_result(mysqli_query("SELECT COUNT(user_id) FROM anatomy_login WHERE username = '$username'"), 0) == 1) ? true : false;
	}
	
	// this is for the email address. Currently the username is the users email. Maybe I should change this.
	function email_exists($username) {
		
		$username = sanitize($username);
		
		// if user id = 0 then the user does not exist so no point going further to check the password against a non-existent username. So check. 
		return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM anatomy_login WHERE username = '$username'"), 0) == 1) ? true : false;
	}
	
	function user_active($username) {
		
		$username = sanitize($username);
		
		return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM anatomy_login WHERE username = '$username' AND active = 1"), 0) == 1) ? true : false;
	}
	
	// function to get the user id from the username. Need this for the session.
	function user_id_from_username($username) {
		$username = sanitize($username);
		
		return mysql_result(mysql_query("SELECT user_id FROM anatomy_login WHERE username = '$username'"), 0, 'user_id');
	}
	
	function login($username, $password) {
		// need to sanitize the username and encrypt the password
		$user_id = user_id_from_username($username);
		
		$username = sanitize($username);
		$password = md5($password);
		
		// return whether or not the username and password match was successful
		// if the condition in return is true return the user_id otherwise return false
		return(mysql_result(mysql_query("SELECT COUNT(user_id) FROM anatomy_login WHERE username = '$username' AND password = '$password'"), 0) == 1) ? $user_id : false;
		
	}

	function change_password($user_id, $password) {
		// always want the user id to be an integer
		$user_id = (int)$user_id;
		// md5 encrypted version of that variable
		$password = md5($password);
		
		mysql_query("UPDATE anatomy_login SET password = '$password' WHERE user_id = $user_id");
	}
	
	function activate($email, $email_code) {
		// sanitize the data
		$email 		= mysql_real_escape_string($email);
		$email_code = mysql_real_escape_string($email_code);
		
		// check if the email address and the email code match in one record, and active is equal to 0 (i.e. user hasn't yet activated their account)
		// if all is ok we'll update the active state of the user
		// do a query within a mysql_result. if the result = 1 then we have a match!
		if(mysql_result(mysql_query("SELECT COUNT(user_id) FROM anatomy_login WHERE email = '$email' AND email_code = '$email_code' AND active = 0"), 0) == 1) {
			// query the database to update user active status
			mysql_query("UPDATE anatomy_login SET active = 1 WHERE email = '$email'");
			
			return true;
		} else {
			// if something goes wrong the else will return false
			return false;
		}
	}
	
	function add_a_donor($donor_info_data) {
		
		array_walk($donor_info_data, 'array_sanitize');
		
		// the field names
		$fields = '`' . implode('`,`', array_keys($donor_info_data)) . '`';
		// the data we are actually inserting
		$data = '\'' . implode('\', \'', $donor_info_data) . '\'';
		
		// CHECK : echo "INSERT INTO users ($fields) VALUES ($data)"; die();

		mysql_query("INSERT INTO donor_table ($fields) VALUES ($data)");
	
	}
	
	function add_new_specimen_import($specimen_info_data) {
		
		array_walk($specimen_info_data, 'array_sanitize');
		
		// the field names
		$fields = '`' . implode('`,`', array_keys($specimen_info_data)) . '`';
		// the data we are actually inserting
		$data = '\'' . implode('\', \'', $specimen_info_data) . '\'';
		
		// CHECK : echo "INSERT INTO users ($fields) VALUES ($data)"; die();

		mysql_query("INSERT INTO import_specimens ($fields) VALUES ($data)");
		
		//print_r($specimen_info_data);
	
	}
	
	function add_new_specimen_hist_piece($hist_piece_info_data) {
		
		array_walk($hist_piece_info_data, 'array_sanitize');
		
		// the field names
		$fields = '`' . implode('`,`', array_keys($hist_piece_info_data)) . '`';
		// the data we are actually inserting
		$data = '\'' . implode('\', \'', $hist_piece_info_data) . '\'';
		
		// CHECK : echo "INSERT INTO users ($fields) VALUES ($data)"; die();

		mysql_query("INSERT INTO historical_pieces_table ($fields) VALUES ($data)");
		
		//print_r($specimen_info_data);
	
	}
	
	function make_new_prosection_entry($new_prosection_info_data) {
	
		array_walk($new_prosection_info_data, 'array_sanitize');
		
		// the field names
		$fields = '`' . implode('`,`', array_keys($new_prosection_info_data)) . '`';
		// the data we are actually inserting
		$data = '\'' . implode('\', \'', $new_prosection_info_data) . '\'';

		mysql_query("INSERT INTO prosections_table ($fields) VALUES ($data)");
	}
	
	function add_medical_data($medical_data) {
		array_walk($medical_data, 'array_sanitize');
		
		// the field names
		$fields = '`' . implode('`,`', array_keys($medical_data)) . '`';
		// the data we are actually inserting
		$data = '\'' . implode('\', \'', $medical_data) . '\'';
		
		// CHECK : echo "INSERT INTO users ($fields) VALUES ($data)"; die(); 

		mysql_query("UPDATE patient_general_info SET ($fields) VALUES ($data) WHERE patient_unique_id = $patIDsession");
	}
	
	// functions to prevent user from proceeding to form page 2 without filling in Add A Patient Form page 1....etc.
	function form_page_1_completed() {
		
		return (isset($_SESSION['donorIDsession'])) ? true : false;

	}
	function form_page_2_completed() {
		
		return (isset($_SESSION['page2session'])) ? true : false;

	}
	function form_page_3_completed() {
		
		return (isset($_SESSION['page3session'])) ? true : false;

	}
	function form_page_4_completed() {
		
		return (isset($_SESSION['page4session'])) ? true : false;

	}
	function form_page_5_completed() {
		
		return (isset($_SESSION['page5session'])) ? true : false;

	}
	// Prevent user from opening the patient history tabs without first selecting a patient
	function no_donor_selected() {
	
		return (isset($_SESSION['selected_donor_ref_hist'])) ? true : false;

	}
	
	// Prevent user from opening the patient history tabs without first selecting a patient
	function no_import_sepcimen_hist_selected() {
	
		return (isset($_SESSION['selected_specimen_ref_hist'])) ? true : false;

	}
	
	// Prevent user from opening the patient history tabs without first selecting a patient
	function no_hist_piece_sepcimen_hist_selected() {
	
		return (isset($_SESSION['selected_hist_piece_ref_number'])) ? true : false;

	}
	
?>
