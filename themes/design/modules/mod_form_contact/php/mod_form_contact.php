<style type="text/css" >
	section#contact .form-group {
        margin-bottom: 15px !important;
    }
</style>

<div class="section-subheading text-muted" element-form="">
  <?php if(!$editor){?>
    <form id="contactForm" >
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input class="form-control" placeholder="Nombre Completo *" id="name" required="" data-validation-required-message="Please enter your name." type="text" />
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Email *" id="email" required="" data-validation-required-message="Please enter your email address." type="email" />
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Telefono o Celular *" id="phone" required="" data-validation-required-message="Please enter your phone number." type="tel" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <textarea class="form-control" placeholder="Mensaje *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
          </div>
        </div>
        <div class="clearfix">
          <br/>
        </div>
        <div class="col-lg-12 text-center">          
          <button class="btn btn-xl" type="submit">Enviar Mensaje</button>
        </div>
      </div>
    </form>
  <?php }else{?>
  <div>Form Contact Module</div>
  <?php }?>
</div>