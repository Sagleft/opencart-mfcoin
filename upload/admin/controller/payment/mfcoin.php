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

    private $error = array();

    public function index() {

        // Load dependencies
        $this->load->model('setting/setting');
        $data = $this->load->language('payment/mfcoin');

        // Validate & save changes
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

            $this->model_setting_setting->editSetting('mfcoin', $this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));

        }

        // Display warnings if exists
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        // Build breadcrumbs
        $data['breadcrumbs'] = array();
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_payment'),
            'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('payment/mfcoin', 'token=' . $this->session->data['token'], 'SSL')
        );

        // Form processing
        $data['action'] = $this->url->link('payment/mfcoin', 'token=' . $this->session->data['token'], 'SSL');
        $data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        $this->load->model('localisation/order_status');
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        $this->load->model('localisation/geo_zone');
        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

        $this->load->model('localisation/currency');
        $data['currencies'] = $this->model_localisation_currency->getCurrencies();

        if (isset($this->request->post['mfcoin_user'])) {
            $data['mfcoin_user'] = $this->request->post['mfcoin_user'];
        } else {
            $data['mfcoin_user'] = $this->config->get('mfcoin_user');
        }

        if (isset($this->request->post['mfcoin_password'])) {
            $data['mfcoin_password'] = $this->request->post['mfcoin_password'];
        } else {
            $data['mfcoin_password'] = $this->config->get('mfcoin_password');
        }

        if (isset($this->request->post['mfcoin_host'])) {
            $data['mfcoin_host'] = $this->request->post['mfcoin_host'];
        } else if ($this->config->get('mfcoin_host')) {
            $data['mfcoin_host'] = $this->config->get('mfcoin_host');
        } else {
            $data['mfcoin_host'] = 'localhost';
        }

        if (isset($this->request->post['mfcoin_port'])) {
            $data['mfcoin_port'] = $this->request->post['mfcoin_port'];
        } else if ($this->config->get('mfcoin_port')) {
            $data['mfcoin_port'] = $this->config->get('mfcoin_port');
        } else {
            $data['mfcoin_port'] = 22823;
        }

        if (isset($this->request->post['mfcoin_path'])) {
            $data['mfcoin_path'] = $this->request->post['mfcoin_path'];
        } else {
            $data['mfcoin_path'] = $this->config->get('mfcoin_path');
        }

        if (isset($this->request->post['mfcoin_total'])) {
            $data['mfcoin_total'] = $this->request->post['mfcoin_total'];
        } else {
            $data['mfcoin_total'] = $this->config->get('mfcoin_total');
        }

        if (isset($this->request->post['mfcoin_qr'])) {
            $data['mfcoin_qr'] = $this->request->post['mfcoin_qr'];
        } else {
            $data['mfcoin_qr'] = $this->config->get('mfcoin_qr');
        }

        if (isset($this->request->post['mfcoin_currency'])) {
            $data['mfcoin_currency'] = $this->request->post['mfcoin_currency'];
        } else {
            $data['mfcoin_currency'] = $this->config->get('mfcoin_currency');
        }

        if (isset($this->request->post['mfcoin_order_status_id'])) {
            $data['mfcoin_order_status_id'] = $this->request->post['mfcoin_order_status_id'];
        } else {
            $data['mfcoin_order_status_id'] = $this->config->get('mfcoin_order_status_id');
        }

        if (isset($this->request->post['mfcoin_geo_zone_id'])) {
            $data['mfcoin_geo_zone_id'] = $this->request->post['mfcoin_geo_zone_id'];
        } else {
            $data['mfcoin_geo_zone_id'] = $this->config->get('mfcoin_geo_zone_id');
        }

        if (isset($this->request->post['mfcoin_status'])) {
            $data['mfcoin_status'] = $this->request->post['mfcoin_status'];
        } else {
            $data['mfcoin_status'] = $this->config->get('mfcoin_status');
        }

        if (isset($this->request->post['mfcoin_sort_order'])) {
            $data['mfcoin_sort_order'] = $this->request->post['mfcoin_sort_order'];
        } else {
            $data['mfcoin_sort_order'] = $this->config->get('mfcoin_sort_order');
        }

        $this->document->setTitle($this->language->get('heading_title'));

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        // Load the template
        $this->response->setOutput($this->load->view('payment/mfcoin.tpl', $data));
    }

    protected function validate() {

        // Check permissions
        if (!$this->user->hasPermission('modify', 'payment/mfcoin')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        // Check connection
        $mfcoin = new MFCoin(
            $this->request->post['mfcoin_user'],
            $this->request->post['mfcoin_password'],
            $this->request->post['mfcoin_host'],
            $this->request->post['mfcoin_port'],
            $this->request->post['mfcoin_path']
        );

        if ($mfcoin->error) {
            $this->error['warning'] = sprintf($this->language->get('error_response'), $mfcoin->error);
        }

        return !$this->error;
    }
}
