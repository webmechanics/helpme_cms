<?php $current = $this->uri->segment(2, 'content'); ?>

<div class="dp25" id="logo"><a href="/" title="<?= lang('goto_website'); ?>" target="_blank">HelpMe CMS</a></div>

<div id="auth_info">
	<p><?= lang('user'); ?>: <strong><?php echo $this->session->userdata('email'); ?></strong></p>
	<p><a href="/admin/main/logout/"><?= lang('logout'); ?></a></p>
</div>

<div class="dp100" id="navigation">

<ul>
    <li<?php if($current == "content") { echo ' class="current"'; } ?>><a class="content" href="/admin/content/"><?= lang('pages'); ?></a></li>
    <li<?php if($current == "users") { echo ' class="current"'; } ?>><a class="users" href="/admin/users/"><?= lang('users'); ?></a></li>
    <li<?php if($current == "files") { echo ' class="current"'; } ?>><a class="users" href="/admin/files/"><?= lang('files'); ?></a></li>
</ul>

</div>
<div class="dp100" id="hr1"></div>