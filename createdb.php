<?php
/*include ('dbcon.php');

		$sql = "CREATE TABLE howhow (
			item_no int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			platform varchar(30) NULL,
			problems varchar(225) NULL,
			owners varchar(50) NULL,
			others varchar(50) NULL,
			why_1 varchar(225) NULL,
			why_2 varchar(225) NULL,
			why_3 varchar(225) NULL,
			why_4 varchar(225) NULL,
			why_5 varchar(225) NULL,
			imagename varchar(255) NULL,
			imagepath varchar(225) NULL,
			status varchar(225) NULL,
			corrective_actions varchar(225) NULL,
			whens varchar(10) NULL DEFAULT '0',
			entered_by varchar(50) NULL,
			verified_by varchar(50) NULL,
			ratings int(7) NULL DEFAULT '0',
			times_viewed int(7) NULL DEFAULT '0',
			datetime_entry varchar(15) NULL DEFAULT '0',
			approved int(1) NULL DEFAULT '0'
			)";
			
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();*/
?>