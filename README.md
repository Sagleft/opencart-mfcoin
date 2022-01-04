
# Opencart-MFCoin v.1.0.1
Модуль оплаты MFCoin для ваших интернет-магазинов во [Фриленд](https://freeland.land).
Пригодился проект? Поставь ★ репозиторию.

## ![o](http://info.mfcoin.su/img/icns/meditation.png) Концепция

Вы арендуете VDS, [устанавливаете на сервер MFCoind](https://github.com/MFrcoin/MFCoin/blob/master/doc/MFCoind-CentOS7-build.md), затем устанавливаете в свой интернет-магазин данный модуль, затем настраиваете доступ к MFCoind по JSON RPC.
Возможно позже появится версия модуля с использованием [MFinotaurAPI](https://mfinotaur.mfcoin.su/).

## ![o](http://info.mfcoin.su/img/icns/clockwork.png) Текущий функционал
1. Возможность выбора метода оплаты - MFCoin;
2. Создание MFCoin-адреса для оплаты заказа;

## ![o](http://info.mfcoin.su/img/icns/holy-oak.png) Совместимость
**Протестировано на Opencart v.2.0.2.**

На Opencart v.2.2.0.0 были замечены баги с путями к файлам шаблонов. Если возникнут подобные ошибки, скопируйте файлы шаблонов по тем путям, по которым их ищет Opencart. Например, "theme/default/template/default/template/".

## ![o](http://info.mfcoin.su/img/icns/spanner.png) Установка и настройка
1. Перейдите в папку upload, содержимое папки закиньте в корень своего opencart-сайта.
2. Откройте панель управления администратора своего сайта.
3. Перейдите к ***Система** -> **Локализация** -> **Валюта***.
4. Создайте валюту, назовите ее MFCoin.
5. Перейдите к ***Модули** -> **Оплата***.
6. Найдите в таблице методов оплаты "MFCoin", кликните на кнопку "Активировать". Затем на "Редактировать".
7. Укажите параметры подключения к MFCoind по RPC.
8. Все готово.

Чтобы получить подробную документацию, откройте файл INSTALL_ru.pdf

## ![o](http://info.mfcoin.su/img/icns/sherlock-holmes.png) Важные моменты
* Аккаунты в кошельке MFCoind будут именоваться по порядковому номеру заказа: 1, 2, 3 ... Поэтому не используйте порядковые номера для имен аккаунтов в других проектах, которые также используют ваш сервер\подключение к демону кошелька.

## ![o](http://info.mfcoin.su/img/icns/ionic-column.png) Локализация
Доступные переводы:
* russian;
* english;

## ![o](http://info.mfcoin.su/img/icns/caesar.png) Donate
MFCoin:
Mi8mwDHhzASQZKiYFyRjg32NoafRzcMEok

---

![image](https://github.com/Sagleft/Sagleft/raw/master/image.png)

### :globe_with_meridians: [Telegram канал](https://t.me/+VIvd8j6xvm9iMzhi)
