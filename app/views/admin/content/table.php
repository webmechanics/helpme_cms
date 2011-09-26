<?php 

$strings = array();
$output = "{\"aaData\":[";

foreach ($table as $row) {

	if($row->enabled == 0) {
		$style = "disabled";
		$action = "1";
		$title = $this->lang->line('enable');
	}
	
	else {
		$style = "enabled";
		$action = "0";
		$title = $this->lang->line('disable');
	}
	
	$enabler = sprintf("<div class=\"%s\" id=\"enable_%d_%d\" title=\"%s\">&nbsp;</div>", $style, $action, $row->id, $title);
	$delete = sprintf("<div class=\"trash\" id=\"delete_%d\" title=\"%s\">&nbsp;</div>", $row->id, $this->lang->line('delete'));
	
	$strings[] = sprintf("['%s','%s','<a href=\"/admin/content/edit/%d/\" class=\"colorbox\">%s</a>','%s','%s','%s']", $row->id, $row->priority, $row->id, $row->name, $row->parent, $enabler, $delete);
}

$output .= implode(",",$strings);	
$output .= "]}";

echo $output;

?>