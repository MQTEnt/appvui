@extends('admin.layouts.master')
@section('title', 'Group Management')
@section('feature-title', 'Detail')
@section('back-page')
	<p><a href="{{route('group.index')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a></p>
@stop
@section('main-content')
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="box box-primary">
				<!-- form start -->
				<div class="box-body">
					<form id="formEdit" role="form" method="POST" action="{{ route('group.update', $group->id) }}">
						{{ csrf_field() }}
						<input name="_method" type="hidden" value="PUT">
						<div class="form-group">
							<label for="id">ID</label>
							<input type="text" 
							class="form-control" 
							name="id" 
							value="{{ $group->id }}"
							disabled>
						</div>

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name">Name</label>
							<input 	id="name" 
							type="text" 
							class="form-control" 
							name="name" 
							value="{{ $group->name }}"
							placeholder="Fill name of group">
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
							value="{{ $group->fandom }}"
							placeholder="Fill fandom of group">
							@if ($errors->has('fandom'))
							<span class="help-block">
								<strong>{{ $errors->first('fandom') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
							<label for="image">Image</label>
							<br>
							<img style="width: 400px; height: 300px; margin-bottom: 10px" src="{{$group->image}}" alt="">
							<input 	id="image" 
							type="text" 
							class="form-control" 
							name="image" 
							value="{{ $group->image }}"
							placeholder="Fill image of group">
							@if ($errors->has('image'))
							<span class="help-block">
								<strong>{{ $errors->first('image') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
							<label for="icon">Icon</label>
							<br>
							<img style="width: 400px; height: 300px; margin-bottom: 10px" src="{{$group->icon}}" alt="">
							<input 	id="icon" 
							type="text" 
							class="form-control" 
							name="icon" 
							value="{{ $group->icon }}"
							placeholder="Fill icon of group">
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
							value="{{ $group->description }}"
							placeholder="Fill description of group">
							@if ($errors->has('description'))
							<span class="help-block">
								<strong>{{ $errors->first('description') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group">
							<label for="tags">Tags</label>
							<br>
							<?php 
								$i = 0;
								$group_tags = $group->tags()->pluck('tag_id')->toArray();
							?>
							@foreach($tags as $tag)
							<div style="display: inline-block; width: 100px;">
								<input type="checkbox" 
								name="tags[]" 
								value="{{$tag->id}}"
								@if(in_array($tag->id, $group_tags))
									checked
								@endif> {{$tag->name}}
							</div>
							<?php $i++; ?>
								@if($i%3 == 0)
								<br>
								@endif
							@endforeach
						</div>
					</form>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<div class="col-lg-6">
						<button id="btnUpdate" type="button" class="btn btn-primary btn-block"><i class="fa fa-share"></i> Update</button>
					</div>
					<div class="col-lg-6">
						<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#alertModal"><i class="fa fa-trash-o"></i> <b>Delete</b></button>
					</div>
					<!-- Modal Alert -->
					<div class="modal fade" id="alertModal" role="dialog">
					 	<div class="modal-dialog modal-sm">
					 		<form id="deleteForm" role="form" method="POST" action="{{ route('group.destroy', $group->id) }}">
								{{ csrf_field() }}
								<input name="_method" type="hidden" value="DELETE">
						 		<div class="modal-content">
						 			<div class="modal-header">
						 				<h4 class="modal-title">Alert</h4>
						 			</div>
						 			<div class="modal-body">
						 				<p><i class="fa fa-trash" aria-hidden="true"></i> Are you sure to delete?</p>
						 			</div>
						 			<div class="modal-footer">
						 				<button type="submit" class="btn btn-success">Ok</button>
						 				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						 			</div>
						 		</div>
						 	</form>
					 	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script>
		$(document).ready(function(){
			$('#btnUpdate').click(function(){
				$('#formEdit').submit();
			})
		});
	</script>
@stop