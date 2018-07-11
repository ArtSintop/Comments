<li>
    @foreach ($series as $comment)
    	<p> {{ $comment->name }} </p>
    	<p> {{ $comment->comment }}</p>
    	Reply
    	@include('form', ['parentId' => $comment->id, 'level' => $comment->level])

        @if(isset($comments[$comment->id]))
            @include('list', ['series' => $comments[$comment->id]])
        @endif
    @endforeach
</li>