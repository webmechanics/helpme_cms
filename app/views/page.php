<!DOCTYPE html> 

<html>
<head>

<meta charset="utf-8">
<title><?= $page->name ?> — HelpMe CMS</title>

<meta name="keywords" content="<?= $page->keywords ?>" />
<meta name="description" content="<?= $page->description ?>" />

<link href="/css/grid.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/highlight.css" rel="stylesheet" type="text/css" />
<link href="/css/jquery.colorbox.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.colorbox.js"></script>
<script type="text/javascript" src="/js/highlight.js"></script>

<?php if($this->session->userdata('email')) { ?>

<link href="/css/jquery.jgrowl.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery.livequery.js"></script>
<script type="text/javascript" src="/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript" src="/js/jquery.tools.js"></script>
<script type="text/javascript" src="/js/jquery.tools.ru.js"></script>
<script type="text/javascript" src="/js/jquery.ui.js"></script>
<script type="text/javascript" src="/js/jquery.tabby.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	
    // colorbox и jgrowl defaults
	
	$(".colorbox").livequery(function() {
		$(".colorbox").colorbox({width: '90%'});
	});
	
	$.jGrowl.defaults.position = 'center';
	$.jGrowl.defaults.life = 800;
	$.jGrowl.defaults.closerTemplate = '<div><?= lang('close_all'); ?></div>';
	
	$(document).bind('cbox_closed', function(){
        $('.validation').hide();
	});
	
	// tab support
	
	$("#body").livequery(function(){
		$("#body").tabby();
	});
	
	// add & edit form
	
	$('#data_form #ok').livequery('click',function() {
	
		var v = $("#data_form").validator({ lang: "<?= $this->config->item('language'); ?>", messageClass: "validation", offset: [0, -180] });
		ret = v.data("validator").checkValidity();
		
		if(ret == true) {
	
			$('#data_form #ok').attr('disabled','disabled').val('<?= lang('wait'); ?>');
			
			$('#data_form').ajaxSubmit(function(data) { 
				$.colorbox.close();
				$.jGrowl("<?= lang('data_saved'); ?>");
				$('#data_form #ok').removeAttr('disabled').val('<?= lang('saved'); ?>');
			});
			
			return false;
		}
		
		else {
			return false;
		}
	});
	
	// delete link
	
	$('#delete').click(function(){
	
		if(confirm("<?= lang('sure'); ?>")){
		
			$.get($(this).attr('href'), function(data){
				$.jGrowl(data);
			});
		}
		
		return false;
	});
	
	// topics sorting
	
	$(".topics ul").sortable({ 
		
		opacity: 0.6, 
		cursor: 'move', 
		update: function() {
			var order = $(".topics ul").sortable("serialize");
			$.post("/admin/content/arrange/", order);
		}
	});
});

</script>

<?php } ?>

<script type="text/javascript">

$(document).ready(function() {
	
	$('code').each(function(i,e) { hljs.highlightBlock(e, '    ') });
	$("a[title='colorbox']").colorbox();
	
	$('#logo').click(function(){
		window.location = "/";
	});
	
});

</script>

</head>

<body>

<div class="main">

	<div class="dp20">
	
		<div id="logo">HelpMe CMS</div>
		
		<div id="navigation" class="topics">
		
			<ul>
				<?php foreach($topics as $row) { ?>
				<li id="row_<?= $row->id ?>"><a href="/page/<?= $row->id ?>/"><?= $row->name ?></a></li>
				<?php } ?>
			</ul>
			
			<form action="/search/" method="get" id="search">
				<input type="search" placeholder="<?= lang('search'); ?>…" name="str" autosave="str" results="5" />
				<input type="hidden" name="newsearch" value="true" />
			</form>
			
			<?php if($this->session->userdata('email')) { ?>
			
			<ul id="edit">
				<li><a href="/admin/content/form/" class="colorbox"><?= lang('new'); ?></a></li>
				<li><a href="/admin/content/edit/<?= $page->id ?>/" class="colorbox"><?= lang('edit'); ?></a></li>
				<li><a href="/admin/content/delete/<?= $page->id ?>/" id="delete"><?= lang('delete'); ?></a></li>
			</ul>
			
			<?php } ?>
			
		</div>
	
	</div>
	
	<div class="dp80">
	
		<div id="content">
		
			<div class="breadcrumbs"><a href="/"><?= lang('home'); ?></a> — <?= $page->name ?></div>
			
			<h1><?= $page->name ?></h1>
			
			<?= markdown(process($page->content)) ?>

			<?php
			
				$keywords = explode(",", $page->keywords);
				
				if(sizeof($keywords) > 0) {
				
					foreach($keywords as $str) {
						$tags[] = '<a href="/search/?str='.trim($str).'&newsearch=true">'.trim($str).'</a>';
					}
					
					$tagline = implode(" ", $tags);
			?>
			
			<div id="tags"><?= lang('keywords'); ?>: <?= $tagline ?></div>
			
			<?php } ?>

		</div>
	
	</div>
	
	<div class="clear"></div>
	
	<div id="footer" class="dp20">&copy; webmechanics, 2011</div>
	<div id="contacts" class="dp80"><?= lang('still_have_a_questions'); ?> <a href="mailto:support@adfox.ru?subject=Вопрос по AdFox.ADV"><?= lang('contact_us'); ?></a>.</div>

</div>

</body>

</html>