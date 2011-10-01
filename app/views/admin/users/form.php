<form method="post" action="<?php if(isset($row)) { echo "/admin/users/update/"; } else { echo "/admin/users/add/"; } ?>" id="data_form">

	<div class="dp100" id="content_form">
	
		<div class="dp25"><label for=""><?= lang('email'); ?> *</label></div>
		<div class="dp75"><input type="text" required="required" name="f[email]" id="email" value="<?php if(isset($row)) { echo $row->email; } ?>" /></div>
		
		<div class="dp25"><label for=""><?= lang('password'); ?> *</label></div>
		<div class="dp75"><input type="password" <?php if(!isset($row)) { echo 'required="required"'; } ?> name="f[password]" id="password" value="" /></div>
		
		<div class="dp25"><label for=""><?= lang('name'); ?></label></div>
		<div class="dp75"><input type="text" name="f[name]" id="name" value="<?php if(isset($row)) { echo $row->name; } ?>" /></div>
		
		<div class="dp100">
		
			<input type="hidden" name="id" id="id" value="<?php if(isset($row)) { echo $row->id; } ?>" />
			<input type="submit" name="ok" id="ok" value="OK" />
			
		</div>
	
	</div>

</form>