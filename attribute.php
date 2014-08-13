<?php

$package = $_POST['package'];
$entity = $_POST['entity'];
$table = $_POST['table'];
$attributes = $_POST['attributes'];



?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
 
    <title>Spring MVC Generator</title>
 
    <!-- Bootstrap core CSS -->
    <link href="boot/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="boot/css/bootstrap-theme.min.css" rel="stylesheet">
 
    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
 
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
	
	
	</style>
  </head>
 
  <body role="document">
 
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SpringMVC Generator</a>
        </div>
        <div class="navbar-collapse collapse">
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
 
    <div class="container theme-showcase" role="main">
 
 <br/><br/><br/><br/><br/>
	
		
		
		
			<div class="tab-pane active" id="entity">
			
			<div class="panel panel-default">
			<div class="panel-body">

				<div class="col-md-12">
				
					<form method="post" action="home.php">
					
					
						<div class="form-group">
							<div class="input-group input-group-sm">
								
								<input type="hidden" name="attributes" class="form-control"  value="<?php echo $attributes; ?>">
							</div>
						</div>
						
					
						<div class="form-group">
							<div class="input-group input-group-sm">
								<span class="input-group-addon">Package</span>
								<input type="text" name="package" class="form-control" value="<?php echo $package; ?>" >
							</div>
						</div>
					
						<div class="form-group">

							<div class="input-group input-group-sm">
								<span class="input-group-addon">@Entity</span>
								<input type="text" name="entity" class="form-control" value="<?php echo $entity; ?>" >
							</div>
						</div>
					
						<div class="form-group">
							<div class="input-group input-group-sm">
								<span class="input-group-addon">@Table</span>
								<input type="text" name="table" class="form-control" value="<?php echo $table; ?>" >
							</div>
						</div>
						
						
						
						<br/>
						
						<table class="table ">
								<tr>
									<td>
										<div class="form-group">

											<div class="input-group input-group-sm">
												<span class="input-group-addon">ID Name</span>
												<input type="text" id="name" name="idname" class="form-control" placeholder="entity ID name">
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">

											<div class="input-group input-group-sm">
												<span class="input-group-addon">Datatype</span>
												<select id="datatype" name="idtype" class="form-control">
													<option value="Integer"> Integer</option>
													<option value="double"> double</option>
													<option value="BigDecimal"> BigDecimal</option>
													<option value="String"> String</option>
													<option value="Long"> Long</option>
												</select>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">

											<div class="input-group input-group-sm">
												<span class="input-group-addon">@Column</span>
												<input type="text" id="column" name="idcol" class="form-control" placeholder="column name">
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">

											<div class="input-group input-group-sm">
												<span class="input-group-addon">Generation Type</span>
												<select name="generation" id="mapping" class="form-control">
													<option value="Auto"> Auto</option>
													<option value="OneToOne"> OneToOne</option>
													
													
												</select>
											</div>
										</div>
									</td>
								
								
								
								</tr>
							</table>
						
						
						<?php 
						
						
							for($i=0; $i<$attributes;$i++){ ?>
							
							
							
							
							<table class="table ">
								<tr>
									<td>
										<div class="form-group">

											<div class="input-group input-group-sm">
												<span class="input-group-addon">Name</span>
												<input type="text" id="name" name="attname[]" class="form-control" placeholder="attribute name">
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">

											<div class="input-group input-group-sm">
												<span class="input-group-addon">Datatype</span>
												<select id="datatype" name="datatype[]" class="form-control">
													<option value="Integer"> Integer</option>
													<option value="double"> double</option>
													<option value="BigDecimal"> BigDecimal</option>
													<option value="String"> String</option>
													<option value="Long"> Long</option>
												</select>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">

											<div class="input-group input-group-sm">
												<span class="input-group-addon">@Column</span>
												<input type="text" id="column" name="column[]" class="form-control" placeholder="attribute name">
											</div>
										</div>
									</td>
									<td>
										<div class="form-group">

											<div class="input-group input-group-sm">
												<span class="input-group-addon">Mapping</span>
												<select name="mapping[]" id="mapping" class="form-control">
													<option value="none"> none</option>
													<option value="OneToOne"> OneToOne</option>
													<option value="OneToMany"> OneToMany</option>
													<option value="ManyToOne"> ManyToOne</option>
													<option value="ManyToMany"> ManyToMany</option>
													
												</select>
											</div>
										</div>
									</td>
								
								
								
								</tr>
							</table>
							
							<?php
							}
						
						?>
						
					
					
				</div> 
				</div>
						
		<div class="panel-footer">
		
			<button type="submit"  class="btn btn-success ">Generate Code</button>
			
			</form>
			
		</div>
		
		
			</div>
			
		
			
		
		</div>
		
      
 
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="boot/js/bootstrap.min.js"></script>
    <script src="boot/js/docs.min.js"></script>
	
  </body>
</html>

