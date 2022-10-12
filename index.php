	<?php require "header.php"; ?>
	<div id="middle">
		<div id="examples_outer">

			<div id="slider_container_1">

				<div id="SliderName">

					<a href="#1">
						<img src="img/031.jpg"width="1000px" title="Description from Image Title" />
					</a>
					<div class="SliderNameDescription">
						<img src="img/031.jpg" height="60" style="float:left;margin-right:5px;" />
					</div>					
					<a href="#2">
						<img src="img/02.png" />
					</a>
					<div class="SliderNameDescription">
						<img src="img/02.png" height="60" style="float:left;margin-right:5px;" />
					</div>
					<a href=""><img src="img/033.jpg" />	</a>
					<div class="SliderNameDescription">
						<img src="img/033.jpg" height="60" style="float:left;margin-right:5px;" />
					</div>
					<a href=""><img src="img/044.jpg" /></a>	
					<div class="SliderNameDescription">
						<img src="img/044.jpg" height="60" style="float:left;margin-right:5px;" />
					</div>	
					<a href=""><img src="img/9.jpg" /></a>	
					<div class="SliderNameDescription">
						<img src="img/9.jpg" height="60" style="float:left;margin-right:5px;" />
					</div>			
					
				</div>
				

				<script type="text/javascript">

					// we created new effect and called it 'demo01'. We use this name later.
					Sliderman.effect({name: 'demo01', cols: 10, rows: 8, delay: 10, fade: true, order: 'straight_stairs'});

					var demoSlider = Sliderman.slider({container: 'SliderName', width: 740, height: 520, effects: 'demo01',
						display: {
						pause: true, // slider pauses on mouseover
						autoplay: 3000, // 3 seconds slideshow
						always_show_loading: 200, // testing loading mode
						description: {background: 'transparent', opacity: 0.5, height: 90, position: 'bottom'}, // image description box settings
						loading: {background: 'transparent', opacity: 0.2, image: 'img/loading.gif'}, // loading box settings
						buttons: {opacity: 1, prev: {className: 'SliderNamePrev', label: ''}, next: {className: 'SliderNameNext', label: ''}}, // Next/Prev buttons settings
						 // navigation (pages) settings
						}});

					</script>

					
				</div>

			</div>

			
		</div>
		
		<?php require "footer.php"; ?>
		