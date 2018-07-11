<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <title>Comment Board</title>
    </head>
    <body>
    	@include('form')
            @if($comments->count() > 0)
            	<ul>
                    <!-- Send intial comments in -->
                    @include('list', ['series' => $comments['']])
                </ul>
            @endif
    </body>
</html>
