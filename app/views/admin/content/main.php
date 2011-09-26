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
<script type="text/javascript" src="/js/jquery.tabby.js"></script>

<script type="text/javascript">

jQuery(document).ready(function() {

    // умолчания для colorbox и jgrowl
	
	$(".colorbox").livequery(function() {
		$(".colorbox").colorbox({width: '90%'});
	});
	
	$.jGrowl.defaults.position = 'center';
	$.jGrowl.defaults.life = 800;
	$.jGrowl.defaults.closerTemplate = '<div><?= lang('close_all'); ?></div>';
	
	$(document).bind('cbox_closed', function(){
        $('.validation').hide();
	});
	
	$("#body").livequery(function(){
		$("#body").tabby();
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
		"sAjaxSource": '/admin/content/table/',
		"oLanguage": {"sZeroRecords": "<?= lang('nothing_found'); ?>","sProcessing": "<?= lang('loading'); ?>","sSearch": ""},
		"aoColumns": [
			{ "bVisible": false },
			{ "bVisible": false },
			{ "sType": "html" },
			{ "sType": "html" },
			{ "sWidth": "22px", "sType": "html" },
			{ "sWidth": "22px", "sType": "html" }
		]
	});

	// удаление
	
	$('.trash').livequery('click', function() {
	
		if(confirm("<?= lang('sure'); ?>")){
	
			var arr = $(this).attr('id').split("_");
			
			$.get("/admin/content/delete/" + arr[1] + "/", function(data){ 
				$.jGrowl(data); 
				objectsTable.fnReloadAjax();
			});
		}
	});
	
	// вкл-выкл
	
	$('.enabled, .disabled').livequery('click', function() {
	
		var arr = $(this).attr('id').split("_");
			
		$.post("/admin/content/enable/", { id: arr[2], name: 'enabled', value: arr[1] }, function(data){ 
			$.jGrowl(data);
			objectsTable.fnReloadAjax();
		});
	});
	
	// форма
	
	$('#data_form #ok').livequery('click',function() {
	
		var v = $("#data_form").validator({ lang: "<?= $this->config->item('language'); ?>", messageClass: "validation", offset: [0, -180] });
		ret = v.data("validator").checkValidity();
		
		if(ret == true) {
	
			$('#data_form #ok').attr('disabled','disabled').val('<?= lang('wait'); ?>');
			
			$('#data_form').ajaxSubmit(function(data) { 
				$.colorbox.close();
				$.jGrowl(data);
				objectsTable.fnReloadAjax();
				$('#data_form #ok').removeAttr('disabled').val('<?= lang('saved'); ?>');
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

	<h2 class="pages_header"><?= lang('pages'); ?> | <a href="/admin/content/form/" class="colorbox"><?= lang('add_page'); ?></a></h2>

	<table id="objects_table" class="data_table">
	 
		<thead> 
			<tr> 
				<th></th>
				<th></th>
				<th title="<?= lang('order_by_name'); ?>" class="header" align="left"><?= lang('name'); ?></th>
				<th title="<?= lang('order_by_parent'); ?>" class="header" align="left"><?= lang('parent'); ?></th>
				<th title="<?= lang('order_by_enabled'); ?>" class="header"></th>
				<th title="<?= lang('delete'); ?>" class="header"></th>
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