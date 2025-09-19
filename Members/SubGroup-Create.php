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

    <div class="span12">
        <div class="grid simple">
        <div class="grid-body no-border">
    <div id="fc">
<form action="SubGroup-Create?popup=1&amp;eid=AddSubGroup&amp;fname=LoadSubGroup" class="form-no-horizontal-spacing" data-ajax="true" data-ajax-mode="replace" data-ajax-update="#AddSubGroup > #modal-body" id="form0" method="post">    <div class="row-fluid column-seperation">
  <div class="span8">
				
                  <h4>Add New Subgroup</h4>
                   <div class="row-fluid">
                      <div class="span12">
                      <label for="Subgroup_Name">Subgroup Name</label>
                        <input class="span12" data-val="true" data-val-required="Sub Group Name is required." id="SubGroupName" name="SubGroupName" placeholder="Subgroup Name*" type="text" value="" />
                        <span class="field-validation-valid error" data-valmsg-for="SubGroupName" data-valmsg-replace="true"></span>
                      </div>
                </div>
                <div class="row-fluid">
                      <div class="span12">
                      <label for="Group">Group</label>
                        <select class="span12" id="GroupsId" name="GroupsId" placeholder="Group*"><option value="1">Food Grains Wholesalers (01)</option>
<option value="2">Food Grains Retailers (02)</option>
<option value="3">Kirana Wholesalers (03)</option>
<option value="4">Kirana Retailers (04)</option>
<option value="5">Cosmetics &amp; Generalgoods (05)</option>
<option value="6">Steel (Iron) &amp; Cement (06)</option>
<option value="7">Hardware &amp; Paints Dealers (07)</option>
<option value="8">Mill Machinary (08)</option>
<option value="9">Jewellery (09)</option>
<option value="10">Hosiery &amp; Readymade (10)</option>
<option value="11">Bardana Merchants (11)</option>
<option value="12">Cycle Dealers (12)</option>
<option value="13">Auto Parts Dealers (13)</option>
<option value="14">Utensils Merchants (14)</option>
<option value="15">Tea &amp; Tobacco Merchants (15)</option>
<option value="16">Small scale Industry (16)</option>
<option value="17">Medical Store (17)</option>
<option value="18">Petroleum Product (18)</option>
<option value="19">Timber Merchant (19)</option>
<option value="20">Fruits &amp; Vegetables Merchants (20)</option>
<option value="21">Cloths Wholesalers (21)</option>
<option value="22">Cloths Retailers (22)</option>
<option value="23">Theater (23)</option>
<option value="24">Rice Mill Owners (24)</option>
<option value="25">Oil Mill Owners (25)</option>
<option value="26">Dal Mill Owners (26)</option>
<option selected="selected" value="27">Electronics,TV &amp; Radio Sellers (27)</option>
<option value="28">Stationary &amp; Book Sellers (28)</option>
<option value="29">Hotel &amp; Guest House (29)</option>
<option value="30">Industry (30)</option>
<option value="31">Contractors (31)</option>
<option value="32">Printing Press (32)</option>
<option value="33">Tyre Dealers (33)</option>
<option value="34">Union Members - Local (35)</option>
<option value="35">Union Members (36)</option>
<option value="36">Transports &amp; Travels Agency (38)</option>
<option value="37">Home Appliances (39)</option>
<option value="38">Agriculture Products (40)</option>
<option value="39">Photo Studio (41)</option>
<option value="40">Shoes Retailer (42)</option>
<option value="41">Shoes Wholesaler (43)</option>
<option value="42">Automobiles (Two Wheeler) (44)</option>
<option value="43">Restaurant (45)</option>
<option value="44">Fancy Stores (46) </option>
<option value="45">Readymade Garments Retailer (47)</option>
<option value="46">FMCG Wholesalers (48)</option>
<option value="47">Mobile &amp; Recharge Retailers (49)</option>
<option value="48">Electrical Wholesaler (50)</option>
<option value="49">Automobiles (Four Wheeler) (51)</option>
<option value="50">Electrical Retailer (52)</option>
<option value="51">Tiles &amp; Marble (53)</option>
<option value="52">Builders Materials Suppliers (54)</option>
<option value="53">Computer, Printer, Copier (55)</option>
<option value="54">Beauty Parlour (56)</option>
<option value="55">Gas Agency (57)</option>
<option value="56">Furniture (58)</option>
<option value="57">Stone Crusher (59)</option>
<option value="58">Others (60)</option>
<option value="59">Pan Thela &amp; Pan Mashala (61)</option>
<option value="60">Building Material (62)</option>
<option value="61">Provision Stores (63)</option>
<option value="62">Petrol Pump (64)</option>
<option value="63">Watch &amp; Optical (65)</option>
<option value="64">Ready Made and Hosiery Hand loom (66)</option>
<option value="65">Wholesale Trading (67)</option>
<option value="66">Builder &amp; Developers (68)</option>
<option value="67">Trading &amp; Tally Software (69)</option>
<option value="68">Production of Films (70) </option>
<option value="69">Confectionery (71)</option>
<option value="70">Manufacturer (72)</option>
<option value="71">Trading &amp; Fabrication (73)</option>
<option value="74">Plywood Hardware (75)</option>
<option value="75">Fruit Business (76)</option>
<option value="76">Finance &amp; Consultants (77)</option>
<option value="77">Coal Trading (78)</option>
<option value="78">Crackers Seller (79)</option>
<option value="79">Training Centre (80)</option>
<option value="80">Machinery &amp; Electrical Parts (81)</option>
<option value="81">Institute (82)</option>
<option value="82">Pharming &amp; Cold Storege (83)</option>
<option value="83">Ice Cream Shop (84)</option>
<option value="84">Broker (85)</option>
<option value="85">Real Estate (86)</option>
<option value="86">Dairy Trading (87)</option>
<option value="87">Genereal Stores (88)</option>
<option value="88">Minerals (89)</option>
<option value="89">Motor Parts (90)</option>
<option value="90">Footwear (91)</option>
<option value="91">Govt. Supplier (92)</option>
</select>
                        <span class="field-validation-valid error" data-valmsg-for="GroupsId" data-valmsg-replace="true"></span>
                      </div>
                </div>
                </div>
     <script type="text/javascript">
         $(document).ready(function () {
             $("#fc > form").removeData("validator");
             $("#fc > form").removeData("unobtrusiveValidation");
             $.validator.unobtrusive.parse("#fc > form");
         });
  </script>
        </div>
				<div class="form-actions">
					<div class="pull-left">
					
					</div>
					<div class="pull-right">
					  <button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
					<a  class="btn btn-white btn-cons"  href="<?PHP ECHO webUrl ?>/Members/Subgroup-Index" data-ajax-update="#master" data-ajax-mode="replace" data-ajax-loading="" data-ajax="true">

Cancel</a>
					</div>
				  </div>
</form>    </div>
    </div>
  </div>
 </div>
    </div>