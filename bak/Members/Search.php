
<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "../admin/lib" . DIRECTORY_SEPARATOR . "config.php";
$filename = 'memFile.txt';
if(isset($_COOKIE['ccciUser'])){
	$filename = 'cookFiles/memFile'.$_COOKIE['ccciUser'].'.txt';
}

$_ADMIN = false;
$UserTypeId = 0;
$GoverningBodyIdRep1 = 0;
$SGRep1 = 0;
if(isset($_SESSION['user'])){
	$_ADMIN = is_array($_SESSION['user']);
	$UserTypeId = $_SESSION['user']['UserTypeId'];
}

$filter = array();
$pageNo =0;
if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo']>0){
	$pageNo = $_REQUEST['pageNo'];
	if (file_exists($filename)){
		// echo "File exist.";
		$filters = json_decode(file_get_contents($filename), true);
		$_REQUEST = $filters['filters'];
		//print_r($_REQUEST);
	}
	//if(isset($_SESSION['filters']))
	//	$_REQUEST = $_SESSION['filters'];
	
}

if(isset($_REQUEST['GoverningBodyIdRep1'])){
	$GoverningBodyIdRep1 = $_REQUEST['GoverningBodyIdRep1'];//18
}

$searchType=1;
if(isset($_REQUEST['type'])){
	$searchType = $_REQUEST['type'];//18
	$filter = $_REQUEST;//18
}

if(isset($_REQUEST['Approved'])){
	$filter = $_REQUEST;//18
}

if($pageNo>0){
	///$_SESSION['filters'] = $filter;
	
	if(isset($_SESSION['filters']) && !empty($_SESSION['filters']))
		$filter = $_SESSION['filters'];
}else{
	
	if(isset($_SESSION['filters']))
		unset($_SESSION['filters']);
	$_SESSION['filters'] = $filter;
	file_put_contents($filename, json_encode($_SESSION));
}

require PATH_LIB . "lib-members.php";
$memLib = new Members();
///echo 'pageNo'.$searchType;
/* echo '<pre>';
print_r($filter);
echo '</pre>'; */
$memData = $memLib->getAll($searchType, $filter, '', $pageNo);

