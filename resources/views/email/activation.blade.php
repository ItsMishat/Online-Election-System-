<!DOCTYPE html>
<html>
<style type="text/css">

</style>

<head>
	<title> Activate Email</title>
</head>

<body>
	<h1>
		Hello, {{$user->name}}.  
	</h1>
	<h2>Thank you for signing up!</h2>
	<p>
		Please <a href='{{url("register/confirm/{$user->token}")}}'>Activate</a> your E-mail address.
	</p>
</body>
</html>