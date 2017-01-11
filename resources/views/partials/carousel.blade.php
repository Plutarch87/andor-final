	
	<div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#theCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#theCarousel" data-slide-to="1"></li>
			<li data-target="#theCarousel" data-slide-to="2"></li>
		</ul>


		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="{{ url(asset("assets/images/carousel/karusel1.jpg")) }}" alt="Karusel1">
			</div>

			<div class="item">
				<img src="{{ url(asset("assets/images/carousel/karusel2.jpg")) }}" alt="Karusel2">
			</div>

			<div class="item">
				<img src="{{ url(asset("assets/images/carousel/karusel3.jpg")) }}" alt="Karusel3">
			</div>

		</div>

		<a class="left carousel-control" href="#theCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#theCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
@if(Auth::check())
	<a class="btn btn-danger" href="{{ route('carousel.index') }}">Promeni slike</a>
@endif

	</header>
</section>