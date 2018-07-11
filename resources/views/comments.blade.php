<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    </head>
    <body>
    	@include('form')
            @if($comments->count() > 0)
            	<ul>
                    @include('list', ['comments' => $comments['']])
            	</ul>
            @endif
    </body>
</html>
