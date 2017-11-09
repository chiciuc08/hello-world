<?php require_once('Connections/cc.php'); ?>
<?php require_once('check.php'); ?>
<?php 
$sql="SELECT grupa_elevi_nume FROM grupaElevi";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/indextemplate.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Catalog</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/custom-styles.css">
    <link rel="stylesheet" href="css/font-awesome.css">
	
     
	 <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/font-awesome-ie7.css">

      <script src="js/jquery.mobilemenu.js"></script>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script>
    $(document).ready(function(){
        $('.menu').mobileMenu();
    });
  </script>
      <!-- InstanceBeginEditable name="head" -->
      <!-- InstanceEndEditable -->
  </head>

  <body>
    <!-- InstanceBeginEditable name="denumire" -->
    <!-- InstanceEndEditable -->
   <a href="index.php"><div class="header-wrapper" >
      <div class="site-name"><!-- InstanceBeginEditable name="titlu" -->
        <h1>LICEUL TEORETIC CHICIUC</h1>
        <h1 style="font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif">&quot;MIHAI EMINESCU&quot;</h1>
        <p style="font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif">s. SLOBOZIA MARE</p>
        <h2>lorem ipsum dolor sit amet vivamus</h2>
      <!-- InstanceEndEditable --></div>
    </div></a>
    <!-- InstanceBeginEditable name="menubar" -->
    <div class="menu">
      <div class="navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fw-icon-th-list"></i> </button>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">acasa</a></li>
              <li><a href="#">despre noi</a></li>
              <li><a href="#">clase</a></li>
              <li><a href="#">Orar</a></li>
              <li><a href="#">profesori</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <!--/.navbar-collapse -->
        </div>
      </div>
      <div class="mini-menu">
        <label>
          <select name="select" class="selectnav">
            <option value="#" selected="">Home</option>
            <option value="#">About</option>
            <option value="#">→ Another action</option>
            <option value="#">→ Something else here</option>
            <option value="#">→ Another action</option>
            <option value="#">→ Something else here</option>
            <option value="#">Services</option>
            <option value="#">Work</option>
            <option value="#">Contact</option>
          </select>
        </label>
      </div>
    </div>
    <!-- InstanceEndEditable --><!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="banner">
      <div id="carousel-example-generic" class="carousel slide">
  
  <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="img/banner-image.jpg" alt="">
            <div class="carousel-caption">
              <h1>Morbi semuis</h1>
              <h2>Praesent dapibus, neque id cursus faucibus tortas augue eu vulputate</h2>
              <a href="#" class="btn">facilis</a>
            </div>
          </div>
          <div class="item">
            <img src="img/banner-image.jpg" alt="">
            <div class="carousel-caption">
              <h1>Morbi semuis</h1>
              <h2>Praesent dapibus, neque id cursus faucibus tortas augue eu vulputate</h2>
              <a href="#" class="btn">facilis</a>
            </div>
          </div>
          <div class="item">
            <img src="img/banner-image.jpg" alt="">
            <div class="carousel-caption">
              <h1>Morbi semuis</h1>
              <h2>Praesent dapibus, neque id cursus faucibus tortas augue eu vulputate</h2>
              <a href="#" class="btn">facilis</a>
            </div>
          </div>
        </div>

  <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <i class="fw-icon-chevron-left"></i>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <i class="fw-icon-chevron-right"></i>
      </a>
    </div>
    </div>
    <div class="container">
      <div class="featured-block">
          
        <!-- Example row of columns -->
        <div class="row">
          
            <div class="col-md-12">
            <div class="block">
            <div class="thumbnail">
              
              <div class="caption">
                  
                <h1><?php echo $_SESSION['numeUser']?> <?php echo $_SESSION['prenumeUser']?></h1>
                   <h1>SALUT</h1>
               <?php 
               
