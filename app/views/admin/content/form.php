<form method="post" action="<?php if(isset($row)) { echo "/admin/content/update/"; } else { echo "/admin/content/add/"; } ?>" id="data_form">

	<div class="dp100" id="content_form">
	
		<div class="dp25"><label for=""><?= $this->lang->line('name'); ?> *</label></div>
		<div class="dp75"><input type="text" required="required" name="f[name]" id="name" value="<?php if(isset($row)) { echo $row->name; } ?>" /></div>
		
		<div class="dp25"><label for=""><?= $this->lang->line('parent'); ?> *</label></div>
		<div class="dp75"><select name="f[parent]" id="parent"></select></div>
		
		<div class="dp25"><label for=""><?= $this->lang->line('keywords'); ?></label></div>
		<div class="dp75"><input type="text" name="f[keywords]" id="keywords" value="<?php if(isset($row)) { echo $row->keywords; } ?>" /></div>
		
		<div class="dp25"><label for=""><?= $this->lang->line('description'); ?></label></div>
		<div class="dp75"><input type="text" name="f[description]" id="description" value="<?php if(isset($row)) { echo $row->description; } ?>" /></div>
		
		<div class="dp100">
		
			<textarea name="f[content]" id="body"><?php if(isset($row)) { echo $row->content; } ?></textarea>
			
			<input type="hidden" name="id" id="id" value="<?php if(isset($row)) { echo $row->id; } ?>" />
			<input type="submit" name="ok" id="ok" value="OK" />
			
		</div>
	
	</div>

</form>

<script type="text/javascript">

$(document).ready(function() {
	$('#parent').load('/admin/content/dropdown/<?php if(isset($row)) { echo $row->parent; } ?>');
}); 

</script>