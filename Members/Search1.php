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
<div class="row-fluid">
    <div class="row-fluid dataTables_wrapper">
        <h2 class="pull-left">
            Members
			<?php 
			if ($_ADMIN) {
			?>
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" class="btn btn-white btn-mini dropdown-toggle"><span
                        class="caret single"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a  href="/school/B-Members-Create" data-ajax="true" data-ajax-begin="makedpt('CreateMem')" data-ajax-loading="#load"  data-ajax-mode="replace" data-ajax-success="showdpt('CreateMem')" data-ajax-update="#CreateMem > #modal-body"    >
                                Add New</a>
                            
                            
                            </li>
                        <li><a href="/school/B-Members-Index?Approved=1" data-ajax-update="#master" data-ajax-mode="replace"
                            data-ajax-loading="" data-ajax="true">Approved</a></li>
                        <li><a href="/school/B-Members-Index?Approved=0" data-ajax-update="#master" data-ajax-mode="replace"
                            data-ajax-loading="" data-ajax="true">Unapproved</a></li>
                             <li><a href="/school/B-Members-PendingCardPrint?Status=1" data-ajax-update="#master" data-ajax-mode="replace"
                            data-ajax-loading="" data-ajax="true">Pending Card Prints</a></li>
                             <li><a href="/school/B-Members-PendingCardPrint?Status=2" data-ajax-update="#master" data-ajax-mode="replace"
                            data-ajax-loading="" data-ajax="true">Complete Card Prints</a></li>

                    </ul>
                </div> 
		<?php } ?>
        </h2>
        <div class="pull-right margin-top-20">
		<?php if($_ADMIN && $GoverningBodyIdRep1 > 3) { ?>	
			<button class="btn btn-danger btn-mini" type="button" onclick="SetOrder()">
            <i class="icon-ok"></i>Set Order</button>
		<?php } ?>			
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
                    <?php 
					if ($_ADMIN  && $UserTypeId==1) {
					?> 
					<th class="medium-cell">
                    </th>
					<?php } ?>
                    
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
                        Remark
                    </th>
                   
                    <th>
						<?php 
						if ($_ADMIN  && $UserTypeId==1) {
						?>
                            <input id="CbRep1" type="checkbox"  value="" onchange="cbrep1click()"   ></input>
                       
						<?php } ?>
						Rep(1)
                    </th>
                    <th>
                        <?php 
							if ($_ADMIN  && $UserTypeId==1) {
							?>    
							<input id="CbRep2" type="checkbox"   value="" onchange="cbrep2click()"  ></input>
                        <?php } ?>
                             Rep(2)
                    </th>
                    <th>

                    </th>
                        <th class="">
                        </th>
                </tr>
            </thead>
            <tbody>
                    <tr id="5">
                     <?php 
						if ($_ADMIN  && $UserTypeId==1) {
							?>    
                        <td valign="middle" class="medium-cell">
                                <i class="icon-group app5" style ="color:#00ff00"></i>
                            
                                <input id="Approved" type="checkbox" class="bapp" onclick="appclick()" value="5" name="Approved" ></input>
                            
                        </td>
					<?php } ?>
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
								Card printed on 12.05.201
							</span>
                        </td>
                       
                        <td class="clickable">
                            <span class="muted">
								<?php if ($_ADMIN  && $UserTypeId==1) {	?>    
                                    <input id="" type="checkbox" class="gb cbrep1"  value="1_5" onclick="gbclick()" name="Approved" ></input>
								<img src="showimage.aspx?h=50&amp;w=50&amp;image=Image/MINAKSHI TUTEJA_895.jpg">        
								<?php }?>
								
								MINAKSHI TUTEJA <br>
								9827107172 <br>
								President (Mahila Chamber)
								<?php if ($_ADMIN) {	?>    
								<input id="c1_9176" value="1" class="span12 ord">
								<?php }	?>    
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
								<?php if ($_ADMIN  && $UserTypeId==1) {	?>    
                                   <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Remark')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Remark')" data-ajax-update="#Remark > #modal-body" href="/school/B-Members-Remark?id=5">
                                <i class="icon-ok"></i>Remark</a> 
                                <?php }	?>        

                        </td>
						<?php if ($_ADMIN) { ?>
                            <td>
                                <a  class="btn btn-primary btn-mini"  href="/school/B-Members-Edit?id=5 " data-ajax="true" data-ajax-begin="makedpt('EditMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('EditMem')" data-ajax-update="#EditMem > #modal-body"    >
                                    <i class="icon-edit"></i>Edit</a> <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelMem')" data-ajax-update="#DelMem > #modal-body" href="/school/B-Members-Delete?id=5&amp;rowid=5  ">
                                        <i class="icon-remove"></i>Delete</a>
                                    <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Cert')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Cert')" data-ajax-update="#Cert > #modal-body" href="/school/B-Members-CertEdit?id=5&amp;rowid=5  ">
                                        <i class="icon-ok"></i>Cert</a>
                            </td>
						<?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    appsel = "";
    gbsel = "";

</script>
