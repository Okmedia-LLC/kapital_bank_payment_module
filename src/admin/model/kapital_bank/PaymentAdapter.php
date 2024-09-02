<?php


/**
 * PaymentAdapter.php
 *
 * Author: Kapital Bank
 * Copyright: (c) 2021 Kapital Bank
 * Date: 4/3/2021 10:21
 */

namespace Opencart\Admin\Controller\Extension\KapitalBank\Payment;

class PaymentAdapter {
    protected $payment_method = 'cash';
    protected $order;
    protected $redirect_url;
    protected $cancel_url;
    protected $invoice_id;
    protected $description;
    protected $plugin_id;
    protected $currency;
    protected $currency_number;
    protected $approval_link;
    protected $details = '';
    protected $state;
    protected $currency_codes = [
        'AED' => 784,
        'AFN' => 971,
        'ALL' => 8,
        'AMD' => 51,
        'ANG' => 532,
        'AOA' => 973,
        'ARS' => 32,
        'AUD' => 36,
        'AWG' => 533,
        'AZN' => 944,
        'BAM' => 977,
        'BBD' => 52,
        'BDT' => 50,
        'BGN' => 975,
        'BHD' => 48,
        'BIF' => 108,
        'BMD' => 60,
        'BND' => 96,
        'BOB' => 68,
        'BOV' => 984,
        'BRL' => 986,
        'BSD' => 44,
        'BTN' => 64,
        'BWP' => 72,
        'BYN' => 933,
        'BZD' => 84,
        'CAD' => 124,
        'CDF' => 976,
        'CHE' => 947,
        'CHF' => 756,
        'CHW' => 948,
        'CLF' => 990,
        'CLP' => 152,
        'CNY' => 156,
        'COP' => 170,
        'COU' => 970,
        'CRC' => 188,
        'CUC' => 931,
        'CUP' => 192,
        'CVE' => 132,
        'CZK' => 203,
        'DJF' => 262,
        'DKK' => 208,
        'DOP' => 214,
        'DZD' => 12,
        'EGP' => 818,
        'ERN' => 232,
        'ETB' => 230,
        'EUR' => 978,
        'FJD' => 242,
        'FKP' => 238,
        'GBP' => 826,
        'GEL' => 981,
        'GHS' => 936,
        'GIP' => 292,
        'GMD' => 270,
        'GNF' => 324,
        'GTQ' => 320,
        'GYD' => 328,
        'HKD' => 344,
        'HNL' => 340,
        'HRK' => 191,
        'HTG' => 332,
        'HUF' => 348,
        'IDR' => 360,
        'ILS' => 376,
        'INR' => 356,
        'IQD' => 368,
        'IRR' => 364,
        'ISK' => 352,
        'JMD' => 388,
        'JOD' => 400,
        'JPY' => 392,
        'KES' => 404,
        'KGS' => 417,
        'KHR' => 116,
        'KMF' => 174,
        'KPW' => 408,
        'KRW' => 410,
        'KWD' => 414,
        'KYD' => 136,
        'KZT' => 398,
        'LAK' => 418,
        'LBP' => 422,
        'LKR' => 144,
        'LRD' => 430,
        'LSL' => 426,
        'LTL' => 440,
        'LYD' => 434,
        'MAD' => 504,
        'MDL' => 498,
        'MGA' => 969,
        'MKD' => 807,
        'MMK' => 104,
        'MNT' => 496,
        'MOP' => 446,
        'MRU' => 929,
        'MUR' => 480,
        'MVR' => 462,
        'MWK' => 454,
        'MXN' => 484,
        'MXV' => 979,
        'MYR' => 458,
        'MZN' => 943,
        'NAD' => 516,
        'NGN' => 566,
        'NIO' => 558,
        'NOK' => 578,
        'NPR' => 524,
        'NZD' => 554,
        'OMR' => 512,
        'PAB' => 590,
        'PEN' => 604,
        'PGK' => 598,
        'PHP' => 608,
        'PKR' => 586,
        'PLN' => 985,
        'PYG' => 600,
        'QAR' => 634,
        'RON' => 946,
        'RSD' => 941,
        'RUB' => 643,
        'RWF' => 646,
        'SAR' => 682,
        'SBD' => 90,
        'SCR' => 690,
        'SDG' => 938,
        'SEK' => 752,
        'SGD' => 702,
        'SHP' => 654,
        'SLL' => 694,
        'SOS' => 706,
        'SRD' => 968,
        'SSP' => 728,
        'STN' => 930,
        'SVC' => 222,
        'SYP' => 760,
        'SZL' => 748,
        'THB' => 764,
        'TJS' => 972,
        'TMT' => 934,
        'TND' => 788,
        'TOP' => 776,
        'TRY' => 949,
        'TTD' => 780,
        'TWD' => 901,
        'TZS' => 834,
        'UAH' => 980,
        'UGX' => 800,
        'USD' => 840,
        'USN' => 997,
        'USS' => 998,
        'UYI' => 940,
        'UYU' => 858,
        'UZS' => 860,
        'VEF' => 937,
        'VND' => 704,
        'VUV' => 548,
        'WST' => 882,
        'XAF' => 950,
        'XAG' => 961,
        'XAU' => 959,
        'XBA' => 955,
        'XBB' => 956,
        'XBC' => 957,
        'XBD' => 958,
        'XCD' => 951,
        'XDR' => 960,
        'XOF' => 952,
        'XPD' => 964,
        'XPF' => 953,
        'XPT' => 962,
        'XSU' => 994,
        'XTS' => 963,
        'XUA' => 965,
        'XXX' => 999,
        'YER' => 886,
        'ZAR' => 710,
        'ZMW' => 967,
        'ZWL' => 932
    ];

    /**
     * @return mixed
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getDetails() {
        return $this->details;
    }

    /**
     * @return mixed
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency) {
        $this->currency = $currency;
        $this->currency_number = $currency;
    }

    /**
     * @return mixed
     */
    public function getCurrencyNumber() {
        return $this->currency_number;
    }

    /**
     * @return mixed
     */
    public function getPluginId() {
        return $this->plugin_id;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getCurrencyCode($number) {
        return array_search($number, $this->currency_codes);
    }

    /**
     * @param mixed $invoice_id
     */
    public function setInvoiceId($invoice_id) {
        $this->invoice_id = $invoice_id;
    }

    /**
     * @param string $payment_method
     */
    public function setPaymentMethod($payment_method) {
        $this->payment_method = $payment_method;
    }

    /**
     * @param mixed $redirect_url
     */
    public function setRedirectUrl($redirect_url) {
        $this->redirect_url = $redirect_url;
    }

    /**
     * @param mixed $cancel_url
     */
    public function setCancelUrl($cancel_url) {
        $this->cancel_url = $cancel_url;
    }

    /**
     * Creates and processes a payment.
     *
     * @throws \Exception
     */
    public function create() {

    }

    /**
     * Executes, or completes, the payment that the payer has approved. You can optionally update selective payment information when you execute a payment.
     *
     * @throws \Exception
     */
    public function execute() {

    }

    public function checkExecuteReady() {
        return true;
    }

    public function getApprovalLink() {
        return $this->approval_link;
    }

    public function getRedirectingToPaymentMessage() {
        return 'Redirecting to payment';
    }

    public function toPayment() {

    }

    public function getOrder() {
        return $this->order;
    }

    public function setOrder($order) {
        $this->order = $order;
    }

    public function getUniqueid() {

    }
}
