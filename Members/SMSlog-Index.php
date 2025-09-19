<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";

$_ADMIN = false;
$UserTypeId = 0;
$SGRep1 = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}

if(isset($_REQUEST['SGRep1'])){
	$SGRep1 = $_REQUEST['SGRep1'];//18
}
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
                                <h2 class="pull-left">
                                     SMS Master
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown" class="btn btn-white btn-mini dropdown-toggle"><span
                                                class="caret single"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?PHP ECHO webUrl ?>Members/SMSMaster-Create" data-ajax-update="#master" data-ajax-mode="replace"
                                                    data-ajax-loading="" data-ajax="true">Add new</a></li>
                                            </ul>
                                        </div> 

                                </h2>
                                <div class="pull-right margin-top-20">
                                    <div class="dataTables_info hidden-phone" id="example_info">
                                        Showing <b>1 to 1</b> of 1 entries</div>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                            <div id="email-list">
                                <table class="table table-fixed-layout table-hover table-bordered" id="emails">
                                    <thead>
                                        <tr>
                                            <th class="small-cell">
                                            </th>
                                            <th>
                                               Message
                                            </th>
                                             <th>
                                               Format
                                            </th>
                                              <th>
                                               Type
                                            </th>
	<th class="">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr id="4">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Hello </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">Unicode </span>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Anniversary  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>Members/SMSMaster-Edit?id=4 " data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSMSMast')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSMSMast')" data-ajax-update="#DelSMSMast > #modal-body" href="<?PHP ECHO webUrl ?>Members/SMSMaster-Delete?id=4&amp;rowid=4 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
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