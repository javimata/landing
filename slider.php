<?php
$promocion = array(
    'titulo' => 'PROMOCIÓN SEPTIEMBRE',
    'subtitulo' => 'Haz tu reservación hoy y obten 30% de descuento',
    'descripcion' => 'Aplica reservando desde nuestro formulario',
    'txt_btn' => 'COTIZA',
    'link_btn' => '#',
    'class_btn' => 'btn btn-primary',
    'attr_btn' => 'data-toggle="modal" data-target="#popup_cotiza"'
);
$slider = array(
    '1' => array(
        'img' => 'images/slider-01.jpg',
        'promo' => 1
    ),
    '2' => array(
        'img' => 'images/slider-02.jpg',
        'promo' => 1
    ),
    '3' => array(
        'img' => 'images/slider-03.jpg',
        'promo' => 1
    )
);
?>

			<div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#000;padding:0px;margin-top:0px;margin-bottom:0px;max-height:1000px;z-index:2">
				<div id="rev_slider_2_1" class="rev_slider fullwidthabanner" style="display:none;max-height:1000px;height:1000px;">
					<ul>	

                        <?php foreach ($slider as $key => $slide): ?>
						<!-- SLIDE  <?php echo $key; ?>-->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
							<!-- MAIN IMAGE -->
							<img src="<?php echo $slide{'img'}; ?>"  alt=""  data-bgposition="center" data-bgfit="cover" data-bgrepeat="no-repeat" />
							<!-- LAYERS -->

                            <?php if ( $slide{'promo'} == 1 ): ?>
							<!-- LAYER NR. 1 -->
							<div class="tp-caption a_box sfr tp-resizeme"
								data-x="10"
								data-y="250" 
								data-speed="0"
								data-start="1"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.1"
								data-endelementdelay="0.1"
								data-endspeed="0"
								style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
								<h2><?php echo $promocion['titulo'] ?></h2>
								<h4><?php echo $promocion['subtitulo'] ?></h4>
								<p><?php echo $promocion['descripcion'] ?></p>
								<a href="<?php echo $promocion['link_btn']; ?>" class="<?php echo $promocion['class_btn'] ?>" <?php echo $promocion['attr_btn'] ?>><?php echo $promocion['txt_btn'] ?></a>
							</div>
                            <?php endif; ?>
						</li>                        
                        <?php endforeach; ?>
			
					</ul>
				
				<!-- 
				Este div muestra la linea de progreso, con clase tp-bottom se muestra en la parte de abajo, 
				para ocultarla usar CSS style="display:none; visibility: hidden !important;"
				-->
				<div class="tp-bannertimer tp-bottom" style="display:none; visibility: hidden !important;"></div>  
				</div>

			</div>