if($pageNo==0){
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
                            <a  href="<?PHP ECHO webUrl ?>Members/Create" data-ajax="true" data-ajax-begin="makedpt('EditMem')" data-ajax-loading="#load"  data-ajax-mode="replace" data-ajax-success="showdpt('EditMem')" data-ajax-update="#EditMem > #modal-body"    >
                                Add New</a>
                            
                            
                            </li>
							<li><a href="<?PHP ECHO webUrl ?>Members/Search?Approved=1" data-ajax-update="#master" data-ajax-mode="replace"
                            data-ajax-loading="" data-ajax="true">Approved</a></li>
							<li><a href="<?PHP ECHO webUrl ?>Members/Search?Approved=0" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true">Unapproved</a></li>
                             <li><a href="<?PHP ECHO webUrl ?>Members/PendingCardPrint?Status=1" data-ajax-update="#master" data-ajax-mode="replace"
                            data-ajax-loading="" data-ajax="true">Pending Card Prints</a></li>
                             <li><a href="<?PHP ECHO webUrl ?>Members/PendingCardPrint?Status=2" data-ajax-update="#master" data-ajax-mode="replace"
                            data-ajax-loading="" data-ajax="true">Complete Card Prints</a></li>

                    </ul>
                </div> 
		<?php } ?>
        </h2>
        <div class="pull-right margin-top-20">
		<?php if($_ADMIN && $GoverningBodyIdRep1 > 0) { ?>	
			<button class="btn btn-danger btn-mini" type="button" onclick="SetOrder()">
            <i class="icon-ok"></i>Set Order</button>
		<?php } ?>			
            <!--div class="dataTables_info hidden-phone" id="example_info">
                Showing <b>1 to <?= count($memData) ?></b> of <?= count($memData) ?> entries</div-->
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div id="email-list">
        <table class="table table-fixed-layout table-hover table-bordered" id="searchResult">
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
					<?php if($_ADMIN ){ ?>
                    <th>
                        Reg. No
                    </th>
                    <th>
                        Mem Type
                    </th>
					<?php }else{ ?>
					 <th>
						Address
					</th>
					<th>
						City & District
					</th>
					<?php } ?>
                    <th>
                        Group
                    </th>
					<?php 
						if ($_ADMIN ) {
						?>
                          <th>
                        Remark
                    </th>
                   <?php } ?>
						
                    <th>
						<?php 
						if ($_ADMIN  ) {// && $UserTypeId==1
						?>
                            <input id="CbRep1" type="checkbox"  value="" onchange="cbrep1click()"   ></input>
                       
						<?php } ?>
						Rep(1)
                    </th>
                    <th>
                        <?php 
							if ($_ADMIN ) {
							?>    
							<input id="CbRep2" type="checkbox"   value="" onchange="cbrep2click()"  ></input>
                        <?php } ?>
                             Rep(2)
                    </th>
					<?php if ($_ADMIN ) {	?>  
                    <th>

                    </th>
					
                        <th class="">
                        </th>
					 <?php } ?>
                </tr>
            </thead>
            <tbody>
				<?php if($memData){ ?>
				<?php foreach($memData as $mData): ?>
                    <tr id="<?= $mData['MembersId'] ?>">
                     <?php 
						if ($_ADMIN  && $UserTypeId==1) {
							?>    
                        <td valign="middle" class="medium-cell">
                                <i class="icon-group app<?= $mData['MembersId'] ?>" style ="color:<?php if($mData['Approved']){ ?>#00ff00;<?php } else echo '#ff0000'?>"></i>
                            
                                <input id="Approved" type="checkbox" class="bapp" onclick="appclick()" value="<?= $mData['MembersId'] ?>" name="Approved" ></input>
                            
                        </td>
					<?php } ?>
                        <td class="clickable" font="Calibri">
                            <span class="muted"><?= $mData['FirmName'] ?> </span>
                        </td>
						<?php if (!$_ADMIN ) {	?>  
                        <td class="clickable">
                            <span class="muted"><?= $mData['SubGroupName'] ?> <br>
							<?php if($mData['Shop']) echo $mData['Shop'] ?> <?php if($mData['Street']) echo $mData['Street'] ?> </br> </span>
                        </td>
                        <td class="clickable"> 
                            <span class="muted"><?= $mData['CityName'] ?>, <?= $mData['DistrictName'] ?> </span>
                        </td>
						<?php }else{	?>  
						 <td class="clickable">
                            <span class="muted"><?= $mData['RegistrationNo'] ?> <br><?= $mData['RegistrationNoOld'] ?> </br> </span>
                        </td>
                        <td class="clickable">
                            <span class="muted"><?= $mData['MemberType'] ?> </span>
                        </td>
						<?php }	?>  
                        <td class="clickable">
                            <span class="muted"><?= $mData['GroupName'] ?> </span>
                        </td>
						<?php if ($_ADMIN ) {	?>  
                             <td class="clickable">
                            <span class="muted"> 
								<?= $mData['Remark'] ?>
							</span>
                        </td>
                       <?php } ?>
                        <td class="clickable">
                            <span class="muted">
								<?php if ($_ADMIN ) {	// && $UserTypeId==1?>    
                                    <input id="" type="checkbox" class="gb cbrep1"  value="1_<?= $mData['MembersId'] ?>" onclick="gbclick()" name="Approved" ></input>
								<?php ///}?>
								<?php if($mData['ImageRep1']){ ?>
									<img width="50" height="50" src="<?PHP ECHO webUrl ?><?= $mData['ImageRep1'] ?>">        
								<?php }?>
								<?php }?>
								
								
								<?= $mData['Representative1'] ?> <br>
								<?= $mData['MobileRep1'] ?> <br>
								<?= $mData['GoverningBodyIdNameRep1']; if($mData['CommitteeIDNameRep1']){?> (<?= $mData['CommitteeIDNameRep1'] ?>) <?php } ?>
								<?php if ($_ADMIN && $GoverningBodyIdRep1>0) {	?>    
									<input id="g1_<?= $mData['MembersId'] ?>" value="<?= $mData['GBOrderRep1'] ?>" class="span12 ord">
								<?php }	?>    
								<?php if ($_ADMIN && $mData['CardPrintRep1']>1) {	?>    
								<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('PrintId')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('PrintId')" data-ajax-update="#PrintId > #modal-body" href="<?PHP ECHO webUrl ?>Members/CardPrint?id=<?= $mData['MembersId'] ?>&amp;Rep=1&amp;rowid=<?= $mData['MembersId'] ?>  ">
                                        <i class="icon-ok"></i>Print Id</a>
								
								<?php }	?>    
                            </span>
                        </td>
                        <td class="clickable">
                            <span class="muted">
							<?php if ($mData['Representative2']) {	?>    
								<?php if ($_ADMIN  ) {// && $UserTypeId==1	?>    
                                    <input id="" type="checkbox" class="gb cbrep2"  value="2_<?= $mData['MembersId'] ?>" onclick="gbclick()" name="Approved" ></input>
								<?php //}?>
								<?php if($mData['ImageRep2']){ ?>
									<img width="50" height="50" src="<?PHP ECHO webUrl ?><?= $mData['ImageRep2'] ?>">        
								<?php }?>
								<?php }?>
								
								
								<?= $mData['Representative2'] ?> <br>
								<?= $mData['MobileRep2'] ?> <br>
								<?= $mData['GoverningBodyIdNameRep2']; if($mData['CommitteeIDNameRep2']){?> (<?= $mData['CommitteeIDNameRep2'] ?>) <?php } ?>
								<?php if ($_ADMIN && $GoverningBodyIdRep1>0) {	?>    
									<input id="g2_<?= $mData['MembersId'] ?>" value="<?= $mData['GBOrderRep2'] ?>" class="span12 ord">
								<?php }	?>    
								<?php if ($_ADMIN && $mData['CardPrintRep2']>1) {	?>    
								<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('PrintId')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('PrintId')" data-ajax-update="#PrintId > #modal-body" href="<?PHP ECHO webUrl ?>Members/CardPrint?id=<?= $mData['MembersId'] ?>&amp;Rep=2&amp;rowid=<?= $mData['MembersId'] ?>  ">
                                        <i class="icon-ok"></i>Print Id</a>
								
								<?php }	?>    
							<?php }	?>    
                            </span>
                        </td>
						<?php if ($_ADMIN ) {	?>  
                        <td>
                            <a class="noprint btn btn-primary btn-mini" target="_blank" href="<?PHP ECHO webUrl ?>Members/View?id=<?= $mData['MembersId'] ?>">
                                <i class="icon-ok"></i>View</a> 
                                <!--a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="<?PHP ECHO webUrl ?>Members/request_create?id=<?= $mData['MembersId'] ?>">
                                    <i class="icon-ok"></i>Request</a-->
								<?php if ($_ADMIN  && $UserTypeId==1) {	?>    
                                   <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Remark')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Remark')" data-ajax-update="#Remark > #modal-body" href="<?PHP ECHO webUrl ?>Members/Remarks?id=<?= $mData['MembersId'] ?>">
                                <i class="icon-ok"></i>Remark</a> 
                                <?php }	?>        

                        </td>
						<?php if ($_ADMIN) { ?>
                            <td>
                                <a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>Members/Edit?id=<?= $mData['MembersId'] ?>" data-ajax="true" data-ajax-begin="makedpt('EditMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('EditMem')" data-ajax-update="#EditMem > #modal-body"    >
                                    <i class="icon-edit"></i>Edit</a> 
								<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelMem')" data-ajax-update="#DelMem > #modal-body" href="<?PHP ECHO webUrl ?>Members/Delete?id=<?= $mData['MembersId'] ?>&amp;rowid=<?= $mData['MembersId'] ?>">
                                        <i class="icon-remove"></i>Delete</a>
                                <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Cert')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Cert')" data-ajax-update="#Cert > #modal-body" href="<?PHP ECHO webUrl ?>Members/CertEdit?id=<?= $mData['MembersId'] ?>&amp;rowid=<?= $mData['MembersId'] ?>">
                                        <i class="icon-ok"></i>Cert</a>
                            </td>
						<?php } ?>
						<?php } ?>
                    </tr>
				<?php endforeach; ?>
				<?php } ?>
            </tbody>
        </table>
    </div>
	
	<?php if(($_ADMIN && count($memData)>=50) || (!$_ADMIN && count($memData)>=5)){ ?>
	<a id="loadMore" href="Members/Search?type=<?= $searchType ?>" data-ajax="true" data-ajax-begin="loadMore('Members/Search?type=<?= $searchType ?>','showloadMore')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showloadMore('showloadMore')" >Load More</a>
	<div id="showloadMore" style="display:none">please wait....</div>
	<?php } ?>
