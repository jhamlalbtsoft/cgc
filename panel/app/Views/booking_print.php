<!DOCTYPE html>
<html lang="en">
<head>
        <base href="<?=site_url()?>">
        <meta charset="utf-8" />
        <title>Booking No - <?=$brow->booking_no?></title>
        <meta name="description" content=" PWD Rest House Booking Portal - Mahasamund" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="#" />

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> 
  <style type="text/css">
    .brdleft { border-top:1px solid grey;border-left:1px solid grey;padding:3px; }
    .brdright { border-top:1px solid grey;border-right:1px solid grey;border-left:1px solid grey;padding:3px; }
    
</style>
</head>
<body>
  <div style="border:1px solid grey;">
    <?php //if($session_id==$brow->register_id){?>
    <table style="width:100%;border-bottom: 1px solid grey;margin-bottom: 5px;">
      <tr>
        <td style="width:20%; text-align: center;"><img src="assets/images/logo.png" style="width:100px;" lt="logo" /></td>
        <td style="width:60%; vertical-align: text-top;text-align: center;">
            <span style="font-size: 24px; font-weight: bold;"><?=$brow->guesthouse?></span> <br>
            <span  style="font-size: 14px; font-weight: bold;">Address : <?=$brow->gaddress?></span> <br>
            <span  style="font-size: 14px; font-weight: bold;">Contact Person : <?=$brow->contact_person?>, Contact No : - <?=$brow->mobileno?></span>
        </td>
        <td style="width:20%; text-align: center;"><img src="assets/images/gandhi.png" style="width:120px;" lt="logo" />   </td>
      </tr>
    </table>
    <table style="width:100%;border-bottom: 1px solid grey;margin-bottom: 5px;">
        <tr>
            <td style="width:100%; text-align: center;padding-left: 20px;font-weight: bold;">BOOKING SLIP</td>  
        </tr>
    </table>

    <table style="width:100%;margin-bottom: 5px;">
        <tr>
            <td style="width:50%; text-align: left;padding-left: 20px;">Booking No : <?=$brow->booking_no?>  </td> 
            <td style="width:50%; text-align: left;"> Booking Date & Time : <?=date('d-m-Y h:i A', strtotime($brow->created_at))?>   </td> 
        </tr>

        <tr>
            <th style="width:50%; text-align: left;padding-left: 20px;">Guest Name : <?=$brow->visitor_name?>  </th> 
            <td style="width:50%; text-align: left;"> Mobile No : <?=$brow->mobileno?> </td> 
        </tr> 

        <tr>
            <td style="width:50%; text-align: left;padding-left: 20px;">Address : <?=$brow->address?>  </td> 
            <td style="width:50%; text-align: left;"> Porpose of Visit : <?=$brow->purpose_for_visit?> </td> 
        </tr> 

        <tr>
            <td style="width:50%; text-align: left;padding-left: 20px;">Email Id : <?=$brow->emailid?>  </td> 
            <td style="width:50%; text-align: left;"> Department : <?=$brow->department?> </td> 
        </tr> 
        <tr>
            <td style="width:50%; text-align: left;padding-left: 20px;">Designation : <?=$brow->designation?>  </td> 
            <td style="width:50%; text-align: left;"> Booking For :  <?=$brow->booking_for?>   </td> 
        </tr> 

        <?php if (count($sub_result)>0): ?>  
        <tr>
            <td colspan="2" style="width:100%; text-align: left;padding-left: 20px;">
                <span style="font-weight: bold;">Other Guest Detail</span>  <br>

                <table cellpadding="0" cellspacing="0" width="100%;">
                    <thead>
                        <tr>
                            <th class="brdleft">Sno.</th>
                            <th class="brdleft">Guest Name</th>
                            <th class="brdleft">Age</th>
                            <th class="brdright">Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j=1; 
                            foreach ($sub_result as $rows) { ?>
                            <tr>
                                <td class="brdleft"><?=$j++?></td>
                                <td class="brdleft"><?=$rows->guestname?></td>
                                <td class="brdleft"><?=$rows->guestage?></td>
                                <td class="brdright"><?=$rows->guestgender?></td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td style="border-top: 1px solid grey;" colspan="4"></td>
                        </tr>
                    </tbody>
                </table>
            </td> 
        </tr> 

        <?php endif ?>

        <tr>
            <th style="width:50%; text-align: left;padding-left: 20px;">&nbsp; </th> 
            <td style="width:50%; text-align: left;"> &nbsp; </td> 
        </tr>

        <tr>
            <th colspan="2" style="width:100%; text-align: left;padding-left: 20px;border-bottom: 1px solid grey;border-top: 1px solid grey;font-weight: bold;">Room Detail </th>  
        </tr>
    
        <tr>
            <td style="width:50%; text-align: left;padding-left: 20px;">Room Type : <?=$brow->room_type?>  </td> 
            <td style="width:50%; text-align: left;"> No of Days : <?=$brow->no_of_days?> </td> 
        </tr>

        <tr>
            <td style="width:50%; text-align: left;padding-left: 20px;">Check In Date : <?=date('d-m-Y', strtotime($brow->checkin_date))?> </td> 
            <td style="width:50%; text-align: left;"> Check Out Date :  <?=date('d-m-Y', strtotime($brow->checkout_date))?> </td> 
        </tr>

        <tr>
            <th style="width:50%; text-align: left;padding-left: 20px;">&nbsp; </th> 
            <td style="width:50%; text-align: left;"> &nbsp; </td> 
        </tr>

        <tr>
            <th colspan="2" style="width:100%; text-align: left;padding-left: 20px;border-bottom: 1px solid grey;border-top: 1px solid grey;font-weight: bold;">Charges  Detail </th>  
        </tr>
        <tr>
            <td style="width:50%; text-align: left;padding-left: 20px;">Per Day Charges : <?=$brow->room_charges?> </td> 
            <td style="width:50%; text-align: left;"> Total Charges :  <?=$brow->tol_amount?> </td> 
        </tr> 
    </table>

     

    <table style="width:100%;margin-top: 150px;text-align: center;">
        <tr>
            <td>Thanks for the visit</td>
        </tr>
    </table>


    <?php //} else { echo 'Data not found'; } ?>
  </div>
</body> 
</html>
<script type="text/javascript">
      
    window.print();
        
</script>