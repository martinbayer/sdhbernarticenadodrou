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

	<!-- Content Row -->
	<div class="row">
		<!-- Sidebar Column -->
		<div class="col-md-3">
			<div class="list-group">
				@foreach($events as $event)
				 {{ HTML::link('#'.$event->shortcut, $event->title, array('class' => 'list-group-item inactive', 'onclick' => 'scroll("'.$event->shortcut.'");')) }}
				@endforeach
				@if($archive)
					{{ HTML::link(URL::route('events'),$oposite_events_menuitem, array('class' => 'list-group-item')) }}
				@else
					{{ HTML::link(URL::route('archive_events'),$oposite_events_menuitem, array('class' => 'list-group-item')) }}
				@endif
			</div>
		</div>
		@foreach($events as $event)
		<!-- Content Column -->
		<div  id="{{{ $event->shortcut }}}" class="col-md-9 ">
			<h4>{{ HTML::link('#'.$event->shortcut, $event->title) }}</h4>
			<h5>{{ $event->getDateTimeRange() }}</h5>
			<p>{{ $event->html_description }}</p>
		</div>
		@endforeach
		
	</div>
	<!-- /.row -->

	<hr>



</div>
<!-- /.container -->
<script type="text/javascript">
$('a.inactive').click(function(event) { 
	event.preventDefault();
	return false; 
});
function scroll(partId){
	$partOffset = $("#"+partId).offset();
	$scrollTo = $partOffset.top - 50;
	$("html, body").delay(500).animate({scrollTop: $scrollTo }, 1000);
}
</script>
@stop
