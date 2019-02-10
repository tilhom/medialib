@extends('layouts.app')

@section('content')
<div class="container">
	<form action="{{route('avatar.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
			</div>
			<div class="custom-file">
				<input type="file" class="custom-file-input" name='avatar' id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
				<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
			</div>
			<input type="submit" value="Upload" class="btn btn-success ml-3">
		</div>
	</form>
	@if(session()->has('error'))
		<div class="alert alert-danger">{{session()->get('error')}}</div>
	@endif
	<div class="card-columns">
		@foreach($avatars as $avatar)
		<div class="card">
			<img src="{{$avatar->getUrl()}}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Card title that wraps to a new line</h5>
				<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			</div>
		</div>	
		@endforeach
	</div>
</div>
@endsection