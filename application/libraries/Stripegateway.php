<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('stripe/init.php');

class Stripegateway {

    public function __construct() {

        $keys = get_settings('stripe_keys');
        $key  = json_decode($keys);

        $stripe = array(
            'secret_key' => $key[0]->secret_key,
            'public_key' => $key[0]->public_key,
            'secret_live_key' => $key[0]->secret_live_key,
            'public_live_key' => $key[0]->public_live_key
        );
        if ($key[0]->testmode == 'on') {
            \stripe\Stripe::setApiKey($stripe['secret_key']);
        } else {
            \stripe\Stripe::setApiKey($stripe['secret_live_key']);
        }
    }

    public function checkout($data) {

        try {
            $charge = \stripe\Charge::create(array(
                'source' => $data['stripe_token'],
                'amount'   => $data['amount'],
                'currency' => 'usd',
                'description' => $data['invoice_title']
            ));
        } catch (Exception $e) {

        }

    }

}
