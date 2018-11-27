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

class ControllerPaymentMFCoin extends Controller {

    private $_mfcoin;

    public function __construct($registry) {

        parent::__construct($registry);

        // Load dependencies
        $this->load->language('payment/mfcoin');
        $this->load->model('checkout/order');

        // Connect to the server
        $this->_mfcoin = new MFCoin(
            $this->config->get('mfcoin_user'),
            $this->config->get('mfcoin_password'),
            $this->config->get('mfcoin_host'),
            $this->config->get('mfcoin_port'),
            $this->config->get('mfcoin_path')
        );

        // Check for errors
        if ($this->_mfcoin->error) {

            // Save errors to the log
            $log = new Log('mfcoin.log');
            $log->write($this->_mfcoin->error);

            // Force exit
            exit;
        }
    }

    public function index() {

        // Create invoice
        $data['text_instruction'] = $this->language->get('text_instruction');
        $data['text_loading']     = $this->language->get('text_loading');
        $data['text_description'] = sprintf($this->language->get('text_description'),
                                            $this->currency->format($this->cart->getTotal(),
                                            $this->config->get('mfcoin_currency')));

        $data['button_confirm']   = $this->language->get('button_confirm');
        $data['continue']         = $this->url->link('checkout/success');
        $data['address']          = $this->_mfcoin->getaccountaddress((string)$this->session->data['order_id']);

        // Load QR code if enabled
        if ($data['address']) {
            switch ($this->config->get('mfcoin_qr')) {

                // Google API
                case 'google':
                    $data['qr'] = 'https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=' . $data['address'];
                    break;

                // QR is disabled
                default:
                    $data['qr'] = false;
            }
        }

        // Load the template
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/mfcoin.tpl')) {
            return $this->load->view($this->config->get('config_template') . '/template/payment/mfcoin.tpl', $data);
        } else {
            return $this->load->view('default/template/payment/mfcoin.tpl', $data);
        }
    }

    public function confirm() {

        // Confirm an order if payment gateway is MFCoin
        if ($this->session->data['payment_method']['code'] == 'mfcoin') {

            $this->model_checkout_order->addOrderHistory(
                $this->session->data['order_id'],
                $this->config->get('mfcoin_order_status_id'),

                // Save MFCoin Address to the Order History
                sprintf($this->language->get('text_mfcoin_address'),
                        $this->_mfcoin->getaccountaddress((string)$this->session->data['order_id'])),
                true
            );
        }
    }
}
