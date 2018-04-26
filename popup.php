<div  class="modal fade popup-main" data-backdrop="static" id="popup_cotiza" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

			<div class="modal-header">
				<div class="logo-popup">
					<img src="images/logo-mini.jpg" alt="Fagor">
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="row">
					<div class="col-sm-12">
						<div class="popup-title" data-aos="flip-down" data-aos-delay="300">
							<h1>COTIZA <span class="nombre-producto"></span></h1>
							<span class="subtext">
								Llama al 01 800 714 0539 o deja tus datos aquí y muy pronto un asesor se pondrá en contacto.
							</span>
						</div>
					</div>
				</div>

				<div class="form-cotiza-popup">
					<form action="php/process.php" id="cotiza" class="cotiza">
						<div class="row">
							
							<div class="col-sm-12 form-group">
								<input type="text" id="nombre" class="form-control" placeholder="Nombre y Apellido *">
							</div>
							<div class="col-sm-6 form-group">
								<input type="text" id="telefono" class="form-control" placeholder="Teléfono *">
							</div>
							<div class="col-sm-6 form-group">
								<input type="email" id="email" class="form-control" placeholder="Email *">
							</div>
							<div class="col-sm-12 form-group">
								<textarea name="" id="comentarios" rows="2" class="form-control" placeholder="Comentarios"></textarea>
							</div>
							<div class="col-sm-12 form-group">
								<input type="hidden" name="producto" value="">
								<button class="btn btn-primary btn-popup btn-full">QUIERO RECIBIR COTIZACIÓN</button>
								<div class="caja_error">&nbsp;</div>
							</div>
							
						</div>
					</form>
				</div>

			</div>
        </div>

    </div>
</div>