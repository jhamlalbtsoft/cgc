<?php

namespace App\Controllers;

use App\Models\Users;

class User extends BaseController
{
    public function login()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $data['message'] = $session->getFlashdata('message');
        helper('form');
        echo view('login', $data);
    }


    public function checkuser()
    {
        helper(["app", "text"]);

        $myrequest = \Config\Services::request();
        $session = \Config\Services::session();
        $sessionData['gh_id'] = 0;
        $session->set($sessionData);
        $myvalues = $this->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );
        if (!$myvalues) {
            return redirect()->to(site_url('admin'));
        } else {
            $users = new Users();
            $db = \Config\Database::connect();

            $data['username'] = $myrequest->getPost('username');
            $data['password'] = $myrequest->getPost('password');
            $data['password'] = hash('md5', $data['password']);
            $allUsers = $users->select('m_user.*')->where('username', $data['username'])->findAll();
            if (count($allUsers) > 0) {
                if ($data['password'] == $allUsers[0]['password']) {
                    $sessionData['id'] = $allUsers[0]['id'];
                    $sessionData['username'] = $allUsers[0]['username'];
                    $sessionData['locationid'] = $allUsers[0]['location_id'];
                    $sessionData['usertype'] = $allUsers[0]['usertype'];
                    $sessionData['sidebar'] = $allUsers[0]['sidebar'];
                    $sessionData['gh_id'] = $allUsers[0]['guesthouse_id'];
                    $session->set($sessionData);

                    helper('cookie');

                    set_cookie([
                        'name' => 'username',
                        'value' => $allUsers[0]['username'],
                        'expire' => time() + 1000,
                        'domain' => '',
                        'secure' => false,
                        'httpOnly' => false,
                        'path' => '/',
                        'prefix' => 'ae'
                    ]);

                    set_cookie([
                        'name' => 'id',
                        'value' => $allUsers[0]['id'],
                        'expire' => time() + 1000,
                        'domain' => '',
                        'secure' => false,
                        'httpOnly' => false,
                        'path' => '/',
                        'prefix' => 'ae'
                    ]);

                    if ($session->get('id')) {
                        return redirect()->to(site_url('dashboard'));
                    } else {
                        $session->setFlashdata('message', '<div class="alert alert-warning" role="alert">You can\'t login, please try again.</div>');
                        return redirect()->to(site_url('admin'));
                    }
                } else {
                    $session->setFlashdata('message', '<div class="alert alert-warning" role="alert">The password is invalid, please check your password.</div>');
                    return redirect()->to(site_url('admin'));
                }
            } else {
                $session->setFlashdata('message', '<div class="alert alert-warning" role="alert">The user is not available in the system.</div>');
                return redirect()->to(site_url('admin'));
            }
        }
    }

    public function logout()
    {
        helper("cookie");
        $session = \Config\Services::session();
        
        $session->remove('id');
        $session->remove('username');
        $session->remove('gh_id');

        $session->destroy();
        //$session->stop();
        delete_cookie("username");
        delete_cookie("id");
        
        ob_clean();

        return redirect()->to(site_url('/admin'));
    }

    public function logoutfront()
    {
        helper("cookie");
        $session = \Config\Services::session();
        
        $session->remove('id');
        $session->remove('username');
        $session->remove('gh_id');

        $session->destroy();
        //$session->stop();
        delete_cookie("username");
        delete_cookie("id");
        
        ob_clean();

        return redirect()->to(site_url('/'));
    }


    public function forgot_password()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $data['message'] = $session->getFlashdata('message');
        helper('form');
        echo view('forgot_password', $data);
    }

    public function checkemailexist()
    {
        helper(["app", "text"]);

        $myrequest = \Config\Services::request();
        $session = \Config\Services::session();
        $myvalues = $this->validate(
            [
                'username' => ['label'=>'EMAIL', 'rules'=>'required'], 
            ]
        );
        if (!$myvalues) {
            $this->forgot_password();
        } else {
            $users = new Users();
            $db = \Config\Database::connect();
            $email = \Config\Services::email();

            $username = $myrequest->getPost('username'); 

            $allUsers = $users->select('*')->where('username', $username)->findAll();
            if (count($allUsers) > 0) {

                $otp = rand(100000,999999);
                $otp_upd['otp'] = $otp;
                $users->update($allUsers[0]['id'],$otp_upd);

                $email->setFrom('praerp23@gmail.com', 'PRA');
                $email->setTo($username); 
                
                $email->setSubject('Forgot Password OTP From PRA');
                $email->setMessage('Your otp is '.$otp.' ');

                $sess_val['userid'] = $allUsers[0]['id'];
                $sess_val['otp'] = $otp;
                $sess_val['emailid'] = $username;

                $session->set($sess_val);
              
                if ($email->send()) {
                    $session->setFlashdata('message', '<div class="alert alert-warning" role="alert">OTP Send Successfully Please check your EMAIL.</div>');
                    return redirect()->to(site_url('user/verify_otp'));
                }
                else
                {
                    $data = $email->printDebugger(['headers']);
                    $email_error = print_r($data);die();
                    $session->setFlashdata('error', '<div class="alert alert-warning" role="alert">'.$email_error.'</div>');
                    return redirect()->to(site_url('user/forgot_password'));
                }                
            } 
            else 
            {
                $session->setFlashdata('message', '<div class="alert alert-warning" role="alert">The user is not available in the Database.</div>');
                return redirect()->to(site_url('user/forgot_password'));
            }
        }
    }

    public function verify_otp()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $data['message'] = $session->getFlashdata('message');
        $data['userid'] = $session->get('userid');
        $data['otp']     = $session->get('otp');
        $data['emailid'] = $session->get('emailid');
        helper('form');
        echo view('verify_otp', $data);
    }


    public function changepassword()
    {
        //echo 'jhamlal';die();
        helper(["app", "text"]);

        $myrequest = \Config\Services::request();
        $session = \Config\Services::session();
        $myvalues = $this->validate(
            [
                'new_otp' => ['label'=>'OTP', 'rules'=>'required'], 
                'password' => 'required|min_length[5]', 
                'confirm_password' => 'required|max_length[255]|matches[password]',  
            ]
        );
        if (!$myvalues) { 
            $sess_val['userid'] = $myrequest->getPost('userid');
            $sess_val['otp'] = $myrequest->getPost('opt');
            $sess_val['emailid'] = $myrequest->getPost('emailid');

            $session->set($sess_val);

            $this->verify_otp();
        } else {
            $users = new Users();
            $db = \Config\Database::connect();

            $userid     = $myrequest->getPost('userid'); 
            $new_otp    = $myrequest->getPost('new_otp'); 
            $password   = $myrequest->getPost('password'); 
            $confirm_password = $myrequest->getPost('confirm_password');  
        

            $allUsers = $users->select('*')->where('otp', $new_otp)->where('id', $userid)->findAll();
            if (count($allUsers) > 0) 
            {
                $otp_upd['otp'] = '';
                $otp_upd['password']= md5($password); 
                $users->update($userid,$otp_upd);
               
                $session->setFlashdata('message', '<div class="alert alert-warning" role="alert">Password Changed Successfully.</div>');
                return redirect()->to(site_url('admin'));                               
            } 
            else 
            {
                $session->setFlashdata('message', '<div class="alert alert-warning" role="alert">OTP Not Match.</div>');
                return redirect()->to(site_url('user/verify_otp'));
            }
        }
    }


}