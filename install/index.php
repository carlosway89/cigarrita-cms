<?php
	include_once ("generator.php"); 

	if (isset($_POST["action"])) {

		$dbhost=$_POST["dbhost"];
		$dbuser=$_POST["dbuser"];
		$dbpass=$_POST["dbpass"];
		$dbname=$_POST["dbname"];
		$language=$_POST["language"];
		$gen=new generator_model($dbhost,$dbuser,$dbpass,$dbname,$language);
		$res=$gen->create_db();
		$message="";
		if ($res=="1") {
			sleep(1);
			$res2=$gen->run_sql();
			if ($res2=="1") {
				sleep(1);
				$res3=$gen->create_config();
				if ($res3=="1") {
					sleep(3);
					header("Location: /installationCigarrita");
				}else{
					$message=$res3;
				}
			}else{
				$message=$res2;
			}
			
		}else{
			$message=$res;
		}
	}

	
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cigarrita Worker - CMS</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta name="description" content="Web Design and Develop, desarrollo y diseño web"/>
    <meta name="author" content="Cigarrita Worker"/>
    <meta name="keywords" content="Aplication, web, software, internet, design, developer, elance, SEO, remote work,CMS "/>

	<link rel="stylesheet" type="text/css" href="/assets/panel/css/bootstrap/bootstrap.css">
	<!-- MaterializeCSS -->
    <link rel="stylesheet" href="/assets/panel/css/materialize/materialize.css" /> 

	<link rel="stylesheet" type="text/css" href="/assets/editor/css/style-panel.css">

	<style type="text/css">
    	.control-label{
    		padding-top: 15px !important;
    	}
    </style>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="/assets/panel/js/bootstrap/bootstrap.min.js"></script>
	<!-- Materialize -->
    <script src="/assets/panel/js/materialize/materialize.min.js"></script>

    <script>
        function enableButton() {
            document.getElementById("submit_button").disabled = false;
        }
    </script>
</head>
<body>



	<div class="wrapper">

	  <!-- <header> ...  -->
	  
	    <div class="box">
	        <div class="row">
	        
	          <!-- main here -->

	            <div class="column col-lg-12" id="main">
	                <div class="padding">
	                    <div class="full col-lg-12 login-box" style="padding-bottom:30%;display: inline-block;">
	                      
	                        <!-- content -->

	                    	<div class="col-md-offset-2 col-md-8 panel panel-default">
	                    		
	                    		<div class="panel-body text-center">
	                    			<h5 class="">Pre-Configuracion <small>Website</small></h5><br>
	                  
	                                <br>
	                                <form method="POST" class="form-horizontal">
	                                	<?php if (isset($message)) {
	                                	?>
	                                	<div class="alert alert-danger text-left">
	                                		<p><?=$message?></p>
	                                	</div>
	                                	<?php }?>

	                                	<div class="form-group">
										    <label for="dbhost" class="col-sm-2 control-label">Host o Servidor:</label>
										    <div class="col-sm-10">
										    	<input type="text" class="form-control" name="dbhost" id="dbhost" placeholder="Host or Server" required>
											</div>
										</div>
										<div class="form-group">
										    <label for="dbname" class="col-sm-2 control-label">BD Nombre:</label>
										    <div class="col-sm-10">
										    	<input type="text" class="form-control" name="dbname" id="dbname" placeholder="Database Name or leave in blank to create default (cigarrita_web)">
											</div>
										</div>
										<div class="form-group">
										    <label for="dbuser" class="col-sm-2 control-label">BD Usuario:</label>
										    <div class="col-sm-10">
										    	<input type="text" class="form-control" name="dbuser" id="dbuser" placeholder="Database User" required>
											</div>
										</div>
										<div class="form-group">
										    <label for="dbpass" class="col-sm-2 control-label">BD Contraseña:</label>
										    <div class="col-sm-10">
										    	<input type="password" class="form-control" name="dbpass" id="dbpass" placeholder="Database Password" required>
											</div>
										</div>
										<div class="form-group">
										    <label for="language" class="col-sm-2 control-label">Languaje por defecto:</label>
										    <div class="col-sm-10">
										    	<select name="language" id="language" class="browser-default">
										    		<option value="de">Deutsch</option>
										    		<option value="es" selected>Español</option>
										    		<option value="en">Englich</option>
										    	</select>										    	
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-9">
	                                			<div class="alert alert-info">Antes de continuar aplica permisos 0777 <code>chmod -R 777</code> sobre la carpeta raiz.</div>
	                                		</div>
	                                	</div>
	                                    <input name="action" value="true" type="hidden" />
	                                    <button id="submit_button" class="btn red" type="submit" onclick="enableButton()">Continuar</button>
	                                </form>
	                    		</div>
	                    		
	                            
	                    	</div>
	                        
	  
	                      
	                    </div><!-- /col- -->
	                </div><!-- /padding -->
	            </div>
	          
	          <!-- /main here -->
	        
	        </div>
	    </div>
	</div>



	
</body>
</html>