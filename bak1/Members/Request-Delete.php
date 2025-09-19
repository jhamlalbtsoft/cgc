<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";

$_ADMIN = false;
$Approved = -1;
$rowid = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}

if(isset($_REQUEST['rowid'])){
	$rowid = $_REQUEST['rowid'];//18
}

require PATH_LIB . "lib-masters.php";
$mastersLib = new Masters();

$requests = $mastersLib->del('Request', $rowid);
//print_r($requests);
//header("Location : request");
echo '<script>history.back(-1)</script>';
die;
include('header.html');
?>

<div class="page-title" style="display: none">
    <a href="#" id="btn-back"><i class="icon-custom-left"></i></a>
    <h3>
        Back- <span class="semi-bold">Inbox</span>
    </h3>
</div>
<div class="row-fluid" id="inbox-wrapper">
    <div class="span12">
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple">
                    <div class="grid-body no-border email-body" style="min-height: 850px;">
                        <br>
                        <div class="row-fluid">
                            <div class="row-fluid dataTables_wrapper">
                                  <h5>Action</h5> 
                       
                                 <div class="span3">
                                <div class="row-fluid">
                                    <div class="span4">
                                        
                                            <a class="btn btn-danger btn-mini" href="<?PHP ECHO webUrl ?>Members/Request-Index1?Approved=1" data-ajax-update="#master" data-ajax-mode="replace"
                                                    data-ajax-loading="" data-ajax="true"> <i class="icon-ok"></i>Approved</a>
                                    </div>
                                   <div class="span4">
                                        
                                            <a class="btn btn-danger btn-mini" href="<?PHP ECHO webUrl ?>Members/Request-Index1?Approved=0" data-ajax-update="#master" data-ajax-mode="replace"
                                                    data-ajax-loading="" data-ajax="true"> <i class="icon-remove"></i>Unapproved</a>
                                    </div>
                                    <h2 class="pull-left">
                                     Request

                                </h2>
                                </div>
                            </div>
                                 <div class="span3">
                                <div class="row-fluid">
                                    <div class="span4">
                                       <a class="btn btn-danger btn-mini" href="<?PHP ECHO webUrl ?>Members/Request-Index2?Approved=1&Updated=1" data-ajax-update="#master" data-ajax-mode="replace"
                                                    data-ajax-loading="" data-ajax="true"> <i class="icon-ok"></i>Updated</a>
                                    </div>
                                    <div class="span8">
                                        <a class="btn btn-danger btn-mini" href="<?PHP ECHO webUrl ?>Members/Request-Index2?Approved=1&Updated=0" data-ajax-update="#master" data-ajax-mode="replace"
                                                    data-ajax-loading="" data-ajax="true"> <i class="icon-remove"></i>Unupdated</a>
                                    </div>
                              
                           

                               
                               
                                

                                 </div>
                                   </div>
                                <div class="pull-right margin-top-20">
                                    <div class="dataTables_info hidden-phone" id="example_info">
                                        Showing <b>1 to <?= count($requests) ?></b> of <?= count($requests) ?> entries</div>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                            <div id="email-list">
							<?php if(count($requests)>0 ){ ?>
							
                                <table class="table table-fixed-layout table-hover table-bordered" id="emails">
                                    <thead>
                                        <tr>
                                            <th class="small-cell">
                                            </th>
                                            <th>
                                               Date
                                            </th>
                                             <th>
                                               Firm Name
                                            </th>
                                              <th>
                                               Registration no
                                            </th>
                                              <th>
                                               Approved
                                            </th>
                                             <th>
                                               Update
                                            </th>
                                             <th>
                                               Updated By
                                            </th>

	<th class="">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($requests as $req ){ ?>
                                            <tr id="<?= $req['RequestId'] ?>">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted"><?= $req['RequestDate'] ?>  </span>
                                                </td>
                                                 <td class="clickable">
                                                    <span class="muted"><?= $req['Name'] ?>  </span>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted"><?= $req['RegistrationNo'] ?> </span>
                                                </td>
                                                  <td class="clickable">
													<?= $req['Approved']==1?'Yes':'NO'; ?>
                                                </td>
                                             
                                                <td class="clickable">
													<?= $req['Updated']==1?'Yes':'NO'; ?>
												</td>
                                            
                                                 <td class="clickable">
                                                    <span class="muted"><?= $req['UpdatedBy']==1?'Admin':'Other'; ?></span>
                                                </td>
	<td>
                                                   
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelReq')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelReq')" data-ajax-update="#DelReq > #modal-body" href="<?PHP ECHO webUrl ?>Members/Request-Delete?id=<?= $req['RequestId'] ?>&amp;rowid=<?= $req['RequestId'] ?>">
                                                            <i class="icon-remove"></i>Delete</a>
                                                             <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DetailReq')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DetailReq')" data-ajax-update="#DetailReq > #modal-body" href="<?PHP ECHO webUrl ?>Members/Request-Details?id=<?= $req['RequestId'] ?>">
                                                            <i class="icon-remove"></i>View Details</a>
                                                </td>
                                            </tr>
										<?php } ?>   
									<?php } ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix">
</div>
<script>

    function ShowAppUnappList(id) {
        $("#masterload").show();
        // alert(appsel);
        $.ajax({
            url: "Request/Approve?id=" + appsel + "&status=" + id,
            type: "GET",
            data: "",

            success: function (data) {
                var str = appsel.split(",");
                for (i = 0; i < str.length; i++) {
                    if (id == 1) {
                        $(".app" + str[i]).attr("style", "color:#00ff00")
                    }
                    else {
                        $(".app" + str[i]).attr("style", "color:#ff0000")
                    }

                }
                appsel = "";

                $("#masterload").hide();

            },
            error: function (jqXhr, textStatus, errorThrown) {
                alert("Error '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
            }

        });
    }





</script>
<?php include('footer.html');?>