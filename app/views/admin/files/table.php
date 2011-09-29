<?php

$strings = array();
$output = "{\"aaData\":[";

foreach ($table as $row) {

	$delete = sprintf("<div class=\"trash\" id=\"%s\" title=\"%s\">&nbsp;</div>", $row->name, lang('delete'));
	$path = sprintf("/uploads/%s", $row->name);
	$name = $row->name;
	
	if(substr_count($row->type, 'image') > 0) {
		$name = sprintf('<a href=\"/uploads/%s\" class=\"colorbox\">%s</a>', $row->name, $row->name);
	}
	
	$strings[] = sprintf("['%s','%s','%s','%s','%s']", $name, $path, $row->size, $row->modified, $delete);
}

$output .= implode(",",$strings);	
$output .= "]}";

echo $output;

?>