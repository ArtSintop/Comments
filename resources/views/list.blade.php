@foreach ($comments as $comment)
	<p> {{ $comment->name }} </p>
	<p> {{ $comment->comment }}</p>
	Reply
	@include('form', ['parentId' => $comment->id, 'level' => $comment->level])

    @if(isset($comments[$comment->id]))
        @foreach($comments[$comment->id] as $childComment)
            <p> {{ $childComment->name }} </p>
            <p> {{ $childComment->comment }}</p>
            @include('form', ['parentId' => $childComment->id, 'level' => $childComment->level])
        @endforeach
    @endif
@endforeach