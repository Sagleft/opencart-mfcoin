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

class ModelPaymentMFCoin extends Model {

    public function getMethod($address, $total) {

        // Load dependencies
        $this->load->language('payment/mfcoin');

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

            // Block this payment gateway if connection failed
            return false;
        }

        // Get active Geo-Zones
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('mfcoin_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

        // Check for order total
        if ($this->config->get('mfcoin_total') > 0 && $this->config->get('mfcoin_total') > $total) {
            $status = false;

        // Check for Geo-Zone
        } elseif (!$this->config->get('mfcoin_geo_zone_id')) {
            $status = true;
        } elseif ($query->num_rows) {
            $status = true;
        } else {
            $status = false;
        }

        // Add MFCoin Payment Option to the Order Form
        $method_data = array();

        if ($status) {
            $method_data = array(
                'code'       => 'mfcoin',
                'title'      => $this->language->get('text_title'),
                'terms'      => '',
                'sort_order' => $this->config->get('mfcoin_sort_order')
            );
        }

        return $method_data;
    }
}
