<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    </head>
    <body>
    	<form method="POST" action="/comments/post">
    		{{ csrf_field() }}
			Name:<br>
			<input type="text" name="name">
			<br>
			Comment :<br>
			<textarea type="text" name="comment">
			</textarea>
			<br>
			<button type="submit">Add Comment</button>
    	</form> 
    </body>
</html>
