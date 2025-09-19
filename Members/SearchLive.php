<?php
// INIT
session_start();
//require __DIR__ . DIRECTORY_SEPARATOR . "admin/lib" . DIRECTORY_SEPARATOR . "config.php";
require "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
// INIT
require PATH_LIB . "lib-members.php";
$memLib = new Members();
$searchTerm ="";
//get firm
if(isset($_REQUEST['searchTerm'])){
	$searchTerm = $_REQUEST['searchTerm'];
}else{
	echo "invalid search";
	die;
}

$pageSize = $_REQUEST['pageSize'];
$pageNum = $_REQUEST['pageNum'];

//$totalFirms = $memLib->getFirmBySearchCount($searchTerm);
$firms = $memLib->getFirmBySearch($searchTerm, $pageSize, $pageNum);
//$firms = $memLib->getAll();
//print_r($firms);
$res=array();
$res['Total'] = 0;
$res['Results'] = array();
if(count($firms)>0){
	$res['Total'] = 1000;
	foreach($firms as $firm){
			$res['Results'][]=array('id'=>$firm['FirmName'],
									'text'=>$firm['FirmName']); 
	}
}
ECHO json_encode($res);

DIE;
?>

<div class="row-fluid">
    <div class="row-fluid dataTables_wrapper">
        <h2 class="pull-left">
            Members

        </h2>
        <div class="pull-right margin-top-20">
            <div class="dataTables_info hidden-phone" id="example_info">
                Showing <b>1 to 3</b> of 3 entries</div>
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div id="email-list">
        <table class="table table-fixed-layout table-hover table-bordered" id="emails">
            <thead>
                <tr>

                    
                    <th>
                        Firm Name
                    </th>
                    <th>
                        Reg. No
                    </th>
                    <th>
                        Mem Type
                    </th>
                    <th>
                        Group
                    </th>
                   
                    <th>
                       
                       
                           Rep(1)
                    </th>
                    <th>
                        
                             Rep(2)
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                    <tr id="5">
                        

                        <td class="clickable" font="Calibri">
                            <span class="muted">BHAI PURSHOTTAMDAS AND COMPANY </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">CCCI/LT/01/01/00005 <br>CCCI00009/ 1 / LT </br> </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">LT </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">Food Grains Wholesalers (01) </span>
                        </td>
                       
                        <td class="clickable">
                            <span class="muted">
 PURSHOTTAM SARIN                                    <br />                                    <br />
                            </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">
                            </span>
                        </td>
                        <td>
                            <a class="noprint btn btn-primary btn-mini" target="_blank" href="view member?id=5">
                                <i class="icon-ok"></i>View</a> 
                                <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="/school/B-Request-Create?id=5">
                                    <i class="icon-ok"></i>Request</a>
                                    

                        </td>
                    </tr>
                    <tr id="13094">
                        

                        <td class="clickable" font="Calibri">
                            <span class="muted">CAR DECORE </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">CCCI/LT/10/60/11602 <br>30130 </br> </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">LT </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">Others (60) </span>
                        </td>
                       
                        <td class="clickable">
                            <span class="muted">
K. SATYANARAYAN                                    <br />9300771925                                    <br />
                            </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">
SHAILESH KUMAR                                    <br />9300556022                                    <br />
                            </span>
                        </td>
                        <td>
                            <a class="noprint btn btn-primary btn-mini" target="_blank" href="view member?id=13094">
                                <i class="icon-ok"></i>View</a> 
                                <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="/school/B-Request-Create?id=13094">
                                    <i class="icon-ok"></i>Request</a>
                                    

                        </td>
                    </tr>
                    <tr id="16791">
                        

                        <td class="clickable" font="Calibri">
                            <span class="muted">SHRIJI CAR DECORE </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">CCCI/LT/01/13/15525 <br>CCCI33851/13/LT </br> </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">LT </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">Auto Parts Dealers (13) </span>
                        </td>
                       
                        <td class="clickable">
                            <span class="muted">
AJIT KUMAR TIWARI                                    <br />9900090609                                    <br />
                            </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">
KRISHNA DEV                                    <br />8962330916                                    <br />
                            </span>
                        </td>
                        <td>
                            <a class="noprint btn btn-primary btn-mini" target="_blank" href="view member?id=16791">
                                <i class="icon-ok"></i>View</a> 
                                <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="/school/B-Request-Create?id=16791">
                                    <i class="icon-ok"></i>Request</a>
                                    

                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    appsel = "";
    gbsel = "";

    parent.resizeIframe();

</script>
