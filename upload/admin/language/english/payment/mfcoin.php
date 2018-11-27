<?php

/**
 * LICENSE
 *
 * This source file is subject to the GNU General Public License, Version 3
 * It is also available through the world-wide-web at this URL:
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
$_['text_payment']          = 'Payment';
$_['text_success']          = 'Success: You have modified MFCoin details!';
$_['text_edit']             = 'Edit MFCoin';
$_['text_google_api']       = 'Google API';
$_['text_mfcoin']          = '<a href="https://mfcoin.net" target="_blank"><img src="view/image/payment/mfcoin.png" alt="MFCoin"/></a>';
$_['text_copyright']        = '<p><a href="https://github.com/Sagleft/opencart-mfcoin" target="_blank">MFCoin Payment for OpenCart</a></p><p>Version: 0.1.1</a></p><p>Donate MFC: <a href="MFCoin:Mi8mwDHhzASQZKiYFyRjg32NoafRzcMEok?label=MFCoin%20for%20OpenCart%20Donate">Mi8mwDHhzASQZKiYFyRjg32NoafRzcMEok</a></p><p><a href="http://sagleft.ru" target="_blank">Saglefts services for MFCoin</a></p>';


// Entry
$_['entry_total']           = 'Order Total';
$_['entry_order_status']    = 'Order Status';
$_['entry_geo_zone']        = 'Geo Zone';
$_['entry_status']          = 'Status';
$_['entry_sort_order']      = 'Sort Order';
$_['entry_user']            = 'RPC User';
$_['entry_password']        = 'RPC Password';
$_['entry_host']            = 'RPC Host';
$_['entry_port']            = 'RPC Port';
$_['entry_path']            = 'RPC Path';
$_['entry_qr']              = 'QR Code';
$_['entry_currency']        = 'MFCoin Currency';

// Help
$_['help_total']            = 'The checkout total the order must reach before this payment method becomes active.';
$_['help_user']             = 'MFCoin RPC Username';
$_['help_password']         = 'MFCoin RPC Password';
$_['help_host']             = 'MFCoin RPC Host, localhost by default';
$_['help_port']             = 'MFCoin RPC Port, 8332 by default';
$_['help_path']             = 'MFCoin RPC Path, empty by default';
$_['help_qr']               = 'MFCoin Address will be formatted as additional QR Code';
$_['help_currency']         = 'Create, activate and change your MFCoin Currency';

// Error
$_['error_permission']      = 'Warning: You do not have permission to modify payment MFCoin!';
$_['error_response']        = 'Warning: Could not connect to MFCoin via RPC! Response: %s';
