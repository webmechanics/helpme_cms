<?php

$strings = array();
$output = "{\"aaData\":[";

foreach ($table as $row) {

	$delete = sprintf("<div class=\"trash\" id=\"delete_%d\" title=\"%s\">&nbsp;</div>", $row->id, $this->lang->line('delete'));
	$strings[] = sprintf("['<a href=\"/admin/users/edit/%d/\" class=\"colorbox\">%s</a>','%s','%s']", $row->id, $row->email, $row->name, $delete);
}

$output .= implode(",",$strings);	
$output .= "]}";

echo $output;

?>