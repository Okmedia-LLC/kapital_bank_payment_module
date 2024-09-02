<?php
namespace Opencart\Catalog\Model\Extension\KapitalBank\Payment;
class KapitalBank extends \Opencart\System\Engine\Model {
	public function getMethods($address) {
		$this->load->language('extension/kapital_bank/payment/kapital_bank');

        $status = true;

		$method_data = [];

        if(!in_array($this->session->data['currency'], ['AZN'])){
            $status = false;
        }

		if ($status) {
		    $option_data = []; 
		    
		    $option_data['kapital_bank'] = [
				'code' => 'kapital_bank.kapital_bank',
				'name' => $this->language->get('text_title')
			];
		    
			$method_data = [
				'code'       => 'kapital_bank',
				'name'      => $this->language->get('text_title'),
				'option'     => $option_data,
				'terms'      => '',
				'sort_order' => $this->config->get('payment_kapital_bank_sort_order'),
			];
		}

		return $method_data;
	}

    public function getOrder($order_id) {
        $qry = $this->db->query("SELECT * FROM `" . DB_PREFIX . "kapital_bank_order` WHERE `order_id` = '" . (int)$order_id . "' LIMIT 1");


        if ($qry->num_rows) {
            return $qry->row;
        }

        return false;
    }

    public function updateOrder($order_id, $session_id, $ecomm_order_id, $taksit = 0){
        $session_id = $session_id ?:'null';
        $ecomm_order_id = $ecomm_order_id?:'null';
        $this->db->query("UPDATE `".DB_PREFIX."kapital_bank_order` set `eccommerce_session_id`='".$this->db->escape($session_id)."', `eccommerce_order_id`='".$this->db->escape($ecomm_order_id)."', taksit=".(int)$taksit.", `date`='".date('Y-m-d H:i:s')."'"." where order_id = ".$order_id);
    }
    public function insertOrder($order_id, $session_id, $ecomm_order_id, $taksit = 0){
	    $session_id = $session_id ?:'null';
	    $ecomm_order_id = $ecomm_order_id?:'null';
        $this->db->query("INSERT INTO `".DB_PREFIX."kapital_bank_order` set `eccommerce_session_id`='".$this->db->escape($session_id)."', `eccommerce_order_id`='".$this->db->escape($ecomm_order_id)."', taksit=".(int)$taksit.", order_id = ".$order_id.", `date`='".date('Y-m-d H:i:s')."'");
    }
}
