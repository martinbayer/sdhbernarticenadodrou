<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
	<!-- Indicators -->
		<ol class="carousel-indicators">
		@for ($i = 0; $i < count($photographs); $i++)
			@if($i === $active_idx)
			<li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
			@else
			<li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
			@endif
			</li>
		@endfor
	</ol>


	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		@for ($i = 0; $i < count($photographs); $i++)
		@if($i === $active_idx)
		<div class="item active">
		@else
		<div class="item">
		@endif
			<div class="fill"
				style="background-image: url('{{ URL::to(Variables::HOME_IMAGES_FOLDER.'/'.basename($photographs[$i])) }}') ;">
			</div>
		</div>
		@endfor
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="icon-prev"></span>
	</a> <a class="right carousel-control" href="#myCarousel"
		data-slide="next"> <span class="icon-next"></span>
	</a>
</header>