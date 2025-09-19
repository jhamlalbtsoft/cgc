<?php

namespace App\Controllers;

use App\Models\RegistrationModel; 
use App\Models\CollegeModel; 
use App\Models\CourseModel; 
use App\Models\LanguageModel; 
use App\Models\CityModel; 
use App\Models\ModelContact;
use App\Models\GuesthouseModel;

class Home extends BaseController
{
    public function index()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $session->set('menuname','Home');
        echo view('front/front_header',$data);
        echo view('index',$data);
    }

    public function admin()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');

        return view('admin/login',$data);
    }

    public function registration()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');

        $city = new CityModel(); 
        $data['city_list'] = $city->findAll();
        return view('registration',$data);
    }

    public function thankyou()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');

        return view('thankyou',$data);
    }

    public function sendotp()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        $myvalues = $this->validate(
                [
                    'name'=>'required',
                    'mobileno'=>'required|numeric|max_length[10]|min_length[10]',
                    'password'=>'required',
                ]
            );
            if(!$myvalues) {
                $sessionData['message'] = 'Please Enter Valid Mobile no. and Password';
                $session->setFlashdata('message','Please Enter Valid Mobile no. and Password');
                $session->markAsTempdata('message',30);
                $this->index();
            }
            else
            {
                $sendmobile = $myrequest->getPost('mobileno');
                $mobileno = '';
                $query=$db->query("select mobileno,id from register where mobileno='".$sendmobile."'"); 
                if (count($query->getResult())>0) {
                    $rowt=$query->getRow();   
                    $mobileno = $rowt->mobileno;
                    $last_id = $rowt->id;
                }
                

                if ($sendmobile==$mobileno) { 

                    $rand_otp=rand(10000,99999);
                    $msg = 'Hi, Your OTP Verification Code against your registration is '.$rand_otp.'. Do Not share with anyone else. BTSOFT';
                    $this->sendotpmessage($sendmobile,$msg);

                    $registration = new RegistrationModel(); 
                    $data['otp'] = $rand_otp; 
                    $registration->update($last_id,$data);  
                    $sessionData['message'] = 'Record Saved successfully';
                    $sessionData['send_otp'] = $rand_otp; 
                    $session->set($sessionData);
                    $session->markAsTempdata('message',30);
                    echo $last_id;
                }else{                     
                    $rand_otp=rand(10000,99999);
                    $msg = 'Hi, Your OTP Verification Code against your registration is '.$rand_otp.'. Do Not share with anyone else. BTSOFT';
                    $this->sendotpmessage($sendmobile,$msg);               

                    $registration = new RegistrationModel();
                    $data['name'] = $myrequest->getPost('name');
                    $data['mobileno'] = $myrequest->getPost('mobileno');
                    $data['password'] = md5($myrequest->getPost('password'));
                    $data['otp'] = $rand_otp; 
                    $registration->insert($data);
                    $last_id= $registration->getInsertID(); 
                    $sessionData['message'] = 'Record Saved successfully';
                    $sessionData['send_otp'] = $rand_otp; 
                    $session->set($sessionData);
                    $session->markAsTempdata('message',30);
                    echo $last_id;
                }
            }

        // return view('registration');
    }


    public function sendotpmessage($mobileno,$message)
    { 
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=e5a518bed146a3a797f08dede042f1e3&message='.urlencode($message).'&senderId=BTSOL&routeId=1&mobileNos='.$mobileno.'&smsContentType=english&entityid=1201160438979641336&tmid=140200000022&templateid=1707171652652309251&concentFailoverId=30',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: JSESSIONID=5E0AA736320E7723EA192B963822A9CF.node3'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
    }

    public function verify()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        $myvalues = $this->validate(
                [
                    'otp'=>'required',
                ]
            );
            if(!$myvalues) {
                $sessionData['message'] = 'Please Enter Valid OTP.';
                $session->markAsTempdata('message',30);
                $session->setFlashdata('message','Please Enter Valid OTP.');
                    // return redirect()->to(site_url('Home/index'));
                echo 0;
            }
            else
            {
                
                $send_otp = $session->get('send_otp');
                $otp = $myrequest->getPost('otp');
                $sid = $myrequest->getPost('stid');
                if ($send_otp==$otp) {
                    $db->query('update register set is_verify=1 WHERE id='.$sid.' ');    
                    $query=$db->query("select * from register where id='".$sid."'"); 
                    $rowt=$query->getRow();   
                    $sessionData['name'] = $rowt->name;
                    $sessionData['mobileno'] = $rowt->mobileno;
                    $sessionData['sid'] = $sid;
                    $sessionData['message'] = 'Record Saved successfully fill Registration Form';
                    $session->set($sessionData);
                    $session->setFlashdata('message','Record Saved successfully fill Registration Form');
                    $session->markAsTempdata('message',30);
                    echo 1;                    
                }else{
                   
                    $sessionData['message'] = 'Please Enter Valid OTP.';
                    $session->set($sessionData);
                    $session->setFlashdata('message','Please Enter Valid OTP.');
                    $session->markAsTempdata('message',30);
                    echo 0;
                }
            }

        // return view('registration');
    }


    public function finalsave()
    {
        // $myvalues = $this->validate(
        //         [
        //             'emailid'=>'required',
        //             // 'college'=>'required',
        //             // 'current_level'=>'required',
        //             // 'course'=>'required',
        //             // 'passed_year'=>'required',
        //             // 'medium_of_school'=>'required',
        //             // 'medium_of_college'=>'required',
        //         ]
        //     );
        //     if(!$myvalues) {
        //         echo 0;
        //     }
        //     else
        //     {
                $security = \Config\Services::security();
                $session = \Config\Services::session();
                $db      = \Config\Database::connect();
                $myrequest = \Config\Services::request();

                $po_file=''; 
                if($file = $this->request->getFile('guestidfile')) 
                {
                    if (!empty($file->getName())) 
                    {  
                        if ($file->isValid() && ! $file->hasMoved()) 
                        {
                           // Get file name and extension
                           $name = $file->getName();
                           $ext = $file->getClientExtension();

                           // Get random file name
                           $po_file = $file->getRandomName(); 

                           // Store file in public/uploads/ folder
                           $file->move('uploads', $po_file);   
                           $data['guestidfile'] = $po_file;
                        }
                    }            
                }


                $data['emailid'] = $myrequest->getPost('emailid');
                $data['name'] = $myrequest->getPost('name');
                $data['gender'] = $myrequest->getPost('gender');
                $data['age'] = $myrequest->getPost('age');
                $data['mobileno'] = $myrequest->getPost('mobileno');
                $data['address'] = $myrequest->getPost('address');
                $data['city'] = $myrequest->getPost('city');
                $data['guestid'] = $myrequest->getPost('guestid');
                $data['guesttype'] = $myrequest->getPost('guesttype');
                $registration = new RegistrationModel();
                $sid = $session->get('sid');
                $registration->update($sid,$data);
                $sessionData['message'] = 'Record Saved successfully';
                $session->set($sessionData);
                $session->setFlashdata('message','Record Saved successfully');
                $session->markAsTempdata('message',30);
                return redirect()->to(site_url('Home/thankyou'));

            // }

        // return view('registration');
    }


    public function savecontact()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $ModelContact = new ModelContact();
       
        $name = $myrequest->getPost('name');  
        $email = $myrequest->getPost('email');  
        $phone_number = $myrequest->getPost('phone_number');  
        $msg_subject = $myrequest->getPost('msg_subject');    
        $message = $myrequest->getPost('message');    
        
        $data['name'] = $myrequest->getPost('name');
        $data['email'] = $myrequest->getPost('email');
        $data['phone_number'] = $phone_number;
        $data['msg_subject'] = $msg_subject;
        $data['message'] = $message; 
        $data['cdatetime'] = date('Y-m-d H:i:s'); 

        $ModelContact->insert($data);
        $last_id= $ModelContact->getInsertID(); 

        $sessionData['message'] = 'Record Saved successfully';
        $session->set($sessionData);
        $session->markAsTempdata('message',30);
        echo $last_id; 
    }

    public function GetListById()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $ModelContact = new ModelContact();
       
        $sid = $myrequest->getPost('id');
        $query=$db->query("select * from register where id='".$sid."'"); 
        $rowt=$query->getResultArray(); 

        return json_encode($rowt);
    }

    public function login()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $session->set('menuname','Login');
        $data['bk_ckecking_date'] = $session->get('bk_ckecking_date');
        $data['bk_ckeckout_date'] = $session->get('bk_ckeckout_date');
        $data['bk_guesthouse_id'] = $session->get('bk_guesthouse_id');
        $data['bk_room_id']       = $session->get('bk_room_id');
        $data['no_of_days']       = $session->get('no_of_days');

        echo view('front/front_header',$data);
        echo view('login',$data);
        //echo view('front/front_footer',$data);
    }

    public function checklogin()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        $myvalues = $this->validate(
            [
                'mobileno'=>'required',
                'password'=>'required',
            ]
        );
        if(!$myvalues) {
            $sessionData['message'] = 'Please Enter Valid Mobile no. and Password';
            $session->setFlashdata('message','Please Enter Valid Mobile no. and Password');
            $session->markAsTempdata('message',30);
            $this->index();
        }
        else
        {
            $sendmobile = $myrequest->getPost('mobileno');
            $password = md5($myrequest->getPost('password'));
            $mobileno = '';


            $query=$db->query("select mobileno,id,name,password,is_verify from register where mobileno='".$sendmobile."'"); 
            if (count($query->getResult())>0) {
                $rowt=$query->getRow(); 
                if ($password!=$rowt->password) {
                    echo 2;
                }
                else if($rowt->is_verify==0)
                {
                    echo 4;
                }
                else
                {                  
                    $last_id = $rowt->id;
                    $sessionData['sid'] = $last_id;
                    $sessionData['guest_name'] = $rowt->name;
                    $session->set($sessionData);
                    echo 1;
                }
            }
            else
            {
                echo 3;
            }
        }
    }

    public function guesthome()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');

        if ($session->get('sid')){
            if ($session->get('bk_room_id')>0 && $session->get('bk_guesthouse_id')>0)
            {
                $guesthouse = new GuesthouseModel(); 
                $data['guesthouse_list']  = $guesthouse->findAll();
                $data['bk_ckecking_date'] = date('Y-m-d', strtotime($session->get('bk_ckecking_date')));
                $data['bk_ckeckout_date'] = date('Y-m-d', strtotime($session->get('bk_ckeckout_date')));
                $data['bk_guesthouse_id'] = $session->get('bk_guesthouse_id');
                $data['bk_room_id']       = $session->get('bk_room_id');
                $data['no_of_days']       = $session->get('no_of_days');

                echo view('header_home',$data);
                echo view('newbooking',$data);
                echo view('footer_home',$data);
            }
            else
            {
                echo view('header_home',$data);
                echo view('guesthome',$data);
                echo view('footer_home',$data);  
            }      
        }
        else
        {
            return redirect()->to(site_url('Home/login'));
        }       
    }

    public function checkroom()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');

        $guesthouse = new GuesthouseModel(); 
        $data['guesthouse_list'] = $guesthouse->findAll();
        
        //echo view('header',$data);
        echo view('check_room',$data);
        echo view('front/front_footer',$data);
    }

    public function guesthouselist()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');

        $guesthouse = new GuesthouseModel(); 
        $data['guesthouse_list'] = $guesthouse->findAll();

        
        //echo view('header',$data);
        echo view('guesthouselist',$data);
        echo view('front/front_footer',$data);
    }


    public function changepassword()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $session->set('menuname', 'changepassword');
        if ($session->get('sid')){            
            echo view('header_home',$data);
            echo view('change_password',$data);
            echo view('footer_home',$data);                  
        }
        else
        {
            return redirect()->to(site_url('Home/login'));
        }       
    }

    public function printBookingSlip()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $session->set('menuname', 'printBookingSlip');
        if ($session->get('sid'))
        {
            $query = $db->query('select p.*,c.name as guesthouse,c.address,c.contact_person,gr.room_type from tbl_booking p left join m_guesthouse c on p.guesthouse_id=c.id left join m_guesthouse_room gr on p.room_type=gr.id where p.register_id='.$session->get('sid').'');

            $data['booking_list'] = $query->getResult();
            echo view('header_home',$data);
            echo view('print_booking_slip',$data);
            echo view('footer_home',$data);                  
        }
        else
        {
            return redirect()->to(site_url('Home/login'));
        }       
    }

    public function booking_print($booking_id)
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request(); 

        $query = $db->query('select p.*,c.name as guesthouse,c.address as  gaddress,c.contact_person,gr.room_type from tbl_booking p left join m_guesthouse c on p.guesthouse_id=c.id left join m_guesthouse_room gr on p.room_type=gr.id where p.id='.$booking_id.' ');

        $data['brow'] = $query->getRow();

        $query_sub = $db->query('select * from tbl_booking_sub where booking_id='.$booking_id.'');
        $data['sub_result'] = $query_sub->getResult();

        $data['session_id'] = $session->get('sid');        
        echo view('booking_print',$data);       
    }

    public function feedbackform()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $session->set('menuname', 'feedbackform');
        if ($session->get('sid')){            
            echo view('header_home',$data);
            echo view('feedbackform',$data);
            echo view('footer_home',$data);                  
        }
        else
        {
            return redirect()->to(site_url('Home/login'));
        }       
    }

}
