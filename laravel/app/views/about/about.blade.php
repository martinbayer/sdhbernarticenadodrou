@extends('template') 
@section('content')

<!-- Page Content -->
<div class="container">

	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $page_content_title }}</h1>
		</div>
	</div>
	<!-- /.row -->

	@foreach($parts as $part)
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-3">
			{{ HTML::image('images/about/'.$part->image,$part->title, ['class'=>'img-responsive img-hover']) }}
		</div>
		<div class="col-lg-9">

			<ol class="breadcrumb">
				{{{ $part->title }}}
			</ol>
			<p>
				{{ $part->content }}
			</p>
		</div>
	</div>
	<hr />
	@endforeach
	<!-- /.row -->
	<hr>
</div>
@stop
