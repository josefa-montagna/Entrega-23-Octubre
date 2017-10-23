<?php include('header.php')?>

<div class="container">
<div class="row">
<div class="col-sm-12 py-5">
  <?php
  $csv = array_map('str_getcsv', file('data/eleccion_diputados.csv'));
  array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
  array_shift($csv);
  ?>

  <table class="table table-bordered table-striped table-responsive">
              <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Género</th>
                      <th>Partido</th>
                      <th>Comunas</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $mujeres = 0; $hombres = 0;?>
                  <?php for($a = 0; $a < $total = count($csv); $a++){?>
                  <tr>
                      <td>
                      <?php if(($csv[$a]["Web Site"])==""){?>
                          <?php echo($csv[$a]["Candidato Nombre"])?>
                          <?php echo($csv[$a]["Candidato Apellido Paterno"])?>
                          <?php echo($csv[$a]["Candidato Apellido Materno"])?>
                      <?php }else{?>
                          <a href="<?php echo($csv[$a]["Web Site"])?>" target="_blank">
                              <?php echo($csv[$a]["Candidato Nombre"])?>
                              <?php echo($csv[$a]["Candidato Apellido Paterno"])?>
                              <?php echo($csv[$a]["Candidato Apellido Materno"])?>
                          </a>
                      <?php }?>
                      </td>
                      <td>
                          <?php if(($csv[$a]["Genero"])=="Femenino"){?>
                              <img src="http://www.guemil.info/wp-content/uploads/2016/07/02_Gv05-Woman.svg">
                              <?php $mujeres++?>
                          <?php }else{?>
                              <img src="http://www.guemil.info/wp-content/uploads/2016/07/01_Gv05-Man.svg">
                              <?php $hombres++?>
                          <?php }?>
                      </td>
                      <td><?php echo($csv[$a]["Partido Politico"])?></td>

  <td>  <?php echo($csv[$a]["Comunas"])?>
    <?php if(($csv[$a]["Lista/Pacto"])=="Frente Amplio"){?>
     <?php $frenteamplio++?>

    <?php }?>

    <?php if(($csv[$a]["Lista/Pacto"])=="Coalición Regionalista Verde"){?>
     <?php $coalicion++?>

    <?php }?>

    <?php if(($csv[$a]["Lista/Pacto"])=="Por Todo Chile"){?>
     <?php $portodo++?>

    <?php }?>

     <?php if(($csv[$a]["Lista/Pacto"])=="Independiente"){?>
     <?php $independiente++?>

    <?php }?>

    <?php if(($csv[$a]["Lista/Pacto"])=="Trabajadores revolucionarios"){?>
     <?php $revolucionarios++?>

    <?php }?>

       <?php if(($csv[$a]["Lista/Pacto"])=="Convergencia Democrática"){?>
     <?php $convergencia++?>

    <?php }?>

     <?php if(($csv[$a]["Lista/Pacto"])=="Unión Patriótica"){?>
     <?php $union++?>

    <?php }?>

    <?php if(($csv[$a]["Lista/Pacto"])=="Sumemos"){?>
     <?php $sumemos++?>

    <?php }?>

     <?php if(($csv[$a]["Lista/Pacto"])=="La fuerza de la Mayoria"){?>
     <?php $lafuerza++?>

    <?php }?>

      <?php if(($csv[$a]["Lista/Pacto"])=="Chile Vamos"){?>
     <?php $vamos++?>

    <?php }?>


                  </tr>
                  <?php };?>
              </tbody>
          </table>

  <hr id="numeros">

  <h3>Resultados del cálculo</h3>

  <div class="alert alert-danger">
  <h5>Los candidatos del Frente Amplio son <?php print $frenteamplio;?></h5>
  <h5>Los candidatos del Coalición Regionalista Verde son <?php print $coalicion;?></h5>
  <h5>Los candidatos del Por todo Chile son <?php print $portodo;?></h5>
  <h5>Los candidatos del Independiente son <?php print $independiente;?></h5>
  <h5>Los candidatos del Trabajadores revolucionarios son <?php print $revolucionarios;?></h5>
  <h5>Los candidatos del Convergencia Democrática son <?php print $convergencia;?></h5>
  <h5>Los candidatos de la Unión Patriótica son <?php print $union;?></h5>
  <h5>Los candidatos de Sumemos son <?php print $sumemos;?></h5>
  <h5>Los candidatos de La fuerza de la Mayoría son <?php print $lafuerza;?></h5>
  <h5>Los candidatos de Chile Vamos son <?php print $vamos;?></h5>

  </div>

  </div>
  </div>
  </div>
<?php include('footer.php')?>
