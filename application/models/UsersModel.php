<?php

Class UsersModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper( 'common_helper' );
    }

    public function sendOtp()
    {
        $sendarray       = array();
        $mobile          = $this->input->post( 'to' );
        $referal_code     = $this->input->post( 'referal_code' );
        $is_deleted_user = $this->db->where( 'status', 0 )->where( 'mobile', '91'.$mobile )->get( 'administrator' )->result_array();

        if ( count( $is_deleted_user ) > 0 )
        {
            $sendarray[ 'status' ]     =    0 ;
            // $sendarray[ 'redurl' ]	   =    site_url( 'login' );
            $sendarray[ 'message' ]    =   'Your account has been deleted. please contact to admin.';
        } else {

            $wmb = '91'.$mobile;
            $is_usr = $this->db->where( 'mobile', $wmb )->get( 'administrator' )->row_array();
            if ( !empty( $referal_code ) )
            {
                if ( empty( $is_usr ) )
                {
                    $is_valid = $this->db->where( 'referal_code', $referal_code )->get( 'administrator' )->row_array();
                    if ( empty( $is_valid ) )
                    {
                        $sendarray[ 'status' ]       =    0 ;
                        $sendarray[ 'message' ]      =   'invalid referal code.';

                    }

                } elseif ( !empty( $is_usr ) )
                {
                    $sendarray[ 'status' ]       =    0 ;
                    $sendarray[ 'message' ]      =   'Only new user are aligible for referal code.';

                }
                return json_encode( $sendarray );
            }

            $authkey    = '389779AiUOneGnq3U63dba18bP1';
            $sender     = 'AGNTEN';
            $DLT_TE_ID  = '1207167663013863576';
            $message    = '##OTP## is your OTP for Login/Register from Agentian. OTP is valid for 60 Sec. Do not share this OTP with anyone.';

            $postData = array(
                'authkey' => $authkey,
                'sender' => $sender,
                'DLT_TE_ID' => $DLT_TE_ID,
                'mobiles' => '91'.$mobile,
                'message' => $message,
            );

            $curl = curl_init();

            curl_setopt_array( $curl, array(
                CURLOPT_URL => 'http://api.msg91.com/api/sendotp.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $postData,
                CURLOPT_HTTPHEADER => array(
                    'Cookie: PHPSESSID=c7tfb12pfue30gvoeat03srm26'
                ),
            ) );

            $response = curl_exec( $curl );
            curl_close( $curl );
            $decres = json_decode( $response, true );
            if ( $decres[ 'type' ] == 'success' )
            {
                $sess_val = array(
                    'mobile'       => $mobile,
                    'referal_code' => $referal_code,
                );

                $this->session->set_userdata( $sess_val );

                $sendarray[ 'status' ]       =    1 ;
                $sendarray[ 'redurl' ]	   =    site_url( 'verify_otp' );
                $sendarray[ 'message' ]      =   'successfully send verification code';
            }
            if ( $decres[ 'type' ] == 'error' )
            {
                $sendarray[ 'status' ]       =    0 ;
                $sendarray[ 'message' ]      =   'Your Otp "'.$decres[ 'message' ].'" ';
            }
        }
        return  json_encode( $sendarray, true );
    }

    public function verifyOtp()
    {
        $sendarray = array();
        $wallet        = $this->db->where( 'status', 1 )->get( 'wallet_system' )->row_array();
        $to            = $this->session->userdata( 'mobile' );

        $referal_code  = $this->session->userdata( 'referal_code' );

        $otp           = $this->input->post( 'code' );
        $authkey       = '389779AiUOneGnq3U63dba18bP1';
        $postData = array(
            'authkey' => $authkey,
            'mobile' => '91'.$to,
            'otp'     => $otp,
        );

        $curl = curl_init();
        curl_setopt_array( $curl, array(
            CURLOPT_URL => 'http://api.msg91.com/api/verifyRequestOTP.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
                'Cookie: PHPSESSID=c7tfb12pfue30gvoeat03srm26'
            ),
        ) );

        $response = curl_exec( $curl );
        curl_close( $curl );
        $decres = json_decode( $response, true );
        if ( $decres[ 'type' ] == 'success' )
        {
            $user =  $this->db->select( '*' )
            ->where( 'mobile', $postData[ 'mobile' ] )
            ->where( 'status', 1 )
            ->get( 'administrator' )
            ->row_array();
            if ( !empty( $user ) )
            {
                $sendarray[ 'user_type' ]  =   'old user';

                $this->session->unset_userdata( 'mobile' );
                $this->session->set_userdata( $user );

            } else {

                // new_user
                $newuser = array(

                    'mobile'       =>  $postData[ 'mobile' ],
                    'referal_code' =>  generate_referal_code(),
                    'status'       =>  1,
                    'token'        => '',
                    'membership_type'        => '',
                );
                $this->db->insert( 'administrator', $newuser );

                $uid = $this->db->insert_id();

                // add free bonus
                $credited = array(

                    'user_id'   =>  $uid,
                    'credit'    =>  !empty( $wallet[ 'wallet_bonus' ] )?$wallet[ 'wallet_bonus' ]:'0',
                    'available' =>  !empty( $wallet[ 'wallet_bonus' ] )?$wallet[ 'wallet_bonus' ]:'0',
                    'status'    =>  1,
                );
                $this->db->insert( 'transaction', $credited );

                // add referal bonus
                if ( !empty( $referal_code ) )
                {
                    $referal_amount = $this->db->where( 'status', 1 )->get( 'referal_code' )->row()->referal_amount;

                    $rc_uid = $this->db->where( 'referal_code', $referal_code )->get( 'administrator' )->row()->aid;

                    $credit =  $this->db->select_sum( 'credit' )
                    ->from( 'transaction' )
                    ->where( 'user_id', $rc_uid )
                    ->where( 'status', 1 )
                    ->get()->row_array();

                    $debit =  $this->db->select_sum( 'debit' )
                    ->from( 'transaction' )
                    ->where( 'user_id', $rc_uid )
                    ->where( 'status', 1 )
                    ->get()->row_array();

                    $wallet =  $credit[ 'credit' ] - $debit[ 'debit' ];

                    $referal_cr = array(

                        'user_id'  =>  $rc_uid,
                        'credit'   =>  $referal_amount,
                        'available'=>	 $wallet + $referal_amount,
                        'category' =>  2,
                    );

                    $this->db->insert( 'transaction', $referal_cr );

                }

                $newuser = $this->db->select( '*' )->where( 'aid', $uid )->get( 'administrator' )->row_array();

                $sendarray[ 'user_type' ]  =   'new user';
                $this->session->unset_userdata( 'mobile' );
                $this->session->set_userdata( $newuser );
            }
            $sendarray[ 'status' ]       =    1 ;
            $sendarray[ 'to' ]           =   $postData[ 'mobile' ];
            $sendarray[ 'redurl' ]       =   site_url( '/' );
            $sendarray[ 'message' ]      =   'successfully verified otp';

        }
        if ( $decres[ 'type' ] == 'error' )
        {
            $sendarray[ 'status' ]       =    0 ;
            $sendarray[ 'message' ]      =   'Your Otp is "'.$decres[ 'message' ].'" ';
        }
        return  json_encode( $sendarray, true );

    }

    public function getallUser()
    {
        $final_array = array();
        $query = $this->db->where( 'status', 1 )->get( 'administrator' )->result_array();

        foreach ( $query as $row )
        {
            $post = $this->db->where( 'user_id', $row[ 'aid' ] )->get( 'property' )->result_array();
            $post_price = $this->db->where( 'status', 1 )->get( 'wallet_system' )->row()->post_price;
            $credit =   $this->db->select_sum( 'credit' )->where( 'user_id', $row[ 'aid' ] )->where( 'status', 1 )->get( 'transaction' )->row_array();
            $debit =    $this->db->select_sum( 'debit' )->where( 'user_id', $row[ 'aid' ] )->where( 'status', 1 )->get( 'transaction' )->row_array();

            $row[ 'wallet' ] =  $credit[ 'credit' ] - $debit[ 'debit' ];
            $row[ 'total_post' ] = count( $post );

            array_push( $final_array, $row );
        }
        return $final_array;
    }

    public function getOneUser( $aid )
    {
        return $this->db->where( 'aid', $aid )->get( 'administrator' )->row_array();
    }

    public function update_profile()
    {

        $sendarray = array();
        $post_val  =  $this->input->post();
        $referal   = $this->db->where( 'status', 1 )->get( 'referal_code' )->row_array();

        if ( !empty( $post_val[ 'aid' ] ) )
        {
            if ( !empty( $_FILES[ 'employee_image' ][ 'name' ] ) )
            {
                $image = uploadimgfile( 'employee_image', 'assets/userprofile/images', 'pre' );
                if ( $image[ 'status' ] == 0 )
                {
                    $senddata[ 'message' ] = $image[ 'message' ];

                    return json_encode( $senddata );
                }

                if ( $image[ 'status' ] == 1 )
                {
                    $post_val[ 'image' ] = $image[ 'data' ][ 'name' ];
                }

            }

            $query = $this->db->where( 'aid', $post_val[ 'aid' ] )->update( 'administrator', $post_val );
            if ( $query )
            {
                $sendarray[ 'status' ] = 1;
                $sendarray[ 'message' ] = 'successfully updated user profile';
            } else {
                $sendarray[ 'status' ] = 0;
                $sendarray[ 'message' ] = 'not updated .';
            }

        } else {
            $sendarray[ 'status' ] = 0;
            $sendarray[ 'message' ] = 'something went wrong.';

        }
        return json_encode( $sendarray );
    }

    public function AddUsers()
    {
        $administrator	 = 	$this->input->post( 'administrator' );

        // return "<div class='alert alert-info'>Company $compnay_array[name] Updated successfully.</div>";

        if ( !empty( $administrator ) )
        {
            $administrator[ 'password' ] 	 = 	trim( $administrator[ 'password' ] );
            $administrator[ 'email' ] 	 = 	trim( $administrator[ 'email' ] );

            if ( !filter_var( $administrator[ 'email' ], FILTER_VALIDATE_EMAIL ) )
            {
                return "<div class='alert alert-danger'>Please enter valid email address.</div>";
            }

            if ( empty( $administrator[ 'aid' ] ) && empty( $administrator[ 'password' ] ) )
            {
                return "<div class='alert alert-danger'>Password is required to Create User.</div>";
            }

            if ( !empty( $administrator[ 'password' ] ) )
            {
                if ( $administrator[ 'password' ] != $this->input->post( 'confirm_password' ) )
                {
                    return "<div class='alert alert-danger'>Password and confirm Password must be same.</div>";
                }
                $administrator[ 'password' ]	 = 	md5( $administrator[ 'password' ] );
            } else {
                unset( $administrator[ 'password' ] );
            }

            //  check if exist on the traders users

            $temp	 = 	$this->db->query( "SELECT name FROM `traders` WHERE email = '$administrator[email]'; " )->result_array();
            if ( !empty( $temp ) )
            {
                $message	 = 	"$administrator[email] is already have account with Trader's name ".$temp[ 0 ][ 'name' ].'.';
                return "<div class='alert alert-danger'>$message</div>";
            }

            $temp	 = 	$this->db->query( "SELECT name FROM `traders` WHERE mobile = '$administrator[mobile]'; " )->result_array();
            if ( !empty( $temp ) )
            {
                $message	 = 	"$administrator[mobile] is already have account with Trader's name ".$temp[ 0 ][ 'name' ].'.';
                return "<div class='alert alert-danger'>$message</div>";
            }

            //  check if exist on the traders users

            $temp	 = 	$this->db->query( "SELECT name FROM `administrator` where aid != '$administrator[aid]' AND email = '$administrator[email]'; " )->result_array();
            if ( !empty( $temp ) )
            {
                $temp = $temp[ 0 ];
                return "<div class='alert alert-danger'>$administrator[email] is already have account with name $temp[name].</div>";
            }

            $temp	 = 	$this->db->query( "SELECT name FROM `administrator` where aid != '$administrator[aid]' AND mobile = '$administrator[mobile]'; " )->result_array();
            if ( !empty( $temp ) )
            {
                $temp = $temp[ 0 ];
                return "<div class='alert alert-danger'>$administrator[mobile] is already have account with name $temp[name].</div>";
            }

            if ( !empty( $administrator[ 'permission' ] ) )
            {
                $administrator[ 'permission' ] = 	json_encode( $administrator[ 'permission' ] );
            }

            $logincheck	 = 	$this->session->userdata();

            $administrator[ 'updated' ]	 = 	gettime4db();

            $for_redirect	 = 	"
											<script>
												window.location.href='".site_url( 'administrator/users/view/' )."';
											</script>
										";

            if ( !empty( $administrator[ 'aid' ] ) )
            {
                $this->db->where( 'aid', $administrator[ 'aid' ] );

                $this->db->update( 'administrator', $administrator );

                $this->AuthenticationModel->add_activity( "Sub-User $administrator[name] Updated successfully.", $logincheck[ 'token' ], $logincheck[ 'usertype' ] );

                return "<div class='alert alert-info'>Sub-User $administrator[name] Updated successfully.  $for_redirect </div>";

            } else {
                $administrator[ 'added' ]	 = 	gettime4db();
                $this->db->insert( 'administrator', $administrator );

                $this->AuthenticationModel->add_activity( "Sub-User $administrator[name] Added successfully.", $logincheck[ 'token' ], $logincheck[ 'usertype' ] );

                return "<div class='alert alert-success'>Sub-User $administrator[name] Added successfully. $for_redirect</div>";
            }
        }
        return '';
    }
}