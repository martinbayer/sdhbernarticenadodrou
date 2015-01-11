@include('templateparts.headpart')
<body>
	@include('templateparts.navigation')

	<!-- Page Content -->

	{{ HTML::style('js/photogallery_react/gallery.less',array('rel'=>'stylesheet/less')) }} 
	{{ HTML::script('js/photogallery_react/less.js') }} 
	{{ HTML::script('js/photogallery_react/react.js') }} 
	{{ HTML::script('js/photogallery_react/jquery.min.js') }} 
	{{ HTML::script('js/photogallery_react/gallery.js') }}

	<div id="gallery"></div>

	<script>
 		var data={
 		          "title": "Testing gallery", "folder": {{'"'.$folder.'"' }}, "photonames": {{'["'.implode('","',$photonames).'"]'}}};
 		React.render(React.createElement(ImagesCreator,{data: data},"hello"),document.getElementById('gallery'));
		</script>

</body>
</html>