<?php

namespace App\Controllers;

use App\Models\RegistrationModel; 
use App\Models\CityModel; 
use App\Models\GuesthouseModel; 
use App\Models\BookingModel; 

class Admin extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $checkUser = $session->get('id');

        $ghModel = new GuesthouseModel();
        $guesthouse_list = $ghModel->orderby('name')->findAll();
        $data = array();
        $data['guesthouse_list'] = $guesthouse_list;
        if ($checkUser) 
        {
            echo view('includes/header',$data);
            echo view('admin/index',$data);
            echo view('includes/footer',$data);
        }else{
            return redirect()->to(site_url('/admin'));
        }
    }


    public function bookinglist()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $checkUser = $session->get('id');

        $session->set('top_menu', 'Admin');
        $session->set('sub_menu', 'Booking List');  
        $data['cdate'] = date('d-m-Y');
        $data['month_start'] = '01-'.date('m-Y'); 
        $ghModel = new GuesthouseModel();
        $guesthouse_list = $ghModel->orderby('name')->findAll();  
        $data['guesthouse_list'] = $guesthouse_list;
        if ($checkUser) 
        {
            echo view('includes/header',$data);
            echo view('admin/enquerylist',$data);
            echo view('includes/footer',$data);
        }
        else{
            return redirect()->to(site_url('/admin'));
        }
    }

    public function GetBookingList()
    {
       $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request(); 

        $from_date = $myrequest->getPost("from_date");
        $to_date = $myrequest->getPost("to_date");  
        $name = $myrequest->getPost("sname"); 
        $guesthouse_id = $myrequest->getPost("guesthouse_id");      
        $status = $myrequest->getPost("status");     

        $search = '';                     
        if($name!='')
        {
            $search .=" and (p.visitor_name LIKE '%".$name."%' or p.mobileno LIKE '%".$name."%') "; 
        }  

        if ($guesthouse_id>0) {
            $search .=" and p.guesthouse_id=".$guesthouse_id." ";
        }

        if ($status!=0) {
            $search .=" and p.status='".$status."' ";
        }

        $query = $db->query("select p.*,c.name as guesthouse,c.address,c.contact_person,gr.room_type from tbl_booking p left join m_guesthouse c on p.guesthouse_id=c.id left join m_guesthouse_room gr on p.room_type=gr.id where DATE(p.created_at) between '".date('Y-m-d',strtotime($from_date))."' and '".date('Y-m-d',strtotime($to_date))."' ".$search." group by p.id order by created_at desc");    
        $list ='';
        $list = $list.'<table class="table table-bordered" id="example1">
                      <thead>
                        <tr >
                          <th style="vertical-align:text-top;">SNo.</th>
                          <th style="vertical-align:text-top;">Booking No </th> 
                          <th style="vertical-align:text-top;">Booking Date </th> 
                          <th style="vertical-align:text-top;">Name </th>  
                          <th style="vertical-align:text-top;">Mobile No. </th>  
                          <th style="vertical-align:text-top;">Email ID</th>
                          <th style="vertical-align:text-top;">Checkin Date </th> 
                          <th style="vertical-align:text-top;">Checkout Date</th>   
                          <th style="vertical-align:text-top;">No of Days</th>   
                          <th style="vertical-align:text-top;">No of Bed</th>   
                          <th style="vertical-align:text-top;">Guest House Name</th>  
                          <th style="vertical-align:text-top;">Room Type</th>  
                          <th style="vertical-align:text-top;">Status</th>  
                          <th style="vertical-align:text-top;">Action</th>
                        </tr>
                      </thead>
                      <tbody>';                           
                $j=1;  
                if (count($query->getResult())>0) 
                {
                    foreach ($query->getResult() as $row) 
                    {   
                        $list = $list.'<tr>';
                            $list = $list.'<td>'.$j++.'</td>';
                            $list = $list.'<td>'.$row->booking_no.'</td>'; 
                            $list = $list.'<td>'.date('d/m/Y h:i A', strtotime($row->created_at)).'</td>';
                            $list = $list.'<td>'.$row->visitor_name.'</td>';  
                            $list = $list.'<td>'.$row->mobileno.'</td>';   
                            $list = $list.'<td>'.$row->emailid.'</td>';   
                            $list = $list.'<td>'.date('d/m/Y', strtotime($row->checkin_date)).'</td>'; 
                            $list = $list.'<td>'.date('d/m/Y', strtotime($row->checkout_date)).'</td>';  
                            $list = $list.'<td>'.$row->no_of_days.'</td>'; 
                            $list = $list.'<td>'.$row->no_of_rooms.'</td>'; 
                            $list = $list.'<td>'.$row->guesthouse.'</td>';   
                            $list = $list.'<td>'.$row->room_type.'</td>'; 
                            $list = $list.'<td>'.$row->status.'</td>'; 
                            
                            $list = $list.'<td>';  
                                // $list = $list.'<button type="button" onclick="PrintPI('.$row->id.');" class="btn btn-primary btn-xs m-1" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button> '; 
                            if ($row->status=='Pending') { 
                                $list = $list.'<button type="button" onclick="showacceptmodal('.$row->id.');" class="btn btn-info btn-xs m-1" data-toggle="tooltip" title="Accept"><i class="fa fa-check"></i> Accept </button> '; 
                            }        
                            else
                            {
                                $list = $list.'<button type="button" onclick="showacceptmodal('.$row->id.');" class="btn btn-info btn-xs m-1" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i> View Detail </button> ';
                            }                     
                            $list = $list.'</td>';
                        $list = $list.'</tr>';
                    } 
                }
                else
                {
                    $list = $list.'<tr>';
                        $list = $list.'<td colspan="21">Record not found..</td>';
                    $list = $list.'</tr>';
                                       
                }
                $list = $list.'</tbody>';                          
                $list = $list.'</table>';
            echo $list;
    }



    public function getbookingdetail()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request(); 

        $booking_id = $myrequest->getPost("booking_id");       

        $query = $db->query("select p.*,c.name as guesthouse,c.address,c.contact_person,gr.room_type from tbl_booking p left join m_guesthouse c on p.guesthouse_id=c.id left join m_guesthouse_room gr on p.room_type=gr.id where p.id=".$booking_id."");   
        $row = $query->getRow();  

        $list ='';
        $list = $list.'<table class="table table-bordered" id="example1">
                      <thead>';

                    $list = $list.'<tr>';
                              $list = $list.'<th>Booking No</th>';
                              $list = $list.'<td>'.$row->booking_no.'</td>';
                              $list = $list.'<th> </th>';  
                              $list = $list.'<td></td>';
                    $list = $list.'</tr>'; 
                    $list = $list.'<tr>';
                              $list = $list.'<th>Booking Date & Time</th>';
                              $list = $list.'<td>'.date('d/m/Y h:i A', strtotime($row->created_at)).'</td>';
                              $list = $list.'<th>Name </th>';  
                              $list = $list.'<td>'.$row->visitor_name.'</td>';
                    $list = $list.'</tr>'; 
                   

                    $list = $list.'<tr>';
                              $list = $list.'<th>Mobile No. </th>'; 
                              $list = $list.'<td>'.$row->mobileno.'</td>';
                              $list = $list.'<th>Email ID </th>';  
                              $list = $list.'<td>'.$row->emailid.'</td>';
                    $list = $list.'</tr>';

                    $list = $list.'<tr>';
                              $list = $list.'<th>Checkin Date  </th>'; 
                              $list = $list.'<td>'.date('d/m/Y', strtotime($row->checkin_date)).'</td>';
                              $list = $list.'<th>Checkout Date</th>';  
                              $list = $list.'<td>'.date('d/m/Y', strtotime($row->checkout_date)).'</td>';
                    $list = $list.'</tr>';

                    $list = $list.'<tr>';
                              $list = $list.'<th>No of Days</th>'; 
                              $list = $list.'<td>'.$row->no_of_days.'</td>';
                              $list = $list.'<th>No of Bed</th>';  
                              $list = $list.'<td>'.$row->no_of_rooms.'</td>';
                    $list = $list.'</tr>';

                    $list = $list.'<tr>';
                              $list = $list.'<th>Guest House Name</th>'; 
                              $list = $list.'<td>'.$row->guesthouse.'</td>';
                              $list = $list.'<th>Room Type</th>';  
                              $list = $list.'<td>'.$row->room_type.'</td>';
                    $list = $list.'</tr>';

                    $list = $list.'<tr>';
                              $list = $list.'<th>Booking For</th>'; 
                              $list = $list.'<td>'.$row->booking_for.'</td>';
                              $list = $list.'<th>Department</th>';  
                              $list = $list.'<td>'.$row->department.'</td>';
                    $list = $list.'</tr>';

                    $list = $list.'<tr>';
                              $list = $list.'<th>Designation</th>'; 
                              $list = $list.'<td>'.$row->designation.'</td>';
                              $list = $list.'<th>Purpose for Visit</th>';  
                              $list = $list.'<td>'.$row->purpose_for_visit.'</td>';
                    $list = $list.'</tr>';

                    $list = $list.'<tr>';
                              $list = $list.'<th>Nationality</th>'; 
                              $list = $list.'<td>'.$row->nationality.'</td>';
                              $list = $list.'<th>Address</th>';  
                              $list = $list.'<td>'.$row->address.'</td>';
                    $list = $list.'</tr>';  
                    if ($row->status=='Pending') { 
                        $list = $list.'<tr>'; 
                                  $list = $list.'<th colspan="2" class="text-center"> <button type="button" onclick="acceptbooking('.$row->id.');" class="btn btn-info btn-xs m-1" data-toggle="tooltip" title="Accept"><i class="fa fa-check"></i> Accept </button></th>';  
                                  $list = $list.'<th colspan="2">
                                  Reason <input type="text" name="reason" id="reason" class="form-control" placeholder="Enter Reject Reason">
                                  <button type="button" onclick="rejectbooking('.$row->id.');" class="btn btn-warning btn-xs m-1" data-toggle="tooltip" title="Reject"><i class="fa fa-ban"></i> Reject </button>

                                  </th>';  
                        $list = $list.'</tr>';  
                    }
                    else
                    {
                         $list = $list.'<tr>';
                              $list = $list.'<th>Status</th>'; 
                              $list = $list.'<td>'.$row->status.'</td>';
                              $list = $list.'<th>'.$row->status.' Date</th>';  
                              $list = $list.'<td>'.date('d/m/Y h:i A', strtotime($row->approved_dt)).'</td>';
                        $list = $list.'</tr>'; 

                    }
                $list = $list.'</tbody>';                          
                $list = $list.'</table>';
            echo $list;
    }

    public function updatebookingstatus()
    {
        $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request(); 
        $email = \Config\Services::email();

        $bookmodel = new BookingModel();

        $booking_id = $myrequest->getPost("booking_id");   
        $status = $myrequest->getPost("status");   
        $reason = $myrequest->getPost("reason");  

        $query =  $db->query("select p.*,c.name as guesthouse,c.address,c.contact_person,gr.room_type from tbl_booking p left join m_guesthouse c on p.guesthouse_id=c.id left join m_guesthouse_room gr on p.room_type=gr.id where p.id=".$booking_id."");   
        $row = $query->getRow();

        $data = array('status'=>$status, 'reason'=>$reason, 'approved_dt'=>date('Y-m-d H:i:s'), 'approved_by'=>$session->get('id')); 
        $bookmodel->update($booking_id,$data);
        $msg = '';
        $msg .= 'Dear ' . $row->visitor_name . "\r\n";
        if ($status == 'Accept') {         
            $msg .= 'We are delighted to confirm your reservation at ' . $row->guesthouse . '. Thank you for choosing us for your stay. Below are the details of your booking:' . "\r\n";
            $msg .= 'Booking Details:' . "\r\n";
            $msg .= 'Guest Name: ' . $row->visitor_name . "\r\n";
            $msg .= 'Booking Number: ' . $row->booking_no . "\r\n";
            $msg .= 'Check-in Date: ' . date('d-m-Y', strtotime($row->checkin_date)) . "\r\n";
            $msg .= 'Check-out Date: ' . date('d-m-Y', strtotime($row->checkout_date)) . "\r\n";
            $msg .= 'Room Type: ' . $row->room_type . "\r\n";
            // $msg .= 'Number of Guests: ' . $row->no_of . "\r\n";
            $msg .= 'Total Amount: ' . $row->tol_amount . "\r\n";
            
            $msg .= 'Hotel Information:' . "\r\n";
            $msg .= 'Address: ' . $row->address . "\r\n";
            $msg .= 'Phone Number: ' . $row->contact_person . "\r\n";
            // $msg .= 'Email: [Hotel Email]' . "\r\n";
            // $msg .= 'Website: [Hotel Website]' . "\r\n";
            $subject = 'Booking Confirmation';
        } else {
            $msg .= 'Thank you for choosing ' . $row->guesthouse . ' for your upcoming stay. We appreciate your interest in staying with us. Unfortunately, we regret to inform you that we are unable to accommodate your booking request for the following dates: ' . date('d-m-Y', strtotime($row->checkin_date)) . ' to ' . date('d-m-Y', strtotime($row->checkout_date)) . '.' . "\r\n";
            
            $msg .= 'Reason for Rejection:' . "\r\n";
            $msg .= $reason . "\r\n";
            
            $subject = 'Booking Request Update';
        }


        //$msg = 'Testing';

        $email->setFrom('education@lohanamahaparishad.org', 'Mahasamund - PWD Guest House');
        $email->setTo($row->emailid);         
        $email->setSubject($subject.' - '.$row->guesthouse.' ');
        $email->setMessage($msg);         
      
        if ($email->send()) {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }


    public function feedbacklist()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $checkUser = $session->get('id');

        $session->set('top_menu', 'Admin');
        $session->set('sub_menu', 'Booking List');  
        $data['cdate'] = date('d-m-Y');
        $data['month_start'] = '01-'.date('m-Y'); 
        $ghModel = new GuesthouseModel();
        $guesthouse_list = $ghModel->orderby('name')->findAll();  
        $data['guesthouse_list'] = $guesthouse_list;
        if ($checkUser) 
        {
            echo view('includes/header',$data);
            echo view('admin/feedbacklist',$data);
            echo view('includes/footer',$data);
        }
        else{
            return redirect()->to(site_url('/admin'));
        }
    }

    public function GetFeedbackList()
    {
       $security = \Config\Services::security();
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $myrequest = \Config\Services::request(); 

        $from_date = $myrequest->getPost("from_date");
        $to_date = $myrequest->getPost("to_date");   

        $search = '';                     
        

        $query = $db->query("select * from feedback where DATE(created_at) between '".date('Y-m-d',strtotime($from_date))."' and '".date('Y-m-d',strtotime($to_date))."' ".$search."  order by created_at desc");    
        $list ='';
        $list = $list.'<table class="table table-bordered" id="example1">
                      <thead>
                        <tr >
                          <th style="vertical-align:text-top;">SNo.</th>
                          <th style="vertical-align:text-top;">Booking No </th> 
                          <th style="vertical-align:text-top;">Feedback Date </th> 
                          <th style="vertical-align:text-top;">Front Desk </th>  
                          <th style="vertical-align:text-top;">Housekeeping </th>  
                          <th style="vertical-align:text-top;">Airconditioning</th>
                          <th style="vertical-align:text-top;">Food </th> 
                          <th style="vertical-align:text-top;">TV viewing</th>   
                          <th style="vertical-align:text-top;">Electrical</th>   
                          <th style="vertical-align:text-top;">Plumbing</th>   
                          <th style="vertical-align:text-top;">Any other</th>   
                        </tr>
                      </thead>
                      <tbody>';                           
                $j=1;  
                if (count($query->getResult())>0) 
                {
                    foreach ($query->getResult() as $row) 
                    {   
                        $list = $list.'<tr>';
                            $list = $list.'<td>'.$j++.'</td>';
                            $list = $list.'<td>'.$row->booking_no.'</td>'; 
                            $list = $list.'<td>'.date('d/m/Y h:i A', strtotime($row->created_at)).'</td>';
                            $list = $list.'<td>'.$row->front_desk.'</td>';  
                            $list = $list.'<td>'.$row->housekeeping.'</td>';   
                            $list = $list.'<td>'.$row->airconditioning.'</td>';     
                            $list = $list.'<td>'.$row->food.'</td>'; 
                            $list = $list.'<td>'.$row->tv_viewing.'</td>'; 
                            $list = $list.'<td>'.$row->electrical.'</td>';   
                            $list = $list.'<td>'.$row->plumbing.'</td>'; 
                            $list = $list.'<td>'.$row->any_other.'</td>';   
                        $list = $list.'</tr>';
                    } 
                }
                else
                {
                    $list = $list.'<tr>';
                        $list = $list.'<td colspan="11">Record not found..</td>';
                    $list = $list.'</tr>';
                                       
                }
                $list = $list.'</tbody>';                          
                $list = $list.'</table>';
            echo $list;
    }
    
}
