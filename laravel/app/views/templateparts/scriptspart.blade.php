
<!-- jQuery -->
{{ HTML::script('css/bootstrap/js/jquery.js') }}
<!-- Bootstrap Core JavaScript -->
{{ HTML::script('css/bootstrap/js/bootstrap.min.js') }}

<!-- LESS used for dev -->
{{ HTML::script('js/less.js') }}

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>