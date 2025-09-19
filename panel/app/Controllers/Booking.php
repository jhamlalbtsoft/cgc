<?php

namespace App\Controllers;

use App\Models\RegistrationModel; 
use App\Models\CollegeModel; 
use App\Models\CourseModel; 
use App\Models\LanguageModel; 
use App\Models\CityModel; 
use App\Models\ModelContact;
use App\Models\GuesthouseModel;
use App\Models\BookingModel;
use App\Models\BookingSubModel;
use App\Models\BookedRoomModel;
use App\Models\FeedbackModel;

class Booking extends BaseController
{   

    public function newbooking()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $session->set('menuname','Newbooking');

        if ($session->get('sid')>0) {
            if ($session->get('bk_guesthouse_id')>0) {  
                $data['bk_ckecking_date'] = $session->get('bk_ckecking_date');
                $data['bk_ckeckout_date'] = $session->get('bk_ckeckout_date');
                $data['bk_guesthouse_id'] = $session->get('bk_guesthouse_id');
                $data['bk_room_id']       = $session->get('bk_room_id');
                $data['no_of_days']       = $session->get('no_of_days');
            }
            else
            {
                $data['bk_ckecking_date'] = date('d-m-Y');
                $data['bk_ckeckout_date'] = date('d-m-Y');
                $data['bk_guesthouse_id'] = 0;
                $data['bk_room_id']       = 0;
                $data['no_of_days']       = 1;
            }

            $guesthouse = new GuesthouseModel(); 
            $data['guesthouse_list'] = $guesthouse->findAll();
            echo view('header_home',$data);
            echo view('newbooking',$data);
            echo view('footer_home',$data);
        }
        else
        {
            echo view('front/front_header',$data);
            echo view('login',$data);
        }
    }

    public function checkAvailability()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        // $guesthouse_id = $myrequest->getPost('guesthouse_id');
        // $checkin_date = $myrequest->getPost('checkin_date');
        // $no_of_days = $myrequest->getPost('no_of_days');
        // $checkout_date = $myrequest->getPost('checkout_date');

        // $list='';
        //  $list.='<table class="table table-bordered">';
        //         $list.='<thead>';
        //             $list.='<tr>';
        //                 $list.='<th style="vertical-align:text-top;">Category</th>'; 
        //                 if ($myrequest->getPost('checkout_date')>=$myrequest->getPost('checkin_date')) {
        //                     for ($i=$myrequest->getPost('checkin_date'); $i <=$myrequest->getPost('checkout_date') ; $i++) { 
        //                                 $list.='<th style="vertical-align:text-top;">'.date('d-m-Y',strtotime($i)).'</th>'; 
        //                     }
        //                 }
        //                 $list.='<th style="vertical-align:text-top;">Rooms Avaliable Status</th>'; 
        //                 $list.='<th style="vertical-align:text-top;">Book</th>';  
        //             $list.='</tr>';
        //         $list.='</thead>';
        //         $query = $db->query('select s.* from m_guesthouse_room s left join tbl_booked_rooms br on s.id=br.guesthouse_id where s.guesthouse_id='.$guesthouse_id.' ');
        //         if(count($query->getResult())>0)
        //         { 
        //             foreach ($query->getResult() as  $row) 
        //             { 
        //                 $query_rb = $db->query('select * from tbl_booked_rooms where room_id='.$row->id.' and booking_date between "'.date('Y-m-d', strtotime($myrequest->getPost('checkin_date'))).'" and  "'.date('Y-m-d', strtotime($myrequest->getPost('checkout_date'))).'" group by ');

        //                 $count = count($query_rb->getResult());


        //                 $list.='<tr>';
        //                     $list.='<td>'.$row->room_type.'</td>';
        //                     if ($myrequest->getPost('checkout_date')>=$myrequest->getPost('checkin_date')) {
        //                         for ($i=$myrequest->getPost('checkin_date'); $i <=$myrequest->getPost('checkout_date') ; $i++) 
        //                         { 

        //                             $list.='<td>'.$i.'</td>'; 
        //                         }
        //                     }
        //                     $list.='<td>Rooms Available</td>';  
        //                     $list.='<td><button class="default-btn btn">Book</button></td>'; 
        //                 $list.='</tr>';
        //             }    
        //         }
        //         else
        //         {

        //         }
        // $list.='</table>';
            $guesthouse_id = $myrequest->getPost('guesthouse_id');
            $checkin_date = $myrequest->getPost('checkin_date');
            $checkout_date = $myrequest->getPost('checkout_date');

            // Check if checkout date is after checkin date
            if (strtotime($checkout_date) < strtotime($checkin_date)) {
                die('Checkout date must be after checkin date.');
            }

            // Initialize the table
            $list = '<div class="table-responsive"><table class="table table-bordered" style="font-size:13px !important;">';
            $list .= '<thead>';
            $list .= '<tr>';
            $list .= '<th style="vertical-align:text-top;">Category</th>';

            // Use DateTime objects to iterate over dates
            $start = new \DateTime($checkin_date);
            $end = new \DateTime($checkout_date);
            $interval = new \DateInterval('P1D');
            $period = new \DatePeriod($start, $interval, $end->add($interval));

            // Generate table headers for each date
            foreach ($period as $date) {
                $list .= '<th style="vertical-align:text-top;">' . $date->format('d/m/Y') . '</th>';
            }

            // Add columns for room availability status and booking option
            $list .= '<th style="vertical-align:text-top;">Rooms Available Status</th>';
            $list .= '<th style="vertical-align:text-top;">Book</th>';
            $list .= '</tr>';
            $list .= '</thead>';

            // Query to fetch rooms for the given guesthouse ID
            $query = $db->query('SELECT s.* FROM m_guesthouse_room s WHERE s.guesthouse_id = ?', [$guesthouse_id]);
            $rooms = $query->getResult();

            // Check if rooms are available
            if (count($rooms) > 0) {
                foreach ($rooms as $room) {
                    $list .= '<tr>';
                    $list .= '<td>' . htmlspecialchars($room->room_type) . '</td>';
                    $overall_available = true;

                    // Iterate over each date to check booking status
                    foreach ($period as $date) {
                        $booking_date = $date->format('Y-m-d');
                        $query_rb = $db->query('SELECT COUNT(*) AS count FROM tbl_booked_rooms WHERE room_id = ? AND booking_date = ?', [$room->id, $booking_date]);
                        $booked_count = $query_rb->getRow()->count;
                        
                        // Calculate available rooms
                        $available_rooms = $room->no_of_room - $booked_count;
                        
                        // Display the number of available rooms
                        $list .= '<td>' . ($available_rooms > 0 ? $available_rooms . '' : 'Booked') . '</td>';
                        
                        // Update overall availability status
                        if ($available_rooms <= 0) {
                            $overall_available = false;
                        }
                    }

                    // Display overall availability status and booking button
                    $list .= '<td>' . ($overall_available ? 'Available' : 'Not Available') . '</td>';
                    $list .= '<td>' . ($overall_available ? '<button class="default-btn btn" onclick="setroom('.$room->id.');">Book</button>' : '').'  <button type="button" class="default-btn btn mt-2" onclick="showImage('.$guesthouse_id.','.$room->id.')">View Image</button> </td>';
                    $list .= '</tr>';
                }
            } else {
                // Display message if no rooms are available
                $list .= '<tr><td colspan="' . (count($period) + 3) . '">No rooms available.</td></tr>';
            }
            $list .= '</table></div>';
        echo $list;
    }

    public function saveBooking()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();


        $booking = new BookingModel();
        $booking_sub = new BookingSubModel();
        $booking_sub_date = new BookedRoomModel();

        $rules = [
                "no_of_rooms" => ["label" => "no of room", "rules" => "required"],
                "purpose_for_visit" => ["label" => "Purpose of Visit", "rules" => "required"],
                "address" => ["label" => "address", "rules" => "required"], 
                "designation" => ["label" => "designation", "rules" => "required"], 
            ];

        if($this->validate($rules))
        {
            $data['guesthouse_id'] = $myrequest->getPost('guesthouse_id');
            $data['checkin_date'] = date('Y-m-d',strtotime($myrequest->getPost('checkin_date')));
            $data['no_of_days'] = $myrequest->getPost('no_of_days');
            $data['checkout_date'] = date('Y-m-d',strtotime($myrequest->getPost('checkout_date')));
            $data['booking_for'] = $myrequest->getPost('booking_for');
            $data['room_type'] = $myrequest->getPost('room_type');
            $data['no_of_rooms'] = $myrequest->getPost('no_of_rooms');
            $data['room_charges'] = $myrequest->getPost('room_charges');
            $data['tol_amount'] = $myrequest->getPost('tol_amount');
            $data['mobileno'] = $myrequest->getPost('mobileno');
            $data['emailid'] = $myrequest->getPost('emailid');
            $data['department'] = $myrequest->getPost('department');
            $data['designation'] = $myrequest->getPost('designation');
            $data['visitor_name'] = $myrequest->getPost('visitor_name');
            $data['visitor_mobileno'] = $myrequest->getPost('visitor_mobileno');
            $data['purpose_for_visit'] = $myrequest->getPost('purpose_for_visit');
            $data['nationality'] = $myrequest->getPost('nationality');
            $data['address'] = $myrequest->getPost('address');
            $data['visitor_emailid'] = $myrequest->getPost('visitor_emailid');
            $data['register_id'] = $session->get('sid');
            $data['created_at'] = date('Y-m-d H:i:s');

            $srno = $this->getmaxsrno();

            $data['serial_no'] = $srno;            
            $data['booking_no'] = 'MAH/2024/'.$srno;

            $booking->insert($data);
            $last_id= $booking->getInsertID();
            $guestname = $myrequest->getPost('guestname');
            $guestage = $myrequest->getPost('guestage');
            $guestgender = $myrequest->getPost('guestgender');
            // print_r($guestname);die();
            if ($guestname) {
                $mr_arr = array_map(null, $guestname,$guestage,$guestgender); 
                foreach ($mr_arr as $tupple) {
                        $ins_data['guestname'] = $tupple[0];
                        $ins_data['guestage'] = $tupple[1];
                        $ins_data['guestgender'] = $tupple[2];
                        $ins_data['booking_id'] = $last_id;
                        $booking_sub->save($ins_data);
                } 
            }

            if ($myrequest->getPost('checkout_date')>=$myrequest->getPost('checkin_date')) {
                for ($i=$myrequest->getPost('checkin_date'); $i <=$myrequest->getPost('checkout_date') ; $i++) { 
                    $booking_data['guesthouse_id'] = $myrequest->getPost('guesthouse_id');
                    $booking_data['room_id'] = $myrequest->getPost('room_type');
                    $booking_data['booking_id'] = $last_id;
                    $booking_data['booking_date'] = date('Y-m-d',strtotime($i));
                    $booking_sub_date->save($booking_data);
                }
            }

            $session->remove('bk_ckecking_date');
            $session->remove('bk_ckeckout_date');
            $session->remove('bk_guesthouse_id');
            $session->remove('bk_room_id');
            $session->remove('no_of_days');

            $data_res = [ 'resp'=>1,'last_id'=>0,'errors' => $this->validator->getErrors()];
            echo json_encode($data_res);
        }
        else
        {   
            $data_res = ['resp'=>2,'last_id'=>0, 'errors' => $this->validator->getErrors()];
            echo json_encode($data_res);
        }

    }



    function getmaxsrno(){
        $session = \Config\Services::session();
        $db      = \Config\Database::connect(); 

        $srno = 0;
        $query = $db->query('select max(serial_no) as maxno from tbl_booking');                        
        $row=$query->getRow();
        $srno = $row->maxno;  

        $startno = 1;  

        $max_srno = $startno;
        if ($srno>0) 
        {
            $max_srno=$srno+1;
        }
        else
        {
            $max_srno=$startno;
        }  

        if ($max_srno<10) {
            $max_srno='000'.$max_srno;
        }
        else if($max_srno>10 && $max_srno<100)
        {
            $max_srno='00'.$max_srno;
        }
        else if($max_srno>100 && $max_srno<1000)
        {
            $max_srno='0'.$max_srno;
        }
        else
        {
            $max_srno=$max_srno;
        }

        return $max_srno;       
    }

    public function getRoomtype()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $guesthouse_id = $myrequest->getPost('guesthouse_id');
        $query = $db->query("select * from m_guesthouse_room where guesthouse_id=".$guesthouse_id." order by room_type asc");   

        $list ='';
        if (count($query->getResult())>0) {
            
            foreach ($query->getResultArray() as $row) 
            { 
                $list =$list.'<option value="'.$row['id'].'">'.$row['room_type'].'</option>';
            }
        }

        echo $list;
        
    }

    public function getAmount()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $guesthouse_id = $myrequest->getPost('guesthouse_id');
        $room_id = $myrequest->getPost('room_id');
        $query = $db->query("select charge from m_guesthouse_room where guesthouse_id=".$guesthouse_id." and id=".$room_id." ");   
        $amt =0;
        if (count($query->getResult())>0) {            
            foreach ($query->getResultArray() as $row) 
            { 
                $amt =$row['charge'];
            }
        }
        echo $amt;        
    }


    public function getcheckoutdate()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();
        $data['message'] = $session->getFlashdata('message');
        $checkin_date = date('Y-m-d', strtotime($myrequest->getPost('checkin_date')));
        $no_of_days = $myrequest->getPost('no_of_days');

        $checkoutdate = date('Y-m-d', strtotime($checkin_date. ' + '.$no_of_days.' days'));
        
        echo $checkoutdate;        
    }

    public function setsessionforbooking()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        $data['message'] = $session->getFlashdata('message');

        $checkin_date   = $myrequest->getPost('checkin_date');
        $checkout_date  = $myrequest->getPost('checkout_date');
        $guesthouse_id  = $myrequest->getPost('guesthouse_id');
        $room_id        = $myrequest->getPost('room_id');
        $no_of_days     = $myrequest->getPost('no_of_days'); 

        $ses_data['bk_ckecking_date'] = $checkin_date;
        $ses_data['bk_ckeckout_date'] = $checkout_date;
        $ses_data['bk_guesthouse_id'] = $guesthouse_id;
        $ses_data['bk_room_id']       = $room_id;         
        $ses_data['no_of_days']       = $no_of_days;         

        $session->set($ses_data); 
        echo 1;   
    }


    public function checkAvailability1()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        
            //$guesthouse_id = $myrequest->getPost('guesthouse_id');
            $checkin_date = $myrequest->getPost('checkin_date');
            $checkout_date = $myrequest->getPost('checkout_date');

            // Check if checkout date is after checkin date
            if (strtotime($checkout_date) < strtotime($checkin_date)) {
                die('Checkout date must be after checkin date.');
            }

            // Initialize the table
            $list = '<div class="table-responsive"><table class="table table-bordered" style="font-size:13px !important;">';
            $list .= '<thead>';
            $list .= '<tr>';
            $list .= '<th style="vertical-align:text-top;">Category</th>';

            // Use DateTime objects to iterate over dates
            $start = new \DateTime($checkin_date);
            $end = new \DateTime($checkout_date);
            $interval = new \DateInterval('P1D');
            $period = new \DatePeriod($start, $interval, $end->add($interval));

            // Generate table headers for each date
            foreach ($period as $date) {
                $list .= '<th style="vertical-align:text-top;">' . $date->format('d/m/Y') . '</th>';
            }

            // Add columns for room availability status and booking option
            $list .= '<th style="vertical-align:text-top;">Rooms Available Status</th>';
            $list .= '<th style="vertical-align:text-top;">Book</th>';
            $list .= '</tr>';
            $list .= '</thead>';

            $query = $db->query('select * from m_guesthouse order by name');
            $guesthouses = $query->getResult();
            if (count($guesthouses) > 0) {
                foreach ($guesthouses as $house) { 
                    $guesthouse_id = $house->id;
                    $list .= '<tr><th colspan="'.(3 + 3).'">Guest House - '.$house->name.'</th></tr>';

                    // Query to fetch rooms for the given guesthouse ID
                    $query = $db->query('SELECT s.* FROM m_guesthouse_room s WHERE s.guesthouse_id = ?', [$guesthouse_id]);
                    $rooms = $query->getResult();

                    // Check if rooms are available
                    if (count($rooms) > 0) {
                        foreach ($rooms as $room) {
                            $list .= '<tr>';
                            $list .= '<td>' . htmlspecialchars($room->room_type) . '</td>';
                            $overall_available = true;

                            // Iterate over each date to check booking status
                            foreach ($period as $date) {
                                $booking_date = $date->format('Y-m-d');
                                $query_rb = $db->query('SELECT COUNT(*) AS count FROM tbl_booked_rooms WHERE room_id = ? AND booking_date = ?', [$room->id, $booking_date]);
                                $booked_count = $query_rb->getRow()->count;
                                
                                // Calculate available rooms
                                $available_rooms = $room->no_of_room - $booked_count;
                                
                                // Display the number of available rooms
                                $list .= '<td>' . ($available_rooms > 0 ? $available_rooms . '' : 'Booked') . '</td>';
                                
                                // Update overall availability status
                                if ($available_rooms <= 0) {
                                    $overall_available = false;
                                }
                            }

                            // Display overall availability status and booking button
                            $list .= '<td>' . ($overall_available ? 'Available' : 'Not Available') . '</td>';
                            $list .= '<td>' . ($overall_available ? '<button type="button" class="default-btn btn" onclick="checkloginuser('.$guesthouse_id.','.$room->id.');" login>Login&nbsp;to&nbsp;Book</button>' : '').' <button type="button" class="default-btn btn mt-2" onclick="showImage('.$guesthouse_id.','.$room->id.')">View Image</button> </td>';
                            $list .= '</tr>';
                        }
                    } else {
                        // Display message if no rooms are available
                        $list .= '<tr><td colspan="' . (count($period) + 3) . '">No rooms available.</td></tr>';
                    }
                }
            }
            $list .= '</table></div>';
        echo $list;
    }


    public function changepassword()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        $rules = [
                "password1" => ["label" => "password", "rules" => "required|min_length[6]|max_length[10]"],
                "confirm_password" => ["label" => "confirm password", "rules" => "required|max_length[10]|matches[password1]"],                  
            ];
        if($this->validate($rules))
        {
            $password = $myrequest->getPost('password1');

            $db->query('update register set password="'.md5($password).'" WHERE id='.$session->get('sid').' ');           

            $data_res = [ 'resp'=>1,'last_id'=>0,'errors' => $this->validator->getErrors()];
            echo json_encode($data_res);
        }
        else
        {   
            $data_res = ['resp'=>2,'last_id'=>0, 'errors' => $this->validator->getErrors()];
            echo json_encode($data_res);
        }
    }

    public function savefeedbackform()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request();

        $feedback = new FeedbackModel();

        $rules = [
                "booking_no" => ["label" => "booking_no", "rules" => "required"]                 
            ];
        if($this->validate($rules))
        {
            $data['booking_no'] = $myrequest->getPost('booking_no');
            $data['front_desk'] = $myrequest->getPost('front_desk');
            $data['housekeeping'] = $myrequest->getPost('housekeeping');
            $data['airconditioning'] = $myrequest->getPost('airconditioning');
            $data['tv_viewing'] = $myrequest->getPost('tv_viewing');
            $data['electrical'] = $myrequest->getPost('electrical');
            $data['any_other'] = $myrequest->getPost('any_other'); 
            $data['plumbing'] = $myrequest->getPost('plumbing'); 
            

            $feedback->insert($data);         

            $data_res = [ 'resp'=>1,'last_id'=>0,'errors' => $this->validator->getErrors()];
            echo json_encode($data_res);
        }
        else
        {   
            $data_res = ['resp'=>2,'last_id'=>0, 'errors' => $this->validator->getErrors()];
            echo json_encode($data_res);
        }
    }


    public function getbookingdetail()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request(); 

        $booking_no = $myrequest->getPost('booking_no');

        $query = $db->query('select p.*,c.name as guesthouse,c.address as  gaddress,c.contact_person,gr.room_type from tbl_booking p left join m_guesthouse c on p.guesthouse_id=c.id left join m_guesthouse_room gr on p.room_type=gr.id where p.booking_no="'.$booking_no.'" and p.register_id='.$session->get('sid.').'');
        if (count($query->getResult())>0) {
            $row  = $query->getRow();
            $data = array(
                        'status'=>'Success',
                        'booking_date'=>date('Y-m-d h:i A', strtotime($row->created_at)),
                        'guesthouse'=>$row->guesthouse,
                        'guestname'=>$row->visitor_name,
                        'checkin_date'=>date('Y-m-d', strtotime($row->checkin_date)),
                        'checkout_date'=>date('Y-m-d', strtotime($row->checkout_date)),
                    );
        }
        else
        {
            $data = array(
                        'status'=>'Failed', 
                    );
        }        
        echo json_encode($data);
    }


    public function getimagedetail()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request(); 

        $guesthouse_id = $myrequest->getPost('guesthouse_id');
        $room_id = $myrequest->getPost('room_id');

        $list ='';

        $query = $db->query('select * from tbl_images where guesthouse_id="'.$guesthouse_id.'" ');
        if (count($query->getResult())>0) {
            $list .= '<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">';
                $list .= '<div class="carousel-indicators">';
                $i=0;
                foreach ($query->getResult() as $row) { 
                    $active ='';
                    if ($i==0) {
                        $active ='active';
                    }
                    $list .= '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" class="'.$active.'" aria-current="true" aria-label="Slide '.$i.'"></button>';  
                    $i++;
                }
                $list .= '</div>'; 
                $list .= '<div class="carousel-inner">';
                    $j=0;
                    foreach ($query->getResult() as $row) { 
                        $active ='';
                        if ($j==0) {
                            $active ='active';
                        }
                        $list .= '<div class="carousel-item '.$active.'">';
                                $list .= '<img src="assets/images/'.$row->location.'/'.$row->image.'" class="d-block" alt="guest room" style="width:100% !important;height: 300px;">';
                        $list .= '</div>';  
                        $j++;
                    }                         
                $list .= '</div>';

                       
                $list .= '<section>';
                $list .= '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>';
                          
                $list .= '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>';
                $list .= '</section>';
                $list .= '</div>';
        }
        else
        {
            $list .= '<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button> 
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 4"></button> 
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 4"></button> 
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 4"></button> 
                        </div>
                        <!-- Image Sliders -->
                        <div class="carousel-inner">
                        <!-- Image one-->
                         <div class="carousel-item active">
                            <img src="assets/images/bagbahra/16.jpg" class="d-block" alt="guest room" style="width:100% !important;height: 300px;" >
                          </div>
                          <div class="carousel-item">
                            <img src="assets/images/bagbahra/17.jpg" class="d-block" alt="guest room" style="width:100% !important;height: 300px;" >
                          </div>
                          <div class="carousel-item">
                            <img src="assets/images/bagbahra/20.jpg" class="d-block" alt="guest room" style="width:100% !important;height: 300px;" >
                          </div>
                          <div class="carousel-item">
                            <img src="assets/images/bagbahra/2.jpg" class="d-block" alt="guest room" style="width:100% !important;height: 300px;" >
                          </div>

                          <!-- image two -->
                          <div class="carousel-item">
                            <img src="assets/images/bagbahra/3.jpg" class="d-block" lt="guest room" style="width:100% !important;height: 300px;" > 
                          </div>

                          <!-- Image Three -->
                          <div class="carousel-item">
                            <img src="assets/images/bagbahra/4.jpg" class="d-block" lt="guest room" style="width:100% !important;height: 300px;" >
                          </div>

                          <!-- Image Four -->
                          <div class="carousel-item">
                            <img src="assets/images/bagbahra/8.jpg" class="d-block" lt="guest room" style="width:100% !important;height: 300px;" >
                          </div>  
                        </div>

                        <!-- Carousel Controls  -->
                       <section>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                       </section>
                      </div>';
        }        
        echo $list;
    }

}
