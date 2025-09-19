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
                                   Subgroup
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown" class="btn btn-white btn-mini dropdown-toggle"><span
                                                class="caret single"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?PHP ECHO webUrl ?>/Members/Subgroup-Create" data-ajax-update="#master" data-ajax-mode="replace"
                                                    data-ajax-loading="" data-ajax="true">Add new</a></li>
                                            </ul>
                                        </div> 

                                </h2>
                                <div class="pull-right margin-top-20">
                                    <div class="dataTables_info hidden-phone" id="example_info">
                                        Showing <b>1 to 12</b> of 12 entries</div>
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
                                               Subgroup
                                            </th>
                                             <th>
                                               Group Name
                                            </th>
	<th class="">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr id="24">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Fertilizers   </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Dal Mill Owners (26) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=24" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=24  &amp;rowid=24 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="25">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">State Power Ltd  </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Electronics,TV &amp; Radio Sellers (27) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=25" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=25  &amp;rowid=25 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="26">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Water Suppliers  </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Minerals (89) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=26" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=26  &amp;rowid=26 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="27">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Coal Suppliers  </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Electronics,TV &amp; Radio Sellers (27) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=27" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=27  &amp;rowid=27 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="28">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Food Processer  </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Food Grains Wholesalers (01) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=28" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=28  &amp;rowid=28 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="29">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Cement Production  </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Builders Materials Suppliers (54) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=29" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=29  &amp;rowid=29 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="30">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Software Development  </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Computer, Printer, Copier (55) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=30" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=30  &amp;rowid=30 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="31">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">ERP  </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Computer, Printer, Copier (55) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=31" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=31  &amp;rowid=31 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="32">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">leaf spring   </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Auto Parts Dealers (13) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=32" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=32  &amp;rowid=32 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="35">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">GEARS  </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Auto Parts Dealers (13) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=35" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=35  &amp;rowid=35 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="36">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">AGARBATTI &amp; DHOOP   </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Manufacturer (72) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=36" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=36  &amp;rowid=36 ">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="37">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">NUT BOLT &amp; HARDWARE   </span>
                                                </td>
                                                  

                                                  <td class="clickable">
                                                    <span class="muted">Others (60) 
                                                   
                                                     </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Edit?id=37" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                        <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelSubGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelSubGrp')" data-ajax-update="#DelSubGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Subgroup-Delete?id=37  &amp;rowid=37 ">
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
