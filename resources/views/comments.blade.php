<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <title>Comment Board</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
        .allign-input * {
          vertical-align: top;
        }
        </style>
    </head>
    <body>
        <h1> Comment Board </h1>
    	@include('form')
            @if($comments->count() > 0)
            	<ul>
                    <!-- Send intial comments in -->
                    @include('list', ['series' => $comments['']])
                </ul>
            @endif
    </body>
</html>
