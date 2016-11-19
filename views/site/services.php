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

<!--Начало Заголовок-->
<div class="wrap">
  <div class="container home-apoint">
    <div class="row">
      <div class="span12 home-apoint-text">
        <h2>Услуги</h2>
      </div>
    </div>
    <!--Конец row-->
  </div>
  <!--Конец container-->
</div>
<!--Конец Заголовок-->

<!--Начало Услуги-->
<div class="wrap margin-block">
  <div class="container">
    <div class="row">
      <div class="span12">

        <?= $service[1]['text'] ?>

      </div>
      <!--Конец span12-->
    </div>
    <!--Конец row-->

    <div class="row">
      <div class="span4 home-feature">
        <div class="service-feature">
          <?= $service[2]['name'] ?>
        </div>

        <?= $service[2]['text'] ?>

      </div>
      <!--Конец home-feature-->

      <div class="span4 home-feature">
        <div class="service-feature">

          <?= $service[3]['name'] ?>

        </div>

        <?= $service[3]['text'] ?>

      </div>
      <!--Конец home-feature-->

      <div class="span4 home-feature">
        <div class="service-feature">
          <?= $service[4]['name'] ?>
        </div>

        <?= $service[4]['text'] ?>

      </div>
      <!--Конец home-feature-->
    </div>
    <!--Конец row-->


    <div class="row services">

      <div class="span6 service">
        <img class="item-avatar-left" src="../images/home/service-5.png" alt=""/>
        <h4>

          <?= $service[5]['name'] ?>

        </h4>

        <?= $service[5]['text'] ?>

      </div>
      <!--Конец span6-->

      <div class="span6 service">
        <img class="item-avatar-left" src="../images/home/service-6.png" alt=""/>
        <h4>

          <?= $service[6]['name'] ?>

        </h4>

        <?= $service[6]['text'] ?>

      </div>
      <!--Конец span6-->

      <div class="span6 service">
        <img class="item-avatar-left" src="../images/home/service-7.png" alt=""/>
        <h4>

          <?= $service[7]['name'] ?>

        </h4>

        <?= $service[7]['text'] ?>

      </div>
      <!--Конец span6-->

      <div class="span6 service">
        <img class="item-avatar-left" src="../images/home/service-8.png" alt=""/>
        <h4>

          <?= $service[8]['name'] ?>

        </h4>

        <?= $service[8]['text'] ?>

      </div>
      <!--Конец span6-->

    </div>
    <!--Конец row-->
  </div>
  <!--Конец container-->
</div>
<!--Конец Услуги-->
