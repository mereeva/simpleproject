<html>
<head><title> Home Page </title></head>

<body>
<h1> Welcome to the Home Page! </h1>

<div>
	<p> User Name: {{ $user->name }} </p>
	<p> Email: {{ $user->email }} </p>
	<p> City: {{ $user->city }} </p>
	<p> Minimum Rent: {{ $user->min_rent }} </p>
	<p> Maximum Rooms: {{ $user->max_rooms }} </p>
</div>	 

<div>
	<a href="logout" > LOGOUT </a>
</div>	

</body>
</html>