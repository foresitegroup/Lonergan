<?php
include("../inc/dbconfig.php");

$result = $mysqli->query("SELECT sku,title,author,description,decade,language1,language2,pdf,audio,video,transcription FROM archive ORDER BY sku ASC");

$csv_output .= "Call Number\tTitle\tAuthor\tDescription\tDecade\tLanguage\tLanguage 2\tPDF\tAudio\tVideo\tTranscription\t";

while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	$line = '';
	foreach($row as $value) {
		if ((!isset($value)) OR ($value == "")) {
			$value = "\t"; 
		} else {
			$value = str_replace('"', '""', $value);
      $value = str_replace("\n", " ", $value);
			$value = '"' . $value . '"' . "\t"; 
		}
		$line .= $value;
	}
  $data .= $line . "\n";
}
$data = str_replace("\r","",$data);

$filetag = date("Ymd-Hi");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=export_archive_$filetag.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $csv_output."\n".$data;
exit;
?>