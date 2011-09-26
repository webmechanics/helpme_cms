<?php $current = $this->uri->segment(2, 'content'); ?>

<div class="dp25" id="logo">HelpMe CMS</div>

<div id="auth_info">
	<p><?= $this->lang->line('user'); ?>: <strong><?php echo $this->session->userdata('email'); ?></strong></p>
	<p><a href="/admin/main/logout/"><?= $this->lang->line('logout'); ?></a></p>
</div>

<div class="dp100" id="navigation">

<ul>
    <li<?php if($current == "content") { echo ' class="current"'; } ?>><a class="content" href="/admin/content/"><?= $this->lang->line('pages'); ?></a></li>
    <li<?php if($current == "users") { echo ' class="current"'; } ?>><a class="users" href="/admin/users/"><?= $this->lang->line('users'); ?></a></li>
</ul>

</div>
<div class="dp100" id="hr1"></div>