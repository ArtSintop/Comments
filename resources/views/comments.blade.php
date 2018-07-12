<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8" >
        <title>Comment Board</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
        .allign-input * {
          vertical-align: top;
        }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".submit").click(function(e) {
                    e.preventDefault();
                    $("#name").prop('required',true);
                    $("#comment").prop('required',true);
                    var name = $("#name").val(); 
                    var comment = $("#comment").val();
                    var parentId = $("#parentId").val();
                    var level = $("#level").val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        data:{ name: name, comment: comment, parentId,  : level },
                        url: "../comments/post",,
                        success:function(data) {
                            alert(123);
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <h1> Comment Board </h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    	@include('form')
            @if($comments->count() > 0)
            	<ul>
                    <!-- Send intial comments in -->
                    @include('list', ['series' => $comments['']])
                </ul>
            @endif
    </body>
</html>
