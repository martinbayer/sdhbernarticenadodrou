@extends('template') @section('content')

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
		<!-- Map Column -->
		<div class="col-md-8">
			<!-- Embedded Google Map -->
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2585.373704567011!2d17.947567!3d49.609559!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4713eacce433dcb3%3A0xdd76428b0831533f!2sSDH+Bernartice+nad+Odrou!5e0!3m2!1sen!2s!4v1420564139844"
				width="100%" height="400" marginheight="0" marginwidth="0" frameborder="0" style="border: 0"></iframe>
		</div>
		<!-- Contact Details Column -->
		<div class="col-md-4">
			<h3>{{{ $subtitle }}}</h3>
			<p>
				{{{$main_contact->city}}} {{{$main_contact->number}}}<br>{{{$main_contact->zipcode}}}<br>
			</p>
			<p>
				<i class="fa fa-envelope-o"></i> <abbr
					title="{{{$contact_email_label}}}">{{{$contact_email_label_short}}}</abbr>:
				<a href="mailto:{{{$main_contact->email}}}">{{{$main_contact->email}}}</a>
			</p>
			
			<hr>
			<h3>{{{ $mayorcontacttitle }}}</h3>
			<p>
				<i class="fa fa-male"></i> <abbr title="{{{$contact_name_label}}}">{{{$contact_name_label_short}}}</abbr>:
				{{{$mayor_contact->name}}}
			</p>
			<p>
				<i class="fa fa-phone"></i> <abbr title="{{{$contact_phone_label}}}">{{{$contact_phone_label_short}}}</abbr>:
				{{{$mayor_contact->phone}}}
			</p>			
			<p>
				<i class="fa fa-envelope-o"></i> <abbr
					title="{{{$contact_email_label}}}">{{{$contact_email_label_short}}}</abbr>:
				<a href="mailto:{{{$main_contact->email}}}">{{{$mayor_contact->email}}}</a>
			</p>
			
			<hr>
			<h3>{{{ $rentcontacttitle }}}</h3>
			<p>
				<i class="fa fa-male"></i> <abbr title="{{{$contact_name_label}}}">{{{$contact_name_label_short}}}</abbr>:
				{{{$rent_contact->name}}}
			</p>
			<p>
				<i class="fa fa-phone"></i> <abbr title="{{{$contact_phone_label}}}">{{{$contact_phone_label_short}}}</abbr>:
				{{{$rent_contact->phone}}}
			</p>
			
			<hr>
			
			<ul class="list-unstyled list-inline list-social-icons">
				<li><a target="_blank"
					href="https://www.facebook.com/sdhbernarticenadodroumuzi"><i
						class="fa fa-facebook-square fa-2x"></i></a></li>
				<li><a target="_blank" href="#"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
				<li><a target="_blank" href="https://www.youtube.com/channel/UCTRbp4F2AMT_Ef-M6M0NmnQ/feed"><i class="fa fa-youtube-square fa-2x"></i></a></li>
				<li><abbr title="Více fotek na rajce.idnes.cz"><a target="_blank" href="http://hasicibernartice.rajce.idnes.cz/"><i class="fa fa-camera-retro fa-2x"></i></a></abbr></li>
			</ul>
			
		</div>
	</div>
	<!-- /.row -->
	<hr>
</div>
<!-- /.container -->
@stop
