@extends('layouts.master')
<div class="inner-content-block">
    <div class="inner-content">
        <div class="inner">
            <div class="inner-zag"><h1>Оформление заказа</h1></div>
            <div class="of">
                <form action="" method="post">
                    <div class="of-row1">
                        <input type="text" name="" placeholder="Ваше имя" required=""><Br>
                        <input type="text" name="" placeholder="Ваш телефон" required=""><Br>
                        <input type="text" name="" placeholder="Ваша почта" required=""><Br>
                        <input type="text" name="" placeholder="Населенный пункт" required=""><Br>
                    </div>
                    <div class="of-row2">
                        <div>
                            <span>Способ доставки</span>
                            <select class="sss">
                                <option selected>Доставка курьером</option>
                                <option>Самовывоз</option>
                            </select>
                        </div>

                        <div>
                            <span>Адрес доставки</span>
                            <input type="text" name="" placeholder="Улица, дом, квартира" required="">
                        </div>
                    
                        <div>
                            <span>Способ оплаты</span>
                            <select class="sss">
                                <option selected="">Наличными</option>
                                <option>Картой</option>
                            </select>
                        </div>

                        <div>
                            <button class="back">Вернуться в корзину</button>
                            <input type="submit" name="" value="Отправить" class="send">
                        </div>
                    </div>
                </form>
                <div class="of-row3">
                    <div class="of1">
                        Итоговая стоимость<br>
                        <h2>1 275 000</h2>
                    </div>
                    <a href="">Доставка и оплата</a><br><br><br>
                    Принимаем к оплате<br>
                    <img src="{{ asset('build/img/visa.svg') }}" alt="Виза">
                    <img src="{{ asset('build/img/mastercard.svg') }}" alt="Мастеркард">
                </div>
            </div>
        </div>
    </div>
</div>