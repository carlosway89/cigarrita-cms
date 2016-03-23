<!-- Header -->
<header>
    <div class="container" element-block="slider">
        <div class="intro-text">
            <div class="intro-lead-in" element-object="block" element-contenido>{{block.header}}</div>
            <div class="intro-heading" element-object="block" element-contenido >{{block.subheader}}</div>
            
        </div>
    </div>
</header>
<!-- Services Section -->
<section id="services" element-block="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center" >
                <h2 class="section-heading" element-object="block" element-contenido >{{block.header}}</h2>
                <h3 class="section-subheading text-muted" element-object="block" element-contenido >{{block.subheader}}</h3>
            </div>
        </div>
        <div class="row text-center element-sortable" >
            <div class="col-md-4 item-sortable" element-post element-object="post" >
                <p class="text-center block-center" element-contenido>{{post.source}}</p>
                <h4 class="service-heading" element-contenido >{{post.header}}</h4>
                <p class="text-muted" element-contenido >{{post.subheader}}</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid Section -->
<section id="projects" class="bg-light-gray" element-block="projects">
    <div  id="portafolio" class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" element-object="block" element-contenido>{{block.header}}</h2>
                <h3 class="section-subheading text-muted" element-object="block" element-contenido>{{block.subheader}}</h3>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 col-sm-6 portfolio-item " element-post data-add-hide="true">
                <a href="javascript:;;" class="portfolio-link" data-toggle="modal" data-target="#portfolioModal{{post.idpost}}">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <div element-contenido="non-editor">{{post.source}}</div>
                    
                </a>
                <div class="portfolio-caption"   >
                    <h4 element-contenido="non-editor">{{post.header}}</h4>
                    <p style="height: 100px;overflow: hidden;"  class="text-muted" element-contenido="non-editor">{{post.teaser}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal{{post.idpost}}" element-post data-add-hide="true" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 element-contenido="non-editor">{{post.header}}</h2>
                            <p class="item-intro text-muted" element-contenido="non-editor">{{post.subheader}}</p>
                            <div class="img-responsive img-centered" element-contenido="non-editor">{{post.source}}</div>
                            
                            <p element-contenido="non-editor">{{post.details}}</p>
                            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Portafio modals-->
</section>

<!-- About Section -->
<section id="about" element-block="about"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" element-object="block" element-contenido >{{block.header}}</h2>
                <h3 class="section-subheading text-muted" element-object="block" element-contenido >{{block.subheader}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <li element-post element-object="post" >
                        <div class="timeline-image" element-contenido>
                            {{post.source}}                        
                        </div>
                        <!-- <img class="img-circle img-responsive" src="{{post.source}}" alt=""> -->
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading" element-contenido>{{post.header}}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted" element-contenido>{{post.subheader}}</p>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <div class="timeline-image">
                            <h4>Be Part
                                <br>Of Our
                                <br>Story!</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="bg-light-gray" element-block="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" element-object="block" element-contenido>{{block.header}}</h2>
                <h3 class="section-subheading text-muted" element-object="block" element-contenido>{{block.subheader}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" element-post element-object="post">
                <div class="team-member">
                    <div class="img-responsive" style="height: 300px;overflow: hidden;" element-contenido>{{post.source}}</div>
                    <h4 element-contenido>{{post.header}}</h4>
                    <p class="text-muted" element-contenido>{{post.subheader}}</p>
                    <ul class="list-inline social-buttons">
                        <li><a href="{{post.tw_link}}"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="{{post.fb_link}}"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="{{post.li_link}}"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div> -->
    </div>
</section>

<!-- Clients Aside -->
<aside class="clients" element-block="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6" element-post element-object="post" data-type="slider">
                <a href="{{post.header}}">
                    <img src="{{post.source}}" class="img-responsive img-centered" alt="">
                </a>
            </div>
        </div>
    </div>
</aside>

<!-- Contact Section -->
<section id="contact" element-block="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" element-object="block" element-contenido>{{block.header}}</h2>
                <h3 class="section-subheading text-muted" element-object="block" element-contenido>{{block.subheader}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" element-post element-object="post" data-type="slider">
                <div element-contenido element-form >{{post.subheader}}</div>
                <!--contact-->
            </div>
        </div>
    </div>
</section>