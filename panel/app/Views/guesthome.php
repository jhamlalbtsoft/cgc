

        <div class="contact-us-area pt-70 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contacts-form">
                            <?php 
                                $db      = \Config\Database::connect();
                                $myrequest = \Config\Services::request();
                                $session = \Config\Services::session();

                                $sid = $session->get('sid');
                                $query=$db->query("select * from register where id='".$sid."'"); 
                                $rowt=$query->getRow(); 
                             ?>
                            <h3 class="mb-3" style="text-align: center;">Welcome <?=$rowt->name?> !</h3>

                            <h5 class="mb-3" style="text-align: center;"><a href="<?=site_url('Booking/newbooking')?>" >New Booking</a></h5>

                            <h5 style="text-align: center;"><a href="<?=site_url('Home/index')?>"> Back to Home</a></h5>
                            <form id="contactForm1" method="post" >
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
