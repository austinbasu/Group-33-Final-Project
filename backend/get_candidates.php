<?php
	$cn = pg_connect("host=localhost port=5432 dbname=united_states
	user=postgres password=1234");

	## Running an SQL injection escape string
	$year = pg_escape_string($_GET['year']);

	$query = "SELECT * FROM public.candidates WHERE year=".$year.";";

	$result = pg_query($cn, $query);

	$data = array();
	while($row = pg_fetch_object($result)){
		$data[] = $row;
	}

	//now print the data
	print json_encode($data);

?>