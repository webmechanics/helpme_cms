<!DOCTYPE html> 

<html>
<head>

<meta charset="utf-8">
<title><?= $page->name ?> — HelpMe CMS</title>

<link href="/css/grid.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/highlight.css" rel="stylesheet" type="text/css" />
<link href="/css/jquery.colorbox.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.colorbox.js"></script>
<script type="text/javascript" src="/js/highlight.js"></script>
<script type="text/javascript" src="/js/utils.js"></script>

<?php if($this->session->userdata('email')) { ?>

<link href="/css/jquery.jgrowl.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery.livequery.js"></script>
<script type="text/javascript" src="/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript" src="/js/jquery.tools.js"></script>
<script type="text/javascript" src="/js/jquery.tools.ru.js"></script>
<script type="text/javascript" src="/js/jquery.ui.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	
    // colorbox и jgrowl defaults
	
	$(".colorbox").livequery(function() {
		$(".colorbox").colorbox({width: '90%'});
	});
	
	$.jGrowl.defaults.position = 'center';
	$.jGrowl.defaults.life = 800;
	$.jGrowl.defaults.closerTemplate = '<div><?= $this->lang->line('close_all'); ?></div>';
	
	$(document).bind('cbox_closed', function(){
        $('.validation').hide();
	});
	
	// add & edit form
	
	$('#data_form #ok').livequery('click',function() {
	
		var v = $("#data_form").validator({ lang: "russian", messageClass: "validation", offset: [0, -180] });
		ret = v.data("validator").checkValidity();
		
		if(ret == true) {
	
			$('#data_form #ok').attr('disabled','disabled').val('<?= $this->lang->line('wait'); ?>');
			
			$('#data_form').ajaxSubmit(function(data) { 
				$.colorbox.close();
				$.jGrowl("<?= $this->lang->line('data_saved'); ?>");
				$('#data_form #ok').removeAttr('disabled').val('<?= $this->lang->line('saved'); ?>');
			});
			
			return false;
		}
		
		else {
			return false;
		}
	});
	
	// delete link
	
	$('#delete').click(function(){
	
		if(confirm("<?= $this->lang->line('sure'); ?>")){
		
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
	
	$('code').each(function(i,e) { htmlspecialchars(e) });
	$('noscript').each(function() { $(this).parent().html($(this).html()) });
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
				<input type="search" placeholder="<?= $this->lang->line('search'); ?>…" name="str" autosave="str" results="5" />
				<input type="hidden" name="newsearch" value="true" />
			</form>
			
			<?php if($this->session->userdata('email')) { ?>
			
			<ul id="edit">
				<li><a href="/admin/content/form/" class="colorbox"><?= $this->lang->line('new'); ?></a></li>
				<li><a href="/admin/content/edit/<?= $page->id ?>/" class="colorbox"><?= $this->lang->line('edit'); ?></a></li>
				<li><a href="/admin/content/delete/<?= $page->id ?>/" id="delete"><?= $this->lang->line('delete'); ?></a></li>
			</ul>
			
			<?php } ?>
			
		</div>
	
	</div>
	
	<div class="dp80">
	
		<div id="content">
		
			<div class="breadcrumbs"><a href="/"><?= $this->lang->line('home'); ?></a> — <?= $page->name ?></div>
			
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
			
			<div id="tags"><?= $this->lang->line('keywords'); ?>: <?= $tagline ?></div>
			
			<?php } ?>

		</div>
	
	</div>
	
	<div class="clear"></div>
	
	<div id="footer" class="dp20">&copy; webmechanics, 2011</div>
	<div id="contacts" class="dp80"><?= $this->lang->line('still_have_a_questions'); ?> <a href="mailto:support@adfox.ru?subject=Вопрос по AdFox.ADV"><?= $this->lang->line('contact_us'); ?></a>.</div>

</div>

</body>

</html>