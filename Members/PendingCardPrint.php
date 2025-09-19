<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";$_ADMIN = false;
$UserTypeId = 0;
$status = 0;
$search = '';
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}if(isset($_REQUEST['SGRep1'])){
	$SGRep1 = $_REQUEST['SGRep1'];//18
}
$filter['pageFrom'] = 'PendingCardPrint';
if(isset($_REQUEST['Status'])){
	$status = $_REQUEST['Status'];//18
	$filter['CardPrint'] = $status;
}

if(isset($_REQUEST['search'])){
	$search = $_REQUEST['search'];//18
	$filter['search'] = $search;
}

// if (!$_ADMIN) {
// 	echo "you dont have permission";
// 	die;
// }

require PATH_LIB . "lib-members.php";
$memLib = new Members();

$memData = $memLib->getAll($searchType=0, $filter);
?>
<!DOCTYPE html>
<style type="text/css">
    
</style>

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
                    <div class="grid-body no-border email-body" style="min-height: 1500px;">
                    
                    <div class="row-fluid dataTables_wrapper">
                     <?php $_ADMIN = is_array($_SESSION['user']);
							if ($_ADMIN && $_SESSION['user']['UserTypeId']<=2) {
		            	?>    
                        <h2 class="pull-left">
                            Members
                            <div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn btn-white btn-mini dropdown-toggle"><span
									class="caret single"></span></a>
								<ul class="dropdown-menu">
								   
								   
										 <li><a href="<?PHP ECHO webUrl ?>Members/PendingCardPrint?Status=1" data-ajax-update="#master" data-ajax-mode="replace"
										data-ajax-loading="#load" data-ajax="true">Pending Card Prints</a></li>
										 <li><a href="<?PHP ECHO webUrl ?>Members/PendingCardPrint?Status=2" data-ajax-update="#master" data-ajax-mode="replace"
										data-ajax-loading="#load" data-ajax="true">Complete Card Prints</a></li>

								</ul>
							</div> 
                        </h2>
                        
                     <?php } ?>
						<div class="pull-left padding-10">
                            <form id="frmPendingCardPrint" action="<?PHP ECHO webUrl ?>Members/PendingCardPrint?Status=<?=$status?>" method="GET">
							&nbsp;&nbsp;<input type="text" id="search" value="<?=$search?>" name="search" required placeholder="seach member"/>							
                            <input  class="btn btn-danger btn-mini" type="submit" value="GO">
							<!--a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-mode="replace"  data-ajax-loading="#load" data-ajax-update="#search" href="<?PHP ECHO webUrl ?>Members/PendingCardPrint?Status=<?=$status?>" onclick="retun alert('1');">
							<i class="icon-refresh"></i>Go</a>
							-->
							</form>
							
							<a class="noprint btn btn-primary btn-mini"  data-ajax-loading="#load" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#reload" href="<?PHP ECHO webUrl ?>Members/PendingCardPrint?Status=<?=$status?>">
							<i class="icon-refresh"></i>Reload</a>
							<script type="text/javascript" language="javascript">
								$("#frmPendingCardPrint").submit(function () {
									// prevent the default GET form behavior (name-value pairs)
									event.preventDefault();
									var action = $("form").attr("action");
									
									var values = $("form").serialize().split("&");
									var strSrch='';
									for (var i = 0; i < values.length; i++) {
										var tokens = values[i].split("=");
										strSrch += tokens[0]+'='+tokens[1];
										
										////action = action.replace("{" + tokens[0] + "}", tokens[1]);
									}
									
									window.location.href = action+'&'+strSrch;
								});
							</script>

                        </div>
                        <div class="pull-right margin-top-20">
                            <div class="dataTables_info hidden-phone" id="example_info">
                                Showing <b>1 to <?= count($memData) ?></b> of <?= count($memData) ?> entries</div>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div id="email-list">
                        <table class="table table-fixed-layout table-hover table-bordered" id="emails">
                            <thead>
                                <tr>
                                    <th>
                                        Rep 1
                                    </th>
                                    <th>
                                        Rep 2
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
								<?php if($memData){ ?>
								<?php foreach($memData as $mData): ?>
									<tr id="<?= $mData['MembersId'] ?>">									
                                        <td class="clickable">
                                            <span class="muted">
											<?php if($mData['Representative1']){ ?>
												<?= $mData['Representative1'] ?>
												<br/> <?= $mData['FirmName'] ?>
												<br/> <?= $mData['MemberType'] ?>
												<br />         
												<?php if($mData['Representative1']){?>
												<a class="noprint btn btn-primary btn-mini" target="_blank"  href="<?PHP ECHO webUrl ?>Members/showcard?MembersId=<?= $mData['MembersId'] ?>&Card=1&Rep=1&frmAdmin=1"><i
												class="icon-refresh"></i>Get Members Card</a>
												<?php } ?>
												<?php if($mData['GoverningBodyIdRep1']>0){?>
												<a class="noprint btn btn-primary btn-mini" target="_blank" href="<?PHP ECHO webUrl ?>Members/showcard?MembersId=<?= $mData['MembersId'] ?>&amp;Rep=1&amp;Card=2"><i class="icon-refresh"></i>Get GovBody Card</a>
												<?php } ?>
												<?php if($mData['GoverningBodyIdRep1']==13){?>
													<a class="noprint btn btn-primary btn-mini" target="_blank" href="<?PHP ECHO webUrl ?>Members/showcard?MembersId=<?= $mData['MembersId'] ?>&amp;Rep=1&amp;Card=3"><i class="icon-refresh"></i>Get Committee Card</a>
												<?php }?>
												
												
													<div class="clickable" id="<?= $mData['MembersId'] ?>"   >
													<?php if($status==2){?>
															<a class="noprint btn btn-warning btn-mini" data-ajax="true" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-update="#R213" href="<?PHP ECHO webUrl ?>Members/UpdateCardPrint?Status=1&amp;Mem=1&amp;id=<?= $mData['MembersId'] ?>"><i class="icon-refresh"></i>Printed</a>
													<?php }elseif($status==1 && $mData['CardPrintRep1']!=2){?>
														<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-mode="replace"  data-ajax-loading="#load" data-ajax-update="#<?= $mData['MembersId'] ?>" href="<?PHP ECHO webUrl ?>Members/UpdateCardPrint?Status=2&Mem=1&id=<?= $mData['MembersId'] ?>"><i
														class="icon-refresh"></i>Print</a>
														<?php if($mData['CardPrintRep1']==1){ ?>
														<a class="noprint btn btn-warning btn-mini"  data-ajax-loading="#load" data-ajax="true" data-ajax-mode="replace" data-ajax-complete="$('#<?= $mData['MembersId'] ?>').remove();"  data-ajax-update="#<?= $mData['MembersId'] ?>" href="<?PHP ECHO webUrl ?>Members/UpdateCardPrint?Status=0&Mem=1&id=<?= $mData['MembersId'] ?>"><i
														class="icon-remove"></i>Cancel Print</a>
														<?php } ?>
													<?php } ?>
													
													</div> 
												
												
											<?php } ?>
                                            </span>
                                        </td>
                                        <td class="clickable">
                                            <span class="muted">
												<?php if($mData['Representative2']){ ?>
												<?= $mData['Representative2'] ?>
												<br/> <?= $mData['FirmName'] ?>
												<br/> <?= $mData['MemberType'] ?>
												<br />         
												<?php if($mData['Representative2']){?>
												<a class="noprint btn btn-primary btn-mini" target="_blank"  href="<?PHP ECHO webUrl ?>Members/showcard?MembersId=<?= $mData['MembersId'] ?>&Card=1&Rep=2&frmAdmin=1"><i
												class="icon-refresh"></i>Get Members Card</a>
												<?php } ?>
												<?php if($mData['GoverningBodyIdRep2']>0){?>
												<a class="noprint btn btn-primary btn-mini" target="_blank" href="<?PHP ECHO webUrl ?>Members/showcard?MembersId=<?= $mData['MembersId'] ?>&amp;Rep=2&amp;Card=2"><i class="icon-refresh"></i>Get GovBody Card</a>
												<?php } ?>
												<?php if($mData['GoverningBodyIdRep2']==13){?>
													<a class="noprint btn btn-primary btn-mini" target="_blank" href="<?PHP ECHO webUrl ?>Members/showcard?MembersId=<?= $mData['MembersId'] ?>&amp;Rep=2&amp;Card=3"><i class="icon-refresh"></i>Get Committee Card</a>
												<?php }?>
												
												<div class="clickable" id="R<?= $mData['MembersId'] ?>"   >
												<?php if($status==2){?>
														<a class="noprint btn btn-warning btn-mini" data-ajax="true" data-ajax-mode="replace" data-ajax-loading="#load" data-ajax-update="#R213" href="<?PHP ECHO webUrl ?>Members/UpdateCardPrint?Status=1&amp;Mem=2&amp;id=<?= $mData['MembersId'] ?>"><i class="icon-refresh"></i>Printed</a>
												<?php } elseif( $status==1 && $mData['CardPrintRep2']!=2){?>
													
													<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-mode="replace"  data-ajax-loading="#load" data-ajax-update="#<?= $mData['MembersId'] ?>" href="<?PHP ECHO webUrl ?>Members/UpdateCardPrint?Status=2&Mem=2&id=<?= $mData['MembersId'] ?>"><i
													class="icon-refresh"></i>Print</a>
													<?php if($mData['CardPrintRep2']==1){?>
													<a class="noprint btn btn-warning btn-mini"  data-ajax-loading="#load" data-ajax="true" data-ajax-mode="replace" data-ajax-complete="$('#<?= $mData['MembersId'] ?>').remove();"  data-ajax-update="#<?= $mData['MembersId'] ?>" href="<?PHP ECHO webUrl ?>Members/UpdateCardPrint?Status=0&Mem=2&id=<?= $mData['MembersId'] ?>"><i
													class="icon-remove"></i>Cancel Print</a>
													<?php } ?>
													<?php } ?>
													</div> 												
											<?php } ?>
                                            </span>
                                        </td>
                                    </tr>
								<?php endforeach; ?>
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
<div class="clearfix">
</div>
<script>
    appsel = "";
    gbsel = "";
<?php if ($_ADMIN) { ?>
 parent.resizeIframe();
<?php } ?>
</script>
<link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/b54e6c3cd41636c423439c76df997eefce57a3cb/assets/plugins/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/a7534c01230e13be1b3e63b7212818f1b29287c3/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" type="text/css" rel="stylesheet" />
        <link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/257678ac5c078ba3d83505199d54da0c62791b68/assets/plugins/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet" />
        <link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/e24dc41868f2503ec60abaffb848b68b1ddb614c/assets/css/animate.min.css" type="text/css" rel="stylesheet" />
        <link href="<?PHP ECHO webUrl ?>cassette.axd/stylesheet/9966e31d4e513faf36a0509dcb6377ffaa60de52/assets/css/style.css" type="text/css" rel="stylesheet" />