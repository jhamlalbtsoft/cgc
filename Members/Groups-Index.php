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
                                   Groups
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown" class="btn btn-white btn-mini dropdown-toggle"><span
                                                class="caret single"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?PHP ECHO webUrl ?>/Members/Groups-Create" data-ajax-update="#master" data-ajax-mode="replace"
                                                    data-ajax-loading="" data-ajax="true">Add new</a></li>
                                            </ul>
                                        </div> 

                                </h2>
                                <div class="pull-right margin-top-20">
                                    <div class="dataTables_info hidden-phone" id="example_info">
                                        Showing <b>1 to 89</b> of 89 entries</div>
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
                                               Groups
                                            </th>
                                             <th>
                                               Code
                                            </th>
	<th class="">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr id="1">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Food Grains Wholesalers (01)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">01  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=1" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=1&amp;rowid=1">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="2">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Food Grains Retailers (02)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">02  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=2" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=2&amp;rowid=2">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="3">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Kirana Wholesalers (03)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">03  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=3" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=3&amp;rowid=3">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="4">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Kirana Retailers (04)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">04  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=4" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=4&amp;rowid=4">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="5">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Cosmetics &amp; Generalgoods (05)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">05  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=5" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=5&amp;rowid=5">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="6">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Steel (Iron) &amp; Cement (06)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">06  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=6" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=6&amp;rowid=6">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="7">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Hardware &amp; Paints Dealers (07)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">07  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=7" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=7&amp;rowid=7">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="8">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Mill Machinary (08)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">08  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=8" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=8&amp;rowid=8">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="9">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Jewellery (09)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">09  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=9" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=9&amp;rowid=9">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="10">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Hosiery &amp; Readymade (10)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">10  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=10" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=10&amp;rowid=10">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="11">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Bardana Merchants (11)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">11  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=11" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=11&amp;rowid=11">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="12">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Cycle Dealers (12)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">12  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=12" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=12&amp;rowid=12">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="13">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Auto Parts Dealers (13)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">13  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=13" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=13&amp;rowid=13">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="14">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Utensils Merchants (14)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">14  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=14" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=14&amp;rowid=14">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="15">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Tea &amp; Tobacco Merchants (15)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">15  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=15" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=15&amp;rowid=15">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="16">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Small scale Industry (16)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">16  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=16" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=16&amp;rowid=16">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="17">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Medical Store (17)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">17  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=17" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=17&amp;rowid=17">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="18">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Petroleum Product (18)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">18  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=18" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=18&amp;rowid=18">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="19">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Timber Merchant (19)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">19  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=19" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=19&amp;rowid=19">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="20">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Fruits &amp; Vegetables Merchants (20)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">20  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=20" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=20&amp;rowid=20">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="21">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Cloths Wholesalers (21)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">21  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=21" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=21&amp;rowid=21">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="22">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Cloths Retailers (22)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">22  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=22" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=22&amp;rowid=22">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="23">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Theater (23)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">23  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=23" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=23&amp;rowid=23">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="24">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Rice Mill Owners (24)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">24  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=24" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=24&amp;rowid=24">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="25">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Oil Mill Owners (25)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">25  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=25" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=25&amp;rowid=25">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="26">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Dal Mill Owners (26)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">26  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=26" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=26&amp;rowid=26">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="27">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Electronics,TV &amp; Radio Sellers (27)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">27  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=27" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=27&amp;rowid=27">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="28">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Stationary &amp; Book Sellers (28)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">28  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=28" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=28&amp;rowid=28">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="29">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Hotel &amp; Guest House (29)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">29  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=29" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=29&amp;rowid=29">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="30">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Industry (30)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">30  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=30" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=30&amp;rowid=30">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="31">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Contractors (31)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">31  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=31" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=31&amp;rowid=31">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="32">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Printing Press (32)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">32  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=32" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=32&amp;rowid=32">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="33">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Tyre Dealers (33)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">33  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=33" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=33&amp;rowid=33">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="34">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Union Members - Local (35)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">35  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=34" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=34&amp;rowid=34">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="35">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Union Members (36)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">36  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=35" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=35&amp;rowid=35">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="36">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Transports &amp; Travels Agency (38)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">38  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=36" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=36&amp;rowid=36">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="37">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Home Appliances (39)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">39  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=37" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=37&amp;rowid=37">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="38">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Agriculture Products (40)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">40  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=38" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=38&amp;rowid=38">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="39">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Photo Studio (41)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">41  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=39" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=39&amp;rowid=39">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="40">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Shoes Retailer (42)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">42  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=40" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=40&amp;rowid=40">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="41">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Shoes Wholesaler (43)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">43  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=41" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=41&amp;rowid=41">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="42">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Automobiles (Two Wheeler) (44)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">44  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=42" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=42&amp;rowid=42">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="43">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Restaurant (45)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">45  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=43" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=43&amp;rowid=43">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="44">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Fancy Stores (46)   </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">46  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=44" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=44&amp;rowid=44">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="45">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Readymade Garments Retailer (47)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">47  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=45" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=45&amp;rowid=45">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="46">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">FMCG Wholesalers (48)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">48  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=46" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=46&amp;rowid=46">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="47">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Mobile &amp; Recharge Retailers (49)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">49  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=47" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=47&amp;rowid=47">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="48">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Electrical Wholesaler (50)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">50  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=48" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=48&amp;rowid=48">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="49">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Automobiles (Four Wheeler) (51)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">51  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=49" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=49&amp;rowid=49">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="50">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Electrical Retailer (52)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">52  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=50" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=50&amp;rowid=50">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="51">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Tiles &amp; Marble (53)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">53  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=51" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=51&amp;rowid=51">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="52">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Builders Materials Suppliers (54)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">54  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=52" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=52&amp;rowid=52">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="53">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Computer, Printer, Copier (55)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">55  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=53" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=53&amp;rowid=53">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="54">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Beauty Parlour (56)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">56  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=54" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=54&amp;rowid=54">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="55">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Gas Agency (57)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">57  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=55" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=55&amp;rowid=55">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="56">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Furniture (58)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">58  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=56" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=56&amp;rowid=56">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="57">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Stone Crusher (59)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">59  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=57" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=57&amp;rowid=57">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="58">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Others (60)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">60  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=58" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=58&amp;rowid=58">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="59">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Pan Thela &amp; Pan Mashala (61)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">61  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=59" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=59&amp;rowid=59">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="60">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Building Material (62)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">62  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=60" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=60&amp;rowid=60">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="61">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Provision Stores (63)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">63  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=61" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=61&amp;rowid=61">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="62">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Petrol Pump (64)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">64  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=62" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=62&amp;rowid=62">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="63">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Watch &amp; Optical (65)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">65  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=63" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=63&amp;rowid=63">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="64">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Ready Made and Hosiery Hand loom (66)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">66  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=64" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=64&amp;rowid=64">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="65">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Wholesale Trading (67)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">67  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=65" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=65&amp;rowid=65">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="66">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Builder &amp; Developers (68)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">68  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=66" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=66&amp;rowid=66">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="67">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Trading &amp; Tally Software (69)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">69  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=67" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=67&amp;rowid=67">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="68">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Production of Films (70)   </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">70  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=68" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=68&amp;rowid=68">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="69">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Confectionery (71)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">71  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=69" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=69&amp;rowid=69">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="70">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Manufacturer (72)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">72  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=70" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=70&amp;rowid=70">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="71">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Trading &amp; Fabrication (73)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">73  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=71" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=71&amp;rowid=71">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="74">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Plywood Hardware (75)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">75  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=74" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=74&amp;rowid=74">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="75">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Fruit Business (76)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">76  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=75" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=75&amp;rowid=75">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="76">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Finance &amp; Consultants (77)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">77  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=76" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=76&amp;rowid=76">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="77">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Coal Trading (78)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">78  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=77" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=77&amp;rowid=77">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="78">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Crackers Seller (79)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">79  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=78" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=78&amp;rowid=78">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="79">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Training Centre (80)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">80  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=79" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=79&amp;rowid=79">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="80">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Machinery &amp; Electrical Parts (81)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">81  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=80" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=80&amp;rowid=80">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="81">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Institute (82)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">82  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=81" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=81&amp;rowid=81">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="82">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Pharming &amp; Cold Storege (83)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">83  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=82" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=82&amp;rowid=82">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="83">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Ice Cream Shop (84)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">84  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=83" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=83&amp;rowid=83">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="84">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Broker (85)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">85  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=84" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=84&amp;rowid=84">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="85">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Real Estate (86)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">86  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=85" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=85&amp;rowid=85">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="86">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Dairy Trading (87)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">87  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=86" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=86&amp;rowid=86">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="87">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Genereal Stores (88)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">88  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=87" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=87&amp;rowid=87">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="88">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Minerals (89)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">89  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=88" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=88&amp;rowid=88">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="89">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Motor Parts (90)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">90  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=89" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=89&amp;rowid=89">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="90">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Footwear (91)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted"> 91  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=90" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=90&amp;rowid=90">
                                                            <i class="icon-remove"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <tr id="91">
                                                <td valign="middle" class="small-cell">
                                                    <i class="icon-group"></i>
                                                </td>
                                                <td class="clickable">
                                                    <span class="muted">Govt. Supplier (92)  </span>
                                                </td>
                                                  <td class="clickable">
                                                    <span class="muted">92  </span>
                                                </td>
	<td>
                                                    <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>/Members/Groups-Edit?id=91" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true"   >
                                                        <i class="icon-edit"></i>Edit</a> 
                                                      
                                                     
                                                       <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelGrp')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelGrp')" data-ajax-update="#DelGrp > #modal-body" href="<?PHP ECHO webUrl ?>/Members/Groups-Delete?id=91&amp;rowid=91">
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
