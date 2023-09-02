<?php

namespace Botble\Ecommerce\Traits;
use Illuminate\Http\Request;
trait TapTrait
{
    //========================> Test Key ===================//
    public $token="sk_test_XKokBfNWv6FIYuTMg5sLPjhJ";

    //========================> Live Key<====================//
    // public $token="sk_test_uYDnEsw9G0LiKMlmVWe6bFgz";

    public function create_charge($payment,$customer,$redirect_url){
        if (!empty($this->token))
        {
            $params = array(
                "charge_id"=>$payment->id,
                "amount"=> $payment->amount,
                "currency"=>$payment->currency,
                "threeDSecure"=> true,
                "save_card"=> false,
                "description"=> $payment->description??"",
                "reference"=> [
                    "transaction"=> $payment->id,
                    "order"=> $payment->order_id
                ],
                "receipt"=>[
                    "email"=> false,
                    "sms"=> false
                ],
                "customer"=> [
                    "first_name"=> "test",
                    "email"=> "mostafaelraw123@gmail.com",
                    "phone"=> [
                        "country_code"=> "20",
                        "number"=> "1025130204",
                    ]
                ],
                "source"=> [
                    "id"=> "src_all",
                ],
                "redirect"=>[
                    "url"=> $redirect_url,
                ]
            );
            $params = json_encode($params);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.tap.company/v2/charges",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS =>$params,
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer ". $this->token,
                    "content-type: application/json"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                $response = [
                    "error"=>true,
                    "message"=>"create charge error",
                    "errors"=>$err,
                ];
            } else {
                $res=json_decode($response);
                $response = [
                    "error"=>false,
                    "message"=>"create charge successfully",
                    "data"=>$res,
                ];
            }
            // dd($response);
            return $response;
        }
    }

    public function check_payment($ref){
        if (!empty($this->token))
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.tap.company/v2/charges/".$ref,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "{}",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer ".$this->token,
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                $response = [
                    "error"=>true,
                    "message"=>"create charge error",
                    "errors"=>$err,
                ];
            } else {
                $res=json_decode($response);
                $response = [
                    "error"=>false,
                    "message"=>"create charge successfully",
                    "data"=>$res,
                ];
            }
            return $response;
        }
        $response = [
            "error"=>true,
            "message"=>"create charge error",
            "errors"=>null,
        ];

        return $response;

    }


    public function refund($payment,$redirect_url){
        $params = array(
            "charge_id"=> $payment->transaction_ref,
            "amount"=> $payment->amount,
            "currency"=> "SAR",
            "reason"=>$payment->refund_reason,
            "post"=>[
                "url"=> $redirect_url,
            ]
        );
        $params = json_encode($params);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tap.company/v2/refunds",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>$params,
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$this->token,
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $response = [
                "error"=>true,
                "message"=>"create refund error",
                "errors"=>$err,
            ];
        } else {
            $res=json_decode($response);
            $response = [
                "error"=>false,
                "message"=>"create refund successfully",
                "data"=>$res,
            ];
        }
        return $response;
    }

}//end class
