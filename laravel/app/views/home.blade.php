@extends('template') 
@section('content') 
<!-- header part with JS presentation added -->
@include('home.header')
<!-- Page Content -->
<div class="container content">
	<!-- Marketing Icons Section -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{{ $actualitiesTitle }}}</h1>
		</div>
		@foreach($actualities as $actuality)
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>
						<i class="fa fa-fw fa-check"></i> {{{ $actuality->title }}}
					</h4>
				</div>
				<div class="panel-body">
					<p>{{{ $actuality->content }}}</p>
					@if($actuality->reference != null)
					<a href="{{ URL::route('events'). '#' . $actuality->reference}}" class="btn btn-default">Více...</a>
					@endif
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!-- /.row -->
	<hr>
</div>
@stop
