<?php
class MyDB extends SQLite3 {
	function MyDB() {
		$this->open('../test.db');
	}
}

$db = new MyDB();
if (!$db) {
	echo "can not connect to the db";
	exit();
}
