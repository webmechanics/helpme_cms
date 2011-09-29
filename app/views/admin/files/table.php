<?php

$strings = array();
$output = "{\"aaData\":[";

foreach ($table as $row) {

	$delete = sprintf("<div class=\"trash\" id=\"%s\" title=\"%s\">&nbsp;</div>", $row->name, lang('delete'));
	$path = sprintf("/uploads/%s", $row->name);
	
	$strings[] = sprintf("['<a href=\"/uploads/%s\" class=\"colorbox\">%s</a>','%s','%s','%s','%s']", $row->name, $row->name, $path, $row->size, $row->modified, $delete);
}

$output .= implode(",",$strings);	
$output .= "]}";

echo $output;

?>