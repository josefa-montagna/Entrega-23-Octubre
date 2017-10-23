<?php include('header.php')?>

<div class="container">
<div class="row">
<div class="col-sm-12 py-5">


<?php
$csv = array_map('str_getcsv', file('data/eleccion_senadores.csv'));
array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
array_shift($csv);
?>

<table class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Género</th>
      <th>Partido/Pacto</th>
      <th>Lista/Pacto</th>
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
    <?php }else {?>
      <img src="http://www.guemil.info/wp-content/uploads/2016/07/01_Gv05-Man.svg">
      <?php $hombres++?>
    <?php }?>
    </td>
      <td><?php echo($csv[$a]["Partido Politico"])?></td>
      <td><?php echo($csv[$a]["Lista/Pacto"])?></td>
    </tr>


    <?php };?>

  </tbody>
</table>

<div class="alert alert-danger">
  <h5><?php print($mujeres)?> mujeres están llendo como senadores</h5>
  <h5> <?php print($hombres)?> hombres están llendo como senadores</h5>

</div>
</div>
</div>


<?php include('footer.php')?>
