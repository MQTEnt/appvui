@extends('admin.layouts.master')
@section('title','Group Management')
@section('feature-title', 'Add New Group')
@section('back-page')
	<p><a href="{{route('group.index')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a></p>
@stop
@section('main-content')
	<div class="box box-primary">
		<!-- form start -->
		<form role="form" method="POST" action="{{ route('group.store') }}">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name">Name</label>
					<input 	id="name" 
							type="text" 
							class="form-control" 
							name="name" 
							value="{{ old('name') }}"
							placeholder="Fill name of group"
							required>
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('fandom') ? ' has-error' : '' }}">
					<label for="fandom">Fandom</label>
					<input 	id="fandom" 
							type="text" 
							class="form-control" 
							name="fandom" 
							value="{{ old('fandom') }}"
							placeholder="Fill fandom of group"
							required>
					@if ($errors->has('fandom'))
					<span class="help-block">
						<strong>{{ $errors->first('fandom') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
					<label for="image">Image</label>
					<input 	id="image" 
							type="text" 
							class="form-control" 
							name="image" 
							value="{{ old('image') }}"
							placeholder="Fill image of group"
							required>
					@if ($errors->has('image'))
					<span class="help-block">
						<strong>{{ $errors->first('image') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
					<label for="icon">Icon</label>
					<input 	id="icon" 
							type="text" 
							class="form-control" 
							name="icon" 
							value="{{ old('icon') }}"
							placeholder="Fill icon of group"
							required>
					@if ($errors->has('icon'))
					<span class="help-block">
						<strong>{{ $errors->first('icon') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					<label for="description">Description</label>
					<input 	id="description" 
							type="text" 
							class="form-control" 
							name="description" 
							value="{{ old('description') }}"
							placeholder="Fill description of group"
							required>
					@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<label for="tags">Tags</label>
					<br>
					<?php $i = 0; ?>
					@foreach($tags as $tag)
						<div style="display: inline-block; width: 100px;">
							<input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->name}}
						</div>
						<?php $i++; ?>
						@if($i%3 == 0)
							<br>
						@endif
					@endforeach
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-share" aria-hidden="true"></i> Create</button>
			</div>
		</form>
	</div>
@stop