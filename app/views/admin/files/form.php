<form method="post" action="/admin/files/upload/" id="data_form" enctype="multipart/form-data">

	<div class="dp100" id="content_form">
	
		<div class="dp25"><label for=""><?= lang('file'); ?> *</label></div>
		<div class="dp75"><input type="file" required="required" name="userfile" id="userfile" /></div>
		
		<div class="dp100"><input type="submit" name="ok" id="ok" value="OK" /></div>
	
	</div>

</form>