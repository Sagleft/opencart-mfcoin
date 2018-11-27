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
 ?>

<?php echo $header; ?>
<?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-mfcoin" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-mfcoin" class="form-horizontal">

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-host">
              <span data-toggle="tooltip" title="<?php echo $help_host; ?>"><?php echo $entry_host; ?></span>
            </label>
            <div class="col-sm-10">
              <input type="text" name="mfcoin_host" value="<?php echo $mfcoin_host; ?>" placeholder="<?php echo $entry_host; ?>" id="input-host" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-port">
              <span data-toggle="tooltip" title="<?php echo $help_port; ?>"><?php echo $entry_port; ?></span>
            </label>
            <div class="col-sm-10">
              <input type="text" name="mfcoin_port" value="<?php echo $mfcoin_port; ?>" placeholder="<?php echo $entry_port; ?>" id="input-port" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-path">
              <span data-toggle="tooltip" title="<?php echo $help_path; ?>"><?php echo $entry_path; ?></span>
            </label>
            <div class="col-sm-10">
              <input type="text" name="mfcoin_path" value="<?php echo $mfcoin_path; ?>" placeholder="<?php echo $entry_path; ?>" id="input-path" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-user">
              <span data-toggle="tooltip" title="<?php echo $help_user; ?>"><?php echo $entry_user; ?></span>
            </label>
            <div class="col-sm-10">
              <input type="text" name="mfcoin_user" value="<?php echo $mfcoin_user; ?>" placeholder="<?php echo $entry_user; ?>" id="input-user" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-password">
              <span data-toggle="tooltip" title="<?php echo $help_password; ?>"><?php echo $entry_password; ?></span>
            </label>
            <div class="col-sm-10">
              <input type="password" name="mfcoin_password" value="<?php echo $mfcoin_password; ?>" placeholder="<?php echo $entry_password; ?>" id="input-password" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-currency-id">
              <span data-toggle="tooltip" title="<?php echo $help_currency; ?>"><?php echo $entry_currency; ?></span>
            </label>
            <div class="col-sm-10">
              <select name="mfcoin_currency" id="input-currency-id" class="form-control">
                <?php foreach ($currencies as $currency) { ?>
                <?php if ($mfcoin_currency == $currency['code']) { ?>
                  <option value="<?php echo $currency['code']; ?>" selected="selected"><?php echo $currency['title']; ?></option>
                <?php } else { ?>
                  <option value="<?php echo $currency['code']; ?>"><?php echo $currency['title']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-qr">
              <span data-toggle="tooltip" title="<?php echo $help_qr; ?>"><?php echo $entry_qr; ?></span>
            </label>
            <div class="col-sm-10">
              <select name="mfcoin_qr" id="input-input-qr" class="form-control">
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php if ($mfcoin_qr == 'google') { ?>
                  <option value="google" selected="selected"><?php echo $text_google_api; ?></option>
                <?php } else { ?>
                  <option value="google"><?php echo $text_google_api; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-total">
              <span data-toggle="tooltip" title="<?php echo $help_total; ?>"><?php echo $entry_total; ?></span>
            </label>
            <div class="col-sm-10">
              <input type="text" name="mfcoin_total" value="<?php echo $mfcoin_total; ?>" placeholder="<?php echo $entry_total; ?>" id="input-total" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status"><?php echo $entry_order_status; ?></label>
            <div class="col-sm-10">
              <select name="mfcoin_order_status_id" id="input-order-status" class="form-control">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $mfcoin_order_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_geo_zone; ?></label>
            <div class="col-sm-10">
              <select name="mfcoin_geo_zone_id" id="input-geo-zone" class="form-control">
                <option value="0"><?php echo $text_all_zones; ?></option>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <?php if ($geo_zone['geo_zone_id'] == $mfcoin_geo_zone_id) { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="mfcoin_status" id="input-status" class="form-control">
                <?php if ($mfcoin_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="mfcoin_sort_order" value="<?php echo $mfcoin_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
            </div>
          </div>
        </form>
      </div>
    </div>
    <div style="text-align:center"><?php echo $text_copyright; ?></div>
  </div>
</div>
<?php echo $footer; ?>
