@extends('template') 
@section('content')
<!-- Page Content -->
<div class="container content">
	<!-- Marketing Icons Section -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $page_content_title }}</h1>
		</div>
		@foreach($galleries as $gallery)
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>
						{{ $gallery->title }}
					</h4>
				</div>
				<div class="panel-body">
					<a href="{{URL::action('GalleryController@showGallery', array($gallery->foldername))}}">{{ HTML::image(Variables::GALLERIES_FOLDER.'/'.$gallery->photographs[0],$gallery->title, ['class'=>'img-responsive img-hover']) }}</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!-- /.row -->
	<hr>
</div>
@stop