</div>
<script>
    appsel = "";
    gbsel = "";
	pageNo=1;
<?php if ($_ADMIN) { ?>
 parent.resizeIframe();
<?php } ?>
</script>
<?php }else{ ?>
		<?php if($memData){ ?>
			<?php foreach($memData as $mData): ?>
				<tr id="<?= $mData['MembersId'] ?>">
				 <?php 
					if ($_ADMIN  && $UserTypeId==1) {
						?>    
					<td valign="middle" class="medium-cell">
							<i class="icon-group app<?= $mData['MembersId'] ?>" style ="color:<?php if($mData['Approved']){ ?>#00ff00;<?php } else echo '#ff0000'?>"></i>
						
							<input id="Approved" type="checkbox" class="bapp" onclick="appclick()" value="<?= $mData['MembersId'] ?>" name="Approved" ></input>
						
					</td>
				<?php } ?>
					<td class="clickable" font="Calibri">
						<span class="muted"><?= $mData['FirmName'] ?> </span>
					</td>
					<?php if (!$_ADMIN ) {	?>  
					<td class="clickable">
						<span class="muted"><?= $mData['SubGroupName'] ?> <br>
						<?php if($mData['Shop']) echo $mData['Shop'] ?> <?php if($mData['Street']) echo $mData['Street'] ?> </br> </span>
					</td>
					<td class="clickable"> 
						<span class="muted"><?= $mData['CityName'] ?>, <?= $mData['DistrictName'] ?> </span>
					</td>
					<?php }else{	?> 
					<td class="clickable">
						<span class="muted"><?= $mData['RegistrationNo'] ?> <br><?= $mData['RegistrationNoOld'] ?> </br> </span>
					</td>
					<td class="clickable">
						<span class="muted"><?= $mData['MemberType'] ?> </span>
					</td>
					<?php }	?>  
					<td class="clickable">
						<span class="muted"><?= $mData['GroupName'] ?> </span>
					</td>
					<?php if ($_ADMIN ) {	?>  
						 <td class="clickable">
						<span class="muted"> 
							<?= $mData['Remark'] ?>
						</span>
					</td>
				   <?php } ?>
					<td class="clickable">
						<span class="muted">
							<?php if ($_ADMIN ) {// && $UserTypeId==1	?>    
								<input id="" type="checkbox" class="gb cbrep1"  value="1_<?= $mData['MembersId'] ?>" onclick="gbclick()" name="Approved" ></input>
							<?php //}?>
							<?php if($mData['ImageRep1']){ ?>
								<img width="50" height="50" src="<?PHP ECHO webUrl ?><?= $mData['ImageRep1'] ?>">        
							<?php }?>
							<?php }?>
							
							
							<?= $mData['Representative1'] ?> <br>
							<?= $mData['MobileRep1'] ?> <br>
							<?= $mData['GoverningBodyIdNameRep1']; if($mData['CommitteeIDNameRep1']){?> (<?= $mData['CommitteeIDNameRep1'] ?>) <?php } ?>
							<?php if ($_ADMIN && $GoverningBodyIdRep1>0) {	?>    
								<input id="g1_<?= $mData['MembersId'] ?>" value="<?= $mData['GBOrderRep1'] ?>" class="span12 ord">
							<?php }	?>    
							<?php if ($_ADMIN && $mData['CardPrintRep1']>1) {	?>    
							<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('PrintId')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('PrintId')" data-ajax-update="#PrintId > #modal-body" href="<?PHP ECHO webUrl ?>Members/CardPrint?id=<?= $mData['MembersId'] ?>&amp;Rep=1&amp;rowid=<?= $mData['MembersId'] ?>  ">
									<i class="icon-ok"></i>Print Id</a>
							
							<?php }	?>    
						</span>
					</td>
					<td class="clickable">
						<span class="muted">
						<?php if ($mData['Representative2']) {	?>    
							<?php if ($_ADMIN) {// && $UserTypeId==1	?>    
								<input id="" type="checkbox" class="gb cbrep2"  value="2_<?= $mData['MembersId'] ?>" onclick="gbclick()" name="Approved" ></input>
							<?php //}?>
							<?php if($mData['ImageRep2']){ ?>
								<img width="50" height="50" src="<?PHP ECHO webUrl ?><?= $mData['ImageRep2'] ?>">        
							<?php }?>
							<?php }?>
							
							
							<?= $mData['Representative2'] ?> <br>
							<?= $mData['MobileRep2'] ?> <br>
							<?= $mData['GoverningBodyIdNameRep2']; if($mData['CommitteeIDNameRep2']){?> (<?= $mData['CommitteeIDNameRep2'] ?>) <?php } ?>
							<?php if ($_ADMIN && $GoverningBodyIdRep1>0) {	?>    
								<input id="g2_<?= $mData['MembersId'] ?>" value="<?= $mData['GBOrderRep2'] ?>" class="span12 ord">
							<?php }	?>    
							<?php if ($_ADMIN && $mData['CardPrintRep2']>1) {	?>    
							<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('PrintId')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('PrintId')" data-ajax-update="#PrintId > #modal-body" href="<?PHP ECHO webUrl ?>Members/CardPrint?id=<?= $mData['MembersId'] ?>&amp;Rep=2&amp;rowid=<?= $mData['MembersId'] ?>  ">
									<i class="icon-ok"></i>Print Id</a>
							
							<?php }	?>    
						<?php }	?>    
						</span>
					</td>
					<?php if ($_ADMIN ) {	?>  
					<td>
						<a class="noprint btn btn-primary btn-mini" target="_blank" href="<?PHP ECHO webUrl ?>Members/View?id=<?= $mData['MembersId'] ?>">
							<i class="icon-ok"></i>View</a> 
							<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="<?PHP ECHO webUrl ?>Members/request_create?id=<?= $mData['MembersId'] ?>">
								<i class="icon-ok"></i>Request</a>
							<?php if ($_ADMIN  && $UserTypeId==1) {	?>    
							   <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Remark')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Remark')" data-ajax-update="#Remark > #modal-body" href="<?PHP ECHO webUrl ?>Members/Remarks?id=<?= $mData['MembersId'] ?>">
							<i class="icon-ok"></i>Remark</a> 
							<?php }	?>        

					</td>
					<?php if ($_ADMIN) { ?>
						<td>
							<a  class="btn btn-primary btn-mini"  href="<?PHP ECHO webUrl ?>Members/Edit?id=<?= $mData['MembersId'] ?>" data-ajax="true" data-ajax-begin="makedpt('EditMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('EditMem')" data-ajax-update="#EditMem > #modal-body"    >
								<i class="icon-edit"></i>Edit</a> 
							<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelMem')" data-ajax-update="#DelMem > #modal-body" href="<?PHP ECHO webUrl ?>Members/Delete?id=<?= $mData['MembersId'] ?>&amp;rowid=<?= $mData['MembersId'] ?>">
									<i class="icon-remove"></i>Delete</a>
							<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Cert')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Cert')" data-ajax-update="#Cert > #modal-body" href="<?PHP ECHO webUrl ?>Members/CertEdit?id=<?= $mData['MembersId'] ?>&amp;rowid=<?= $mData['MembersId'] ?>">
									<i class="icon-ok"></i>Cert</a>
						</td>
					<?php } ?>
					<?php } ?>
				</tr>
			<?php endforeach; ?>
			<?php }else{ ?>
				<script>
					$("#loadMore").text("No More Records").addClass("noContent");
				</script>
			<?php } ?>
<?php } ?>