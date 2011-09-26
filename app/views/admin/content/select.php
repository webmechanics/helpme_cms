<?php 

$strings = array('<option value="0">'.$this->lang->line('none').'</option>');

foreach ($table as $row) {

	$selected = '';

	if($row->id == $this->uri->segment(4,0)) {
		$selected = 'selected="selected"';
	}
	
	$strings[] = sprintf('<option value="%d" %s>%s</option>', $row->id, $selected, $row->name);
}

$output = implode("",$strings);	
		
echo $output;

?>