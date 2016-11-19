<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;


$this->title = $name;
?>
<div class="site-error">
  
  <div class="wrap margin-block">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="no-page">
            <p class="title">404</p>
            <p>Такой страницы не существует.</p>
          </div>
        </div>
        <!--end span12-->
      </div>
      <!--end row-->
    </div>
    <!--end container-->
  </div>
  <!--end wrap-->

  <div class="wrap margin-block">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h3>К сожалению, запрашиваемая Вами страница не найдена..</h3>
          <br><br>
          <h4>Почему?</h4>
          <br>
          <p> - Возможно, что ссылка, по которой Вы пришли, неверна.</p>
          <p> - Быть может Вы неправильно указали путь или название страницы.</p>
          <p> - Либо страница была удалёна со времени Вашего последнего посещения.</p>
        </div>
        <!--end span12-->
      </div>
      <!--end row-->
    </div>
    <!--end container-->
  </div>
  <!--end wrap-->

</div>
