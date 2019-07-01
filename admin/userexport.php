<?php
include("../inc/dbconfig.php");

$result = $mysqli->query("SELECT firstname,lastname,institute,addr1,addr2,city,state,zip,country,getemail,regdate FROM users ORDER BY lastname ASC");

// $fields = mysql_num_fields($result);
// for ($i = 0; $i < $fields; $i++) {
	// $csv_output .= mysql_field_name($result, $i) . "\t";
// }
$csv_output .= "First Name\tLast Name\tInstitute\tAddress 1\tAddress 2\tCity\tState/Province\tZip/Postal Code\tCountry\tWants To Be Contacted?\tRegistration Date\t";

while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	$line = '';
	foreach($row as $value) {
		if ((!isset($value)) OR ($value == "")) {
			$value = "\t"; 
		} else {
			$value = str_replace('"', '""', $value);
			$value = '"' . $value . '"' . "\t"; 
		}
		$line .= $value;
	}
	//$data .= trim($line)."\n";
  $data .= $line . "\n";
}
$data = str_replace("\r","",$data);

$filetag = date("Ymd");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=export_$filetag.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $csv_output."\n".$data;
exit;
?>