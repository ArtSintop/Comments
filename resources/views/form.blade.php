<form method="POST" action="/">
	{{ csrf_field() }}
	<p class="allign-input">
		Name:
		<input type="text" name="name" id="name">
		Comment :
		<textarea name="comment" id="comment"> </textarea>
	</p>
	@if(isset($parentId))
		@if($level < $maxLevel)
			<input type="hidden" name="parentId" value="{{ $parentId }}" id="parentId"> </input>
			<input type="hidden" name="level" value="{{ $level }}" id="level"> </input>
			<button type="submit" class="submit">Reply</button>
		@else
		<!-- Do nothing max level reached -->
		@endif
	@else
		<button type="submit" class="submit">Add Comment</button>
	@endif
	<br>
	<br>
</form> 