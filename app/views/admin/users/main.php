<!DOCTYPE html> 

<html>
<head>

<meta charset="utf-8">
<title><?= $title ?></title>

<link href="/css/grid.css" rel="stylesheet" type="text/css" />
<link href="/css/admin.css" rel="stylesheet" type="text/css" />
<link href="/css/jquery.jgrowl.css" rel="stylesheet" type="text/css" />
<link href="/css/jquery.datatables.css" rel="stylesheet" type="text/css" />
<link href="/css/jquery.colorbox.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.livequery.js"></script>
<script type="text/javascript" src="/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="/js/jquery.datatables.js"></script>
<script type="text/javascript" src="/js/jquery.colorbox.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript" src="/js/jquery.tools.js"></script>
<script type="text/javascript" src="/js/jquery.tools.ru.js"></script>

<script type="text/javascript">

jQuery(document).ready(function() {

    // умолчания для colorbox и jgrowl
	
	$(".colorbox").livequery(function() {
		$(".colorbox").colorbox({width: '50%'});
	});
	
	$.jGrowl.defaults.position = 'center';
	$.jGrowl.defaults.life = 800;
	$.jGrowl.defaults.closerTemplate = '<div><?= $this->lang->line('close_all'); ?></div>';
	
	$(document).bind('cbox_closed', function(){
        $('.validation').hide();
	});

	// таблица
	
	var objectsTable;
	
	objectsTable = $('#objects_table').dataTable( {
		"sPaginationType": "full_numbers",
		"bStateSave": false,
		"bInfo": false,
		"bLengthChange": false,
		"bAutoWidth": false,
		"bProcessing": false,
		"aaSorting": [[ 1, "asc" ]],
		"sAjaxSource": '/admin/users/table/',
		"oLanguage": {"sZeroRecords": "<?= $this->lang->line('nothing_found'); ?>","sProcessing": "<?= $this->lang->line('loading'); ?>","sSearch": ""},
		"aoColumns": [
			{ "sType": "html" },
			{ "sType": "html" },
			{ "sWidth": "22px", "sType": "html" }
		]
	});

	// удаление
	
	$('.trash').livequery('click', function() {
	
		if(confirm("<?= $this->lang->line('sure'); ?>")){
	
			var arr = $(this).attr('id').split("_");
			
			$.post("/admin/users/delete/", { id: arr[1] }, function(data){ 
				$.jGrowl(data); 
				objectsTable.fnReloadAjax();
			});
		}
	});
	
	// форма
	
	$('#data_form #ok').livequery('click',function() {
	
		var v = $("#data_form").validator({ lang: "<?= $this->config->item('language'); ?>", messageClass: "validation", offset: [0, -180] });
		ret = v.data("validator").checkValidity();
		
		if(ret == true) {
	
			$('#data_form #ok').attr('disabled','disabled').val('<?= $this->lang->line('wait'); ?>');
			
			$('#data_form').ajaxSubmit(function(data) { 
				$.colorbox.close();
				$.jGrowl(data);
				objectsTable.fnReloadAjax();
				$('#data_form #ok').removeAttr('disabled').val('<?= $this->lang->line('saved'); ?>');
			});
			
			return false;
		}
		
		else {
			return false;
		}
	});
}); 

</script>

</head>

<body>

<div class="main">

<div id="top"></div>

<?= $header ?>

<div class="dp100">

	<h2 class="users_header"><?= $this->lang->line('users'); ?> | <a href="/admin/users/form/" class="colorbox"><?= $this->lang->line('add_user'); ?>.</a></h2>
	
	<table id="objects_table" class="data_table">
	 
		<thead> 
			<tr> 
				<th title="<?= $this->lang->line('order_by_email'); ?>" class="header" align="left"><?= $this->lang->line('email'); ?></th>
				<th title="<?= $this->lang->line('order_by_name'); ?>" class="header" align="left"><?= $this->lang->line('name'); ?></th>
				<th title="<?= $this->lang->line('delete'); ?>" class="header"></th>
			</tr> 
		</thead>

		<tbody></tbody>
			
	</table>

</div>

<div class="clear"></div>

<?= $footer ?>

</div>

</body>

</html>