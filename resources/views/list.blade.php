<ul>
    @foreach ($series as $comment)
    	<h4> User: {{ $comment->name }} </h4>
        <div class="body">
    	   Comment: {{ $comment->comment }}
        </div>
    	@include('form', ['parentId' => $comment->id, 'level' => $comment->level])

        @if(isset($comments[$comment->id]))
            @include('list', ['series' => $comments[$comment->id]])
        @endif
    @endforeach
</ul>