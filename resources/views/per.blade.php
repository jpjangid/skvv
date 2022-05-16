<form action="{{ route('per.create') }}" method="POST">
	@csrf
	<label>Permission name:</label>
	<input name="name" type="name" value="">
	<input type="submit">
</form>