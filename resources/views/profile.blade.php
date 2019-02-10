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
			<img src="{{$avatar->getUrl('card')}}" class="card-img-top" alt="...">
			<div class="card-body pb-5">
				<div class="float-left">
					<a href="" onclick="event.preventDefault();document.getElementById('selectForm{{$avatar->id}}').submit()"><i class="text-primary fa fa-check fa-2x"></i></a>
					<form action="{{route('avatar.update',auth()->id())}}" style="display: none;" id="selectForm{{$avatar->id}}" method="post">
						@csrf 
						@method('put')
						<input type="hidden" name="selectForm" value="{{$avatar->id}}" >
					</form>
					<a href=""><i class="text-danger fa fa-minus-circle fa-2x"></i></a>
				</div>
				<div class="float-right">
					<a href=""><i class="text-success fa fa-eye fa-2x"></i></a>
					<a href=""><i class="text-warning fa fa-download fa-2x"></i></a>
				</div>
			</div>
		</div>	
		@endforeach
	</div>
</div>
@endsection