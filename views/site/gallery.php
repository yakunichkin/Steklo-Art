<?php
$this->title = 'Галерея';
?>

<div class="wrap">
  <div class="container home-apoint">
    <div class="row">
      <div class="span12 home-apoint-text">
        <h2>Галерея</h2>
      </div>
    </div>
  </div>
</div>

<!--Начало Галерея-->
<div class="wrap margin-block">
  <div class="container">
    <div class="row">

      <?php if (!empty($allGallery)): ?>
        <?php foreach ($allGallery as $gallery):?>
          <?php $image = !$gallery->image ? 'no-image.jpg' : $gallery->image; //Если нет картинки - поставится пустая заглушка ?>
          <div class="span4 block-3col">
            <div class="gal-img">
              <img src="images/gallery/<?= $image ?>" alt="<?=$gallery->title?>" width="370" height="208"/>
              <a class="lightbox" href="images/gallery/<?= $image ?>" data-rel="prettyPhoto[gallery]" title="<?=$gallery->title?>">
                <div class="gal-more">
                  <div class="mask-elem">
                    <span class="gal-btn-2">Открыть</span>
                  </div>
                </div>
              </a>
            </div>
            <h4 class="gallery-text"><?= $gallery->title ?></h4>
          </div>
        <?php endforeach; ?>
      <?php endif;?>

    </div>
  </div>
</div>
<!--Конец Галерея-->
