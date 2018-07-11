<ul>
    @foreach ($series as $comment)
    	<h4> {{ $comment->name }} </h4>
        <div class="body">
    	   {{ $comment->comment }}
        </div>
    	@include('form', ['parentId' => $comment->id, 'level' => $comment->level])

        @if(isset($comments[$comment->id]))
            @include('list', ['series' => $comments[$comment->id]])
        @endif
    @endforeach
</ul>