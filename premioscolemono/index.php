<?php

/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */



/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */





/** Loads the WordPress Environment and Template */

require('../wp-blog-header.php');


get_header(premios); 


$van_page_type = van_page_type(); 
?>



	


	

		<!-- BEGIN MAIN -->
			
	<div id="main-content" style="width: 940px; background:#FFFFFF; text-decoration:none;" >


		
		<a href="http://colemono.com/resultados-premios-colemono-2013/"><img src="<?php echo get_template_directory_uri(); ?>/images/premios/juego-ano.jpg" /></a>







			<div id="categorias">
				<div id="comparte">
						<img id="logo-cole" src="<?php echo get_template_directory_uri(); ?>/images/premios/logo-cole.png">
						<div id="compartir">
						<img src="<?php echo get_template_directory_uri(); ?>/images/premios/compartir-p.png" />
						<div id="botones">
						<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fcolemono.com%2Fpremioscolemono%2F&amp;width=70&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=173339252747096" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:65px;" allowTransparency="true"></iframe>
						<div class="fb-share-button" data-href="http://colemono.com/premioscolemono/" data-width="100" data-type="box_count" style="margin-right: 4px;"></div>
						<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://colemono.com/premioscolemono" data-count="vertical" data-text="" data-via="Cole_mono" ></a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>											
						<?php dd_google1_generate('Normal') ?>	
						</div>
					
						</div>
				</div>
				
				<div id="cont">
					<p id="txt">Ya llegó la premiación más esperada por los usuarios de Colemono, nos referimos a la primera edición de los Premios Colemono en su versión 2013. Donde junto a nuestra comunidad de usuarios seleccionaremos a lo mejor que ha aparecido este año en el mundo de los videojuegos.<br/><br/>

								Contamos con un total de 26 categorías, donde en todas podrás dejar tu voto y así expresar tu opinión al respecto.<br/><br/>

								¡No esperes más! Comienza a votar desde ya.

					<br/><br/></p>
				</div>

				
					
				

				<img class="width" src="<?php echo get_template_directory_uri(); ?>/images/premios/auspicio.png">
				<img class="width" src="<?php echo get_template_directory_uri(); ?>/images/premios/categorias.png">
				<div class="mj" onclick="location.href='http://colemono.com/vota-por-el-juego-del-ano/';"><a href="http://colemono.com/vota-por-el-juego-del-ano/">Mejor juego del año</a></div>
				
				<div id="btncategorias">



							
							<div class="btn" ><a href="http://colemono.com/vota-por-nueva-franquicia/">Mejor nueva franquicia</a></div>
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-rebootremake/">Mejor Reboot/Remake</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-la-desilusion-del-ano/">Desilusión del año</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-la-mejor-promesa/">Mejor promesa</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-juego-desde-japon/">Mejor juego desde Japón</a></div>							
							<div class="btn" ><a href="http://colemono.com/vota-por-la-consola-mas-prometedora/">Consola más prometedora</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-la-mejor-consola-de-7ma-generacion/">Mejor consola 7ma gen</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-soundtrack/">Mejor Soundtrack</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-momento-colemono-2013/">Momento Colemono 2013</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-juego-que-pocos-jugaron/">Mejor juego que pocos jugaron</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-fail-del-ano/">Fail! del año</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-trailer/">Mejor tráiler</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-juego-de-plataformas/">Mejor juego de plataformas</a></div>
							<div class="btn" ><a href="http://colemono.com/vota-por-la-mejor-noticia/">Mejor noticia</a></div>
							<div class="btn" ><a href="http://colemono.com/vota-por-la-mejor-historia/">Mejor historia</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-la-mejor-secuelaregreso/">Mejor secuela/regreso</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mayor-ausente/">Mayor ausente</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-juego-de-carreras/">Mejor juego de carreras</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-juego-de-futbol/">Mejor juego de fútbol</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-juego-de-peleas/">Mejor juego de peleas</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-fps/">Mejor First Person Shooter</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-personaje/">Mejor personaje</a></div>	
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-juego-de-pc/">Mejor juego de PC</a></div>
							<div class="btn" ><a href="http://colemono.com/vota-por-el-mejor-juego-portatil/">Mejor juego portátil</a></div>
							
							
						</div>

						<div class="mj" ><a href="http://colemono.com/anita-award/">ANITA AWARD</a></div>		


				</div>



					<div id="nominacion">

						<img class="width" src="<?php echo get_template_directory_uri(); ?>/images/premios/nominacion.png">

							<p id="txt">Aquí es donde podrás nominar tu contenido favorito en Colemono, solo entra a cada categoría y comenta por el que consideras: El mejor podcast sin Hogar, El mejor Rock and Games y La mejor nota que ha sido publicada en tu página de videojuegos.

						Al final contabilizaremos lo votos y seleccionaremos en nuestro show en vivo a los más votados :)

					<br/><br/></p>







							<div id="btncategorias">




								<div class="btn"><a href="http://colemono.com/el-mejor-podcast-sin-hogar/">Mejor Podcast sin Hogar</a></div>
								<div class="btn"><a href="http://colemono.com/el-mejor-rock-and-games/">Mejor Rock & Games</a></div>	
								<div class="btn"><a href="http://colemono.com/la-mejor-nota-del-ano/">Mejor nota</a></div>	
								<div class="btn" style="margin: 0 auto 20px auto ; clear: both; float: none;" ><a href="http://colemono.com/el-cancer-malo-del-ano/">El cáncer malo del año</a></div>	
								
							
							</div>

					</div>

				<div id="premiacion">
					<img class="width" src="<?php echo get_template_directory_uri(); ?>/images/premios/premiacion.png">
					<p id="txt">

														Como nuestra intención es hacer un show lo más entretenido posible, es que al finalizar las votaciones para el día 31 de diciembre realizaremos la premiación como corresponde.
						<br/><br/>Así es como para el día 8 de enero a las 20:30hrs. desarrollaremos un programa totalmente en vivo y en directo vía streaming. Este lo podrán ver directamente desde el mini-sitio de los PremiosColemono, y también podrás asistir al InsertCoint Bar, desde donde haremos la transmisión.<br/><br/>
						¡No se lo pierdan!









						<br/><br/><p>

				</div>



					<div id="Noticias">
						<img class="width" src="<?php echo get_template_directory_uri(); ?>/images/premios/noticias.png">
				
							  <?php 
         
             query_posts("cat=2023&"); //ID de la categoria 
				            if (have_posts()) : while (have_posts()) : the_post() ?>         
				      
				         <div id="post">
				                     
				      <?php get_template_part( 'partials/content', get_post_format() );  ?>
				         </div>
				      
				         <?php  endwhile; endif; ?>







					</div>

				
			

		</div>

		<!-- END MAIN -->
</div>


<?php get_footer(); ?>