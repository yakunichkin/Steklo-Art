<?php
$this->title = 'Контакты';
?>

<!--Начало Заголовок Контакты-->
<div class="wrap">
  <div class="container home-apoint">
    <div class="row">
      <div class="span12 home-apoint-text">
        <h2>Контакты</h2>
      </div>
    </div>
    <!--Конец row-->
  </div>
  <!--Конец container-->
</div>
<!--Конец Заголовок Контакты-->


<div class="site-contact">

    <br>
    <div class="wrap margin-block">
      <div class="container">

        <!-- Карта скрыта, но если она будет нужна, ее можно включить - удалив комментарии

        <div class="row">

          <div class="span12 g-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59862.774296618896!2d35.06930801896875!3d48.46447525442618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1440191279851" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

          </div>
        </div>

        Чтобы включить карту, удалить эти комментарии -->

        <div class="row">
          <div class="span9">

            <header class="home-title">
              <h3>Форма обратной связи:</h3>
            </header>

            <div id="contact-container" class="margin-t clearfix">
              <form method="post" id="my-form" action='../include/contact-process.php'>

                <input type="text" name="author" class="comm-field"  value="Имя" size="22" tabindex="1" aria-required='true' onFocus="if(this.value=='Имя')this.value='';" onBlur="if(this.value=='')this.value='Имя';" />
                <input type="text" name="email" class="comm-field" value="Ваш e-mail" size="22" tabindex="2" aria-required='true' onFocus="if(this.value=='Ваш e-mail')this.value='';" onBlur="if(this.value=='')this.value='Ваш e-mail';"  />
                <input type="text" name="title" class="comm-field" value="Тема" size="22" tabindex="3" aria-required='true' onFocus="if(this.value=='Тема')this.value='';" onBlur="if(this.value=='')this.value='Тема';" />

                <textarea name="message" id="message2" rows="9" tabindex="4"></textarea>

                <input type="submit" value="Отправить" id="submit" tabindex="5"/>

              </form>
            </div>

            <div id="output"></div>

          </div>
          <!--Конец span9-->

          <div class="span3">

            <header class="home-title">
              <h3>Вы можете связаться с нами:</h3>
            </header>

            <div class="margin-t">
              <div class="sidebar-archive">
                <ul>
                  <?php $this->context->myGetContacts(); // Функция описана в контроллере AppController ?>
                </ul>
              </div>
            </div>
          </div>
          <!--Конец span3-->
        </div>
        <!--Конец row-->
      </div>
      <!--Конец container-->
    </div>
    <!--Конец wrap-->
</div>
