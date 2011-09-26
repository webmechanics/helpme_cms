<!DOCTYPE html> 

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= lang('auth'); ?></title>
	<link href="/css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="auth_header">
	<p><?= lang('auth'); ?></p>
</div>

<div id="auth_form">
	
    <form id="auth" name="auth" method="post" action="/admin/main/login/">
        <label><?= lang('email'); ?></label>
        <input type="text" name="email" id="email" />
        <label><?= lang('password'); ?></label>
        <input type="password" name="password" id="password" />
        <input type="submit" name="ok" id="ok" value="<?= lang('enter'); ?>" />
    </form>
</div>

</body>
</html>