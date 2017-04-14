<?php
$this->title = 'Услуги';
?>

<?php
$service[0] = null;
if(!empty($allServices)):
  foreach($allServices as $oneService):
    $service[] =
      [
        'name' => $oneService->name,
        'text' => $oneService->text,
      ];
  endforeach;
endif;
?>

<div class="wrap">
  <div class="container home-apoint">
    <div class="row">
      <div class="span12 home-apoint-text">
        <h2>Услуги</h2>
      </div>
    </div>
  </div>
</div>

<!--Начало Услуги-->
<div class="wrap margin-block">
  <div class="container">

    <div class="row">
      <div class="span12">
        <?= $service[1]['text'] ?>
      </div>
    </div>

    <div class="row">
      <?php for($i=2; $i<=4; $i++): ?>
        <div class="span4 home-feature">
          <div class="service-feature">
            <?= $service[$i]['name'] ?>
          </div>
            <p>
              <?= $service[$i]['text'] ?>
            </p>
        </div>
      <?php endfor; ?>

    </div>
    
    <div class="row services">
      <?php for($i=5; $i<=8; $i++): ?>
        <div class="span6 service">
          <img class="item-avatar-left" src="../images/home/service-<?= $i ?>.png" alt="<?= $service[$i]['name'] ?>"/>
          <h4>
            <?= $service[$i]['name'] ?>
          </h4>
              <?= $service[$i]['text'] ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</div>
<!--Конец Услуги-->
