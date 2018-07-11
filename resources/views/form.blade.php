<form method="POST" action="/comments/post">
	{{ csrf_field() }}
	<p class="allign-input">
		Name:
		<input type="text" name="name">
		Comment :
		<textarea name="comment"> </textarea>
	</p>
	@if(isset($parentId))
		@if($level < $maxLevel)
			<input type="hidden" name="parentId" value="{{ $parentId }}"> </input>
			<input type="hidden" name="level" value="{{ $level }}"> </input>
			<button type="submit">Reply</button>
		@else
		<!-- Do nothing max level reached -->
		@endif
	@else
		<button type="submit">Add Comment</button>
	@endif
	<br>
	<br>
</form> 