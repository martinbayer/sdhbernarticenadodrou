@extends('template') 
@section('content')
<!-- Page Content -->
<div class="container">

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				{{{ $page_content_title }}}
			</h1>
		</div>
	</div>
	@foreach($items as $item)
	<!-- Blog Post Row -->
	<div class="row">
		<div class="col-md-3">
				{{ HTML::image('images/equipment/'.$item->image,$item->title, ['class'=>'img-responsive img-hover']) }}
		</div>
		<div class="col-md-9">
			<h3>
				{{{ $item->title }}}
			</h3>
			<p>
				{{{ $item->content }}}
			</p>
		</div>
	</div>
	<!-- /.row -->
	<hr>
	@endforeach
	<h5><em>{{ $page_renting_ad }}</em></h5>
</div>
<!-- /.container -->


@stop
