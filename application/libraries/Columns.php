<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Columns
{

    public function __construct()
    {

    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

    public function getReportColumns($repId){
        $data = array();      

        if($repId==1){
            $data = array(
                'tbl_wifi_user_name' => 'User&nbsp;Name',
                'tbl_wifi_user_loginid' => 'Login&nbsp;Id',
                'tbl_wifi_user_mobile_no' => 'Mobile&nbsp;Number',
                'tbl_wifi_user_voucher_no' => 'Voucher&nbsp;Number',
                'tbl_wifi_user_mac' => 'Mac&nbsp;Address',
                'tbl_wifi_user_max_devices' => 'Max&nbsp;Devices',
                'tbl_institution_name' => 'Institution',
                'tbl_institution_branch_name' => 'Branch',
                'tbl_institution_gateway_name' => 'Gateway',
                'tbl_status_name' => 'Status',
            );
        }
        if($repId==2){
            $data = array(
                'tbl_wifi_session_iv' => 'Session&nbsp;Iv',
                'tbl_wifi_session_hid' => 'Session&nbsp;Hid',
                'tbl_wifi_session_clientip' => 'Client&nbsp;IP',
                'tbl_wifi_session_clientmac' => 'Client&nbsp;Mac',
                'tbl_wifi_session_client_type' => 'Client&nbsp;Type',
                'tbl_wifi_session_gatewayname' => 'Gateway&nbsp;Name',
                'tbl_wifi_session_gatewayurl' => 'Gateway&nbs;Url',
                'tbl_wifi_session_version' => 'Version',
                'tbl_wifi_session_gateway_address' => 'Gateway&nbsp;Address',
                'tbl_wifi_session_gatewaymac' => 'Gatway&nbsp;Mac',
                'tbl_wifi_session_origin_url' => 'Origin&nbsp;Url',
                'tbl_wifi_session_clientif' => 'ClientIf',
                'tbl_wifi_session_gateway_hash' => 'Gateway&nbsp;Hash',
                'tbl_wifi_session_rhid' => 'RHID',
                'tbl_wifi_session_request_time' => 'Request&nbsp;Time',
                'is_active' => "Is&nbsp;Active",
            );
           
        }
                   
        return $data;
        
    }
}