$grupaElevi="%{$_GET['varClasa']}%";
                if(($_GET['varClasa'])=="" && empty($_GET['numeElev'])){
               
               
                        $sql="SELECT grupaElevi.grupa_elevi_id, grupaElevi.grupa_elevi_nume FROM grupaElevi where grupa_elevi_id like ?";
               $stmt=$conn->prepare($sql);
$stmt->bind_param("s", $grupaElevi);
$stmt->execute();
     $stmt->bind_result($idGrupa, $numeGrupaRez);
    // output data of each row
    while($stmt->fetch()) {
    ?>
      <form action="catalog.php" methode="get">
        <button class="btn" type="submit">
        <?php echo  $numeGrupaRez;?>
    </button>
    <input type="hidden" name="varClasa" value="<?php echo $idGrupa?>"/>
        <input type="hidden" name="idClasa" value="<?php echo $numeGrupaRez?>"/>
    
    </form> 
        <?php
    
                }
  
    }
    


  else if(($_GET['varClasa'])!="" && empty($_GET['anScolar'])){
      
        $sqlElevi="SELECT DISTINCT info_oraScolara.ora_anInvatamint FROM `users` INNER JOIN elev_grupaElevi on users.users_id=elev_grupaElevi.elev_id
        INNER JOIN grupaElevi on elev_grupaElevi.grupaElev_id=grupaElevi.grupa_elevi_id INNER JOIN info_oraScolara ON info_oraScolara.ora_idElev = users.users_id 
        WHERE grupaElevi.grupa_elevi_id like ? ORDER BY info_oraScolara.ora_anInvatamint DESC
";
               $stmt=$conn->prepare($sqlElevi);
$stmt->bind_param("s", $grupaElevi);
$stmt->execute();
     $stmt->bind_result($clasa);
    // output data of each row
    ?><div>
        
    <table class="table table-hover"><thead>
        <tr>
          
            <th><?php echo "Grupa ".$_GET['idClasa'];?></th>
        </tr>
    </thead>
        <?php
    
    while($stmt->fetch()) {
       
       ?> <tr>
            <td>
            
            
            <form action="catalog.php"><button class="btn"><?php echo "Clasa ".$clasa?></button>
        <input type="hidden" name="varClasa" value="<?php echo $_GET['varClasa']?>"/>
        <input type="hidden" name="idClasa" value="<?php echo $_GET['idClasa']?>"/>
        <input type="hidden" name="anScolar" value="<?php echo $clasa?>"/>
        </form></td>
        </tr>
 <?php
         }
    ?></table>
    </div><?php
    }else if(($_GET['varClasa'])!="" && ($_GET['anScolar'])!="" && empty($_GET['idElev'])){
    echo "Clasa ".$_GET['anScolar'];
    $sqlClasa="SELECT DISTINCT users.users_id, users.users_nume, users.users_prenume FROM `users` 
    INNER JOIN elev_grupaElevi on users.users_id=elev_grupaElevi.elev_id INNER JOIN grupaElevi on elev_grupaElevi.grupaElev_id=grupaElevi.grupa_elevi_id 
    INNER JOIN info_oraScolara ON info_oraScolara.ora_idElev = users.users_id WHERE grupaElevi.grupa_elevi_id like ? and info_oraScolara.ora_anInvatamint 
    LIKE ? ORDER BY info_oraScolara.ora_anInvatamint DESC";
    $anScoala="%{$_GET['anScolar']}%";
    $stmt=$conn->prepare($sqlClasa);
$stmt->bind_param("ss", $grupaElevi, $anScoala);
$stmt->execute();
     $stmt->bind_result($id, $nume, $prenume);
    // output data of each row
    ?>
    <div>
        
    <table class="table table-hover"><thead>
        
        <tr>
          
            <th><?php echo "Grupa ".$_GET['idClasa'];?></th>
        </tr>
    </thead>
        <?php
    
    while($stmt->fetch()) {
       
       ?> <tr>
            <td>
            
            <?php echo $nume." ".$prenume;?>
            </td>
            <td><form name="elev" action="catalog.php" methode="POST">
                <button class="btn" type="submit">Note</button>
                <input type="hidden" name="varClasa" value="<?php echo $_GET['varClasa']?>"/>
        <input type="hidden" name="idClasa" value="<?php echo $_GET['idClasa']?>"/>
        <input type="hidden" name="anScolar" value="<?php echo $_GET['anScolar']?>"/>
        <input type="hidden" name="idElev" value="<?php echo $id?>"/>
                
            </form></td>
        </tr>
 <?php
         }
    ?></table>
    </div>
        <?php
    }else if(($_GET['varClasa'])!="" && ($_GET['anScolar'])!="" && ($_GET['idElev'])!=""){
        echo "se executa";
    }
  
              

