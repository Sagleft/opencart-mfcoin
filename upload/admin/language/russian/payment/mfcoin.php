<?php

/**
 * LICENSE
 *
 * Данный файл находится под действием лицензии GNU General Public License, Version 3
 * Узнать подробнее про лицензию можно на:
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @category   OpenCart
 * @package    MFCoin Payment for OpenCart
 * @copyright  Copyright (c) 2015 Eugene Lifescale (a.k.a. Shaman) by OpenCart Ukrainian Community (http://opencart-ukraine.tumblr.com)
 * @copyright  Copyright (c) 2018 Sagleft (http://sagleft.ru)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License, Version 3
 */

// Heading
$_['heading_title']         = 'MFCoin';

// Text
$_['text_payment']          = 'Платеж';
$_['text_success']          = 'Успешно: Вы изменили детали подключения к MFCoin!';
$_['text_edit']             = 'Изменить параметры';
$_['text_google_api']       = 'Google API';
$_['text_mfcoin']          = '<a href="https://mfcoin.net" target="_blank"><img src="view/image/payment/mfcoin.png" alt="MFCoin"/></a>';
$_['text_copyright']        = '<p><a href="https://github.com/Sagleft/opencart-mfcoin" target="_blank">MFCoin модуль оплаты для OpenCart</a></p><p>Version: 0.1.1</a></p><p>Поддержать разработчика: <a href="MFCoin:Mi8mwDHhzASQZKiYFyRjg32NoafRzcMEok?label=MFCoin%20for%20OpenCart%20Donate">Mi8mwDHhzASQZKiYFyRjg32NoafRzcMEok</a></p><p><a href="http://sagleft.ru" target="_blank">Сервисы Саглэфта для MFCoin</a></p>';


// Entry
$_['entry_total']           = 'Минимум для заказа';
$_['entry_order_status']    = 'Статус заказа';
$_['entry_geo_zone']        = 'Геогр. зоны';
$_['entry_status']          = 'Статус модуля';
$_['entry_sort_order']      = 'Порядок сортировки в модулях';
$_['entry_user']            = 'RPC пользователь';
$_['entry_password']        = 'RPC пароль';
$_['entry_host']            = 'RPC хост';
$_['entry_port']            = 'RPC порт';
$_['entry_path']            = 'RPC путь';
$_['entry_qr']              = 'QR Код';
$_['entry_currency']        = 'Криптовалюта MFCoin';

// Help
$_['help_total']            = 'Минимум суммы заказа, чтобы данный метод оплаты стал активным в заказе';
$_['help_user']             = 'MFCoin RPC Username - имя пользователя для RPC. Может быть задано в MFCoin.conf где лежит файл кошелька';
$_['help_password']         = 'MFCoin RPC Password';
$_['help_host']             = 'MFCoin RPC Host, localhost по умолчанию';
$_['help_port']             = 'MFCoin RPC Port, 22823 по умолчанию';
$_['help_path']             = 'MFCoin RPC Path, оставьте пустым если не знаете что это';
$_['help_qr']               = 'Добавлять ли QR код, чтобы можно было его отсканировать на мобильном кошельке';
$_['help_currency']         = 'Создайте в opencart валюту и выберите ее';

// Error
$_['error_permission']      = 'Внимание: Нет прав на изменение метода оплаты MFCoin';
$_['error_response']        = 'Внимание: Не выходит подключиться к MFCoin-демону по RPC. Проверьте настройки подключения или не упал ли MFCoin-демон. Получен ответ: %s';
