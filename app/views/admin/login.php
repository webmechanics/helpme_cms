<!DOCTYPE html> 

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $this->lang->line('auth'); ?></title>
	<link href="/css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="auth_header">
	<p><?= $this->lang->line('auth'); ?></p>
</div>

<div id="auth_form">
	
    <form id="auth" name="auth" method="post" action="/admin/main/login/">
        <label><?= $this->lang->line('email'); ?></label>
        <input type="text" name="email" id="email" />
        <label><?= $this->lang->line('password'); ?></label>
        <input type="password" name="password" id="password" />
        <input type="submit" name="ok" id="ok" value="<?= $this->lang->line('enter'); ?>" />
    </form>
</div>

</body>
</html>