$conn->close();
                ?>
                <p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, mod in, pharetra ultrici</p>
                <a class="btn" href="#">catalog</a>
              </div>
              </div>
            </div>
            </div>
            
          </div>
          
        </div> 
        <div class="ruler"></div>  
        </div>
        <div class="container">
          <div class="featured-item">
            <div class="col-md-6">
            <div class="block">
              <div class="block-title">
                <h1>Cras ornare tristi</h1>
                <h2>Vivamus vestibulum nulla nec ante  pellentesque</h2>
              </div>
              <ul>
                <li class="col-md-6"> 
                  <div class="user-info">
                    <i class="fw-icon-user icon"></i>
                    <h1>Tim nulla nec </h1>    
                    <p>Cuibstui ipsum dolor sit amet, consectetu</p>
                 </div>
               </li>
                <li class="col-md-6">
                  <div class="user-info">
                    <i class="fw-icon-pencil icon"></i>
                    <h1>Vivamus mol</h1>    
                    <p>Phasellus ultrices nulla quis nibh lorem</p>
                 </div>
                </li>
                <li class="col-md-6">
                  <div class="user-info">
                    <i class="fw-icon-tag icon"></i>
                    <h1>Phas ellus</h1>    
                    <p>Aliquam erat volutpat. Nam dui mi, tinci</p>
                 </div>
                </li>
                <li class="col-md-6">
                  <div class="user-info">
                    <i class="fw-icon-wrench icon"></i>
                    <h1>Fusce lobortis</h1>    
                    <p>Class aptent taciti sociosqu ad litora</p>
                 </div>
                </li>
                <li class="col-md-6">
                  <div class="user-info">
                    <i class="fw-icon-umbrella icon"></i>
                    <h1>Sed adipiscing</h1>    
                    <p class="last space">Praesent dapibus, neque id cursus</p>
                 </div>
                </li>
                <li class="col-md-6">
                  <div class="user-info">
                    <i class="fw-icon-coffee icon"></i>
                    <h1>Nam convallis</h1>    
                    <p class="last">Lorem ipsum dolor sit amet, consectetuer </p>
                 </div>
                </li>
              </ul>
            </div>
            </div>
            <div class="col-md-6">
              <div class="block">
                <div class="block-title">
                    <h1>Aliquam tincidunt</h1>
                    <h2>Integer vitae libero ac risus egestas placerat</h2>
                </div>
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading accordion-caret">
                        <h4 class="panel-title">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Donec quis dui at dolor tempor
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra 
                                      ultricies in, diam. Sed arcu. Cras consequat.</div>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading accordion-caret">
                        <h4 class="panel-title">
                          <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Vivamus molestie gravida turpis
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra 
                                      ultricies in, diam. Sed arcu. Cras consequat.</div>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading accordion-caret">
                        <h4 class="panel-title">
                          <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Fusce lobortis lorem at ipsum semper 
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra 
                                      ultricies in, diam. Sed arcu. Cras consequat.</div>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading accordion-caret">
                        <h4 class="panel-title">
                          <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Nam convallis pellentesque nisl
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra 
                                      ultricies in, diam. Sed arcu. Cras consequat.</div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ruler"></div>
        </div>
      <div class="container">
        <div class="featured-content">
          <div class="col-md-6">
            <div class="block">
              <img src="img/img5.jpg" alt="" class="img-spacing thumbnail">
              <h1>Quisque a lectus. Donec consectetuer ligua </h1>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. lentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin  laoreet viverra.
              </p>
              <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.
              </p>
              <a href="#" class="btn">more</a>
            </div>            
          </div>
          <div class="col-md-6">
            <div class="block">
              <img src="img/img6.jpg" alt="" class="img-spacing thumbnail">
              <h1>Sed adipiscing ornare risus Morbi est est</h1>
              <p>Cupsim  ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. lentesque aliquet nibh nec urna.In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula     sollicitudi.</p>
              <p>Vivamus ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>
              <a href="#" class="btn">more</a>
            </div>            
          </div>
        </div>
      </div> 
      <div class="footer-wrapper">
        <div class="site-content">
      <div class="container">
        <div class="row">
        
          <div class="block col-md-2 col-sm-6">
            <h1>Vitae lin</h1>
            <ul>
              <li><a href="#">Phasellus ultrices</a></li>
              <li><a href="#">Sed adipiscing lipsum</a></li>
              <li><a href="#">Nulla sed leoniton</a></li>
            </ul>
          </div>
          <div class="block col-md-2 col-sm-6">
            <h1>Luctrus</h1>
            <ul>
              <li><a href="#">Lorem ipsum</a></li>
              <li><a href="#">Donec nec justo</a></li>
              <li><a href="#">Morbi in se</a></li>
            </ul>
          </div>
          <div class="block col-md-2 col-sm-6">
            <h1>consetu</h1>
            <ul>
              <li><a href="#">Quisque a lectus</a></li>
              <li><a href="#">Donec consecte</a></li>
              <li><a href="#">Nulla sed leoniton</a></li>
            </ul>
          </div>
          <div class="block col-md-3">
            <h1>Praesent dapibus, neque id cursus faucibus</h1>
            <div class="input-group">
                <input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL">
                <span class="input-group-btn">
              <input type="submit" class="button btn btn-default" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
                </span>
            </div> 
          </div>
          <div class="block col-md-3">
            <h1> Aliquam quam lectusfacilisis auctor</h1>
            <ul class="social">
              <li><a href="#"><i class="fw-icon-twitter"></i></a></li>
              <li><a href="#"><i class="fw-icon-facebook"></i></a></li>
              <li><a href="#"><i class="fw-icon-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
        </div>
        
      </div>
      <div class="copy-rights">
      <div class="container">
        <div class="row">
          
            <div class="col-md-6">
              Copyright(c) website name. Designed by: <a href="http://www.alltemplateneeds.com"> www.alltemplateneeds.com</a>
            </div>
            <div class="col-md-6">
              Images from: <a href="http://www.wallpaperswide.com">http://wallpaperswide.com</a> / <a href="http://www.wallcoo.net"> www.wallcoo.net</a>
            </div>
            
          </div>
        </div>
      </div>
      </div>

      


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
    
  </body>
<!-- InstanceEnd --></html>
