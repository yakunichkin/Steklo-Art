<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Products;
use app\models\Contacts;

class AppController extends Controller
{
  /*
   * Данный метод предназначен для создания массива элементов, который затем будет передан виджетам всем Menu::widget()
   *
   * @fullOfProductsCount - значение количества всех записей в таблице
   * @halfOfProductsCount - половина всех записей, округленная до целого в большую сторону при нечетном числе
   * @allProducts - объект, полученный из базы данных
   * @arrayProductsName - массив из поля Name таблицы Products
   * @check - входной параметр текущего метода для условия
   * @fromCounter и @toCounter - начальное и конечное значения для цикла, который сформирует массив из ссылок
   * @productsItems - основной массив, который будет передан в главное меню сайта, меню тега <aside> и в нижнее меню Footer
   */
  public function myGetProductsItemsLinkArray($check = null)
  {
    // Переменная с количеством записей в таблице Products
    $fullOfProductsCount = Products::find()->count('id');
    // Переменная, содержащая половину количества записей для разделения пополам левого и правого меню футера
    $halfOfProductsCount = (int)ceil($fullOfProductsCount / 2);

    // Подключаемся к базе данных и записываем в объект полученные значение
    $allProducts = Products::find()->select('name')->all();
    // Создадим в массиве пустую нулевую ячейку, чтобы запись массива в цикле начиналась с 1, а не с 0
    $arrayProductsName[0] = null;
    // Циклом foreach создаем массив с названиями всей продукции, которая есть на данный момент в таблице Products
    foreach ($allProducts as $allProductsName)
    {
      $arrayProductsName[] = $allProductsName->name;
    }
    // Удаляем ненужную нулевую пустую позицию, чтобы массив начинался с 1 ячейки
    unset($arrayProductsName[0]);

    // Проверка $check
    // Если он равен 1 - создастся первая половина от всех ссылок из таблицы для левого меню футера
    if($check == 1)
    {
      $fromCounter = 1;
      $toCounter = $halfOfProductsCount;
    }
    // Если 2 - создастся вторая половина ссылок для правого меню футера
    elseif($check == 2)
    {
      $fromCounter = $halfOfProductsCount + 1;
      $toCounter = $fullOfProductsCount;
    }
    // Иначе если параметр отстутствует - будет выведен весь список меню и не будет поделен пополам
    else
    {
      $fromCounter = 1;
      $toCounter = $fullOfProductsCount;
    }

    // Формируем массив для виджета меню - Menu::widget(), состоящий из элементов массива с названиями, а так же ссылок
    $productsItems = [];
    for ($i=$fromCounter; $i<=$toCounter; $i++)
    {
      $productsItems[$i] = ['label' => $arrayProductsName[$i], 'url' => ['/products/index' , 'id'=>$i]];
    }
    // Удаляем обязательно первый по счету нулевой элемент, так как это негативно повлияет на отображение виджета меню
    unset($productsItems[0]);

    // Возвращаем полученный масив элементов меню со ссылками и названиями для ссылок
    return $productsItems;
  }

  /*
   * Функция myGetContacts() создает блок контактов
   *
   * @allContacts - объект, полученный из базы данных со всеми значениями таблицы
   */
  public function myGetContacts()
  {
    $allContacts = Contacts::find()->select('address, phone_1, phone_2, phone_3, email, skype')->all();

    // Проверяем содержимое массива и выводим значения в контакты, если эта запись присутствует в базе данных
    foreach($allContacts as $contact)
    {
      if(!empty($contact->address)) { echo '<li>Адрес: ' . $contact->address . '</li>'; }
      if(!empty($contact->phone_1)) { echo '<li>Тел.:  ' . $contact->phone_1 . '</li>'; }
      if(!empty($contact->phone_2)) { echo '<li>Тел.:  ' . $contact->phone_2 . '</li>'; }
      if(!empty($contact->phone_3)) { echo '<li>Тел.:  ' . $contact->phone_3 . '</li>'; }
      if(!empty($contact->email))   { echo '<li>Почта: ' . $contact->email   . '</li>'; }
      if(!empty($contact->skype))   { echo '<li>Skype: ' . $contact->skype   . '</li>'; }
    }
  }

  /*
   * Разделитель в виде синей полосы по центру страницы
   * По умолчанию этот метод имеет ширину 65% и высоту 3px
   */
  public function myIndexDivider($width = 65, $height = 3)
  {
    echo
      '<div style="width: ' . $width . '%; height: ' . $height . 'px; margin:35px auto 0; background-color: #0bb1e5;"></div>';
  }
}