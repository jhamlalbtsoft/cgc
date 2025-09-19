<?php //require  __DIR__ . DIRECTORY_SEPARATOR  . "header"; ?>
 <div id="slideshow" class="uh_blue_style_with_gradient">
		
			<div class="bgback"></div>
			<div data-images="wp-content/themes/3G/images/" id="sparkles"></div>
		
			<div class="container zn_slideshow">

                <div id="nivoslider" class="nivoContainer ">
                    <div class="nivoSlider drop-shadow curved curved-hz-1" data-transition="random">
					<!--a class="link" href="#" target="_self"><img title="" src="wp-content/cgchamber22july.jpg" width="1170" height="0" /></a-->
					<img title="" src="assets/img/cgchamber-banner-none.jpeg" width="1170" height="0" />
					<!--img title="" src="assets/img/cgchamber-banner-1.jpeg" width="1170" height="0" />
					<img title="" src="assets/img/cgchamber-banner-2.jpeg" width="1170" height="0" />
					<img title="" src="assets/img/cgchamber-banner-3.jpeg" width="1170" height="0" />
					<img title="" src="assets/img/cgchamber-banner-4.jpeg" width="1170" height="0" />
					<img title="" src="assets/img/cgchamber-banner-5.jpeg" width="1170" height="0" /-->
                        
                    </div>
                </div><!-- end #nivoslider -->
                
			</div>
			
			<div class="zn_header_bottom_style"></div><!-- header bottom style -->
			
    </div><!-- end slideshow -->
	<?php
		require __DIR__ . DIRECTORY_SEPARATOR . "admin/lib" . DIRECTORY_SEPARATOR . "config.php";
		require PATH_LIB . "lib-eep.php";
		$eepLib = new Eep();
		$eepListNews = $eepLib->getAll(2, 3, "");//group by title
		
		require PATH_LIB . "lib-links.php";
		$linksLib = new Links();
		$linksList = $linksLib->getAll($type='links', 3);
	?>
    <section id="content">
    <div class="container">
		<div class="row ">
            <div class="span4 box image-boxes imgboxes_style1">
               
                <h3 class="m_title">LATEST NEWS</h3>
				<?php if(!empty($eepListNews)){ ?>
				<ul>
			<!--li> <a href="https://election.cgchamber.org/" target="_new">प्रारंभिक मतदाता सूची 2025</a><img src="Image/new-gif-image-14.gif" style="width: 10%;margin:-6px auto"/></li-->


				<?php foreach($eepListNews as $i=>$news){ 
				    $newImg = $i == 0 ? '<img src="Image/new-gif-image-14.gif" style="width: 10%;margin:-6px auto"/>' : "";
				?>
					<li><a href="latestNews?TypeId=2&Type=<?= urlencode($news['Title']) ?>"><?= $news['Title'] ?></a><?= $newImg ?></li>
				<!--Chhattisgarh Chamber of Commerce & Industries was constituted in the year 1959 on 19th April. At that time its name was Raipur Chamber of Commerce & Industries.
                <a class="" href="Overview" target="_self"><h6>Read more +</h6></a>-->
					<?php } ?>
			
				</ul>
				<a class="" href="eep?TypeId=2" target="_self"><h6>Read All</h6></a>
				<?php } ?>
            </div><!-- end span -->
            <div class="span4 box image-boxes imgboxes_style1"><h3 class="m_title">JOIN US</h3><!--Chhattisgarh Chamber of Commerce & Industries has been playing a pivotal role in promoting trade & raising awareness. It seeks to achieve the following objectives
            <a class="" href="OurObjectives" target="_self"><h6>Read more +</h6></a>-->
				<!--div class="textwidget contact-details">
                        <p>
                            <strong>T +91 (771) 2539275</strong><br>
                            Email: <a href="#">info.cgchamber@gmail.com</a>
                        </p>
                        <p>
                           Ch. Devilal Vyapar Udyog Bhawan<br>
                            2nd Floor, Bombay Market, Raipur (C.G.) 
                        </p>
                        <p><a href="contactus" target="_blank"><i class="icon-map-marker icon-white"></i> Open in Google Maps</a></p>
                    </div-->
				<?php /*
				<a href="Image/merged/CCCI_membership_english_1206.pdf" target="_new"><span class="icon-file"></span>Membership Registraion Form</a>
				<br>
				<a href="Image/merged/updation_form_Membership.pdf" target="_new"><span class="icon-file"></span>Membership Updation Form</a>
				*/ ?>
				 <a href="MembersFormNew" target="_new"><span class="icon-file"></span>Online Membership Registraion </a><img src="Image/new-gif-image-14.gif" style="width: 10%;margin:-6px auto"/> 
				<br>
				<a href="assets/pdfdoc/CCCI_membership_2021.pdf" target="_new"><span class="icon-file"></span>Membership Registraion Form</a>
				<br>
				<a href="assets/pdfdoc/updation_form_2021.pdf" target="_new"><span class="icon-file"></span>Membership Updation Form</a>
				<!--input class=" btn " id="submit-form" name="submit" value="Become Member" type="submit"-->
			</div>
            <!-- end span -->
            <div class="span4 box image-boxes imgboxes_style1"><h3 class="m_title">Links</h3><!--Membership in Chamber of Commerce & Industries brings many concrete benefits to both individual companies and to the cause of private enterprises in general-->
            <?php if(!empty($linksList)){ ?>
				<ul>
				<?php foreach($linksList as $links){ ?>
					<li><a target="_new" href="<?= $links['ulink'] ?>"><?= $links['title'] ?></a></li>
				<!--Chhattisgarh Chamber of Commerce & Industries was constituted in the year 1959 on 19th April. At that time its name was Raipur Chamber of Commerce & Industries.
                <a class="" href="Overview" target="_self"><h6>Read more +</h6></a>-->
					<?php } ?>
				</ul>
				<a class="" href="implinks" target="_self"><h6>Read All</h6></a>
				<?php } ?>
        </div>
	<?php /*	
        <div class="row ">
            <div class="span4 box image-boxes imgboxes_style1">
                <h3 class="m_title">GST HELP DESK</h3>
				<!--Chhattisgarh Chamber of Commerce & Industries was constituted in the year 1959 on 19th April. At that time its name was Raipur Chamber of Commerce & Industries.
                <a class="" href="Overview" target="_self"><h6>Read more +</h6></a>-->
				<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="#">
                                    <i class="icon-ok"></i>Query</a>
            </div><!-- end span -->
            <div class="span4 box image-boxes imgboxes_style1"><h3 class="m_title">INCOME TAX HELP DESK</h3><!--Chhattisgarh Chamber of Commerce & Industries has been playing a pivotal role in promoting trade & raising awareness. It seeks to achieve the following objectives
            <a class="" href="OurObjectives" target="_self"><h6>Read more +</h6></a>-->
				<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="#">
                                    <i class="icon-ok"></i>Query</a>
			</div>
            <!-- end span -->
            <div class="span4 box image-boxes imgboxes_style1"><h3 class="m_title">INDUSTRY HELP DESK</h3><!--Membership in Chamber of Commerce & Industries brings many concrete benefits to both individual companies and to the cause of private enterprises in general
            <a class="" href="MemberSearch" target="_self"><h6>Read more +</h6></a>-->
			<a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="#">
                                    <i class="icon-ok"></i>Query</a>
			</div><!-- end span -->
        </div>
*/ ?>

      
    </div>
<? /*
    <div class="gray-area ">
      <div class="container">
            <div class="row ">
                <div class="span6 box image-boxes imgboxes_style1 zn_ib_style2">
                    <h3 class="m_title">PRESIDENT DESK</h3><a class="hoverBorder alignright" style="float:right;width:250px" href="PresidentMessage" target="_blank">
<img src="Image/jitendra%20Barlota.jpg" style="height:200px" alt="PRESIDENT DESK" title="PRESIDENT DESK" /></a>						
<p style="text-align: justify;">
                       छत्तीसगढ़ चेम्बर आॅफ कामर्स एंड इंडस्ट्रीज 59 वर्ष पूर्ण करके 60वें वर्ष में पदार्पण कर रहा है । यह किसी भी संस्था के लिये गौरव की बात है । निरंतर कार्यशील होतेे हुए 60 वर्ष पूर्ण करने वाली व्यापारिक संस्थाओं की संख्या बहुत कम हैं । हमारे लिये गर्व की बात है कि संस्था के सदस्यों की संख्या 16000 आजीवन सदस्य एवं 122 संघ आजीवन सदस्य चेम्बर से जुड़े हुए हैं । हमारा लक्ष्य भी यह है कि प्रदेश के कोने - कोने तक इस संस्था की सदस्य संख्या बढ़ाना, जिससे व्यापार-उद्योग जगत की बात हम तक  पहुंच सके तथा हम शासन तक उनकी बात पहुंचा सके । हमारी मंशा भी है कि हम शासन एवं व्यापारियो के साथ बैठकर यहां के व्यवसाय एवं उद्योगों की प्रगति के लिये कार्य करें ।</p>
	<!--<p style="text-align: justify;">प्रारंभ से ही चेम्बर ने शासन एवं व्यापारियों -उद्योगपतियों के बीच “सेतु“ का कार्य किये-फलस्वरूप व्यापार-उद्योग जगत के लिये उल्लेखनीय कार्य हुआ ।</p>
	<p style="text-align: justify;">हमारी मंशा भी है कि हम शासन एवं व्यापारियो के साथ बैठकर यहां के व्यवसाय एवं उद्योगों की प्रगति के लिये कार्य करें । </p>

<p style="text-align: right;">जैन जीतेन्द्र बरलोटा</p>
<p style="text-align: right;">प्रदेश अध्यक्ष</p>-->		

                </div><!-- end span -->			
<div class="span6">

                    <h3 class="m_title">GENERAL SECRETARY DESK</h3>
<a class="hoverBorder alignright" href="GeneralSecretaryMessage" target="_blank"><img src="Image/lalchand%20gulwani.jpg" style="height:200px" alt="GENERAL SECRETARY DESK" title="GENERAL SECRETARY DESK" /></a>	<p style="text-align: justify;">आदरणीय व्यापारी बंधुओं, छत्तीसगढ़ चेम्बर ऑफ कामर्स हमारी बहुत पुरानी संस्था है । जिसमें निरंतर आपका सहयोग मिल रहा है, मिलता रहेगा । हर व्यापारिक समस्याओं का समाधान हमारा मुख्य उद्देश्य रहेगा । यह हमारे लिए गौरव की बात है कि हम आज छत्तीसगढ़ चेम्बर ऑफ कामर्स एंड इंडस्ट्रीज की नवनिर्मित वेब साइट आपको समर्पित करने जा रहे है । इस वेब साइट के माध्यम से आप सबसे सतत् संपर्क में रहने का सुअवसर प्राप्त होता रहेगा । 
                        </p>
                    <!-- end // accordion texts  -->
                </div>

            </div>
         
        
 
</div>
    </div>
    */ ?>
</section>
<!-- end #content -->
<?php //require  __DIR__ . DIRECTORY_SEPARATOR  . "footer"; ?>
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            function Inittinymce() {
                tinymce.init({

                    selector: "textarea",
                    plugins: [
                        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace  visualblocks visualchars code  insertdatetime media nonbreaking",
                        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
                    ],

                    toolbar1: " bold italic underline  |  fontselect fontsizeselect",
                    menubar: false
                        //            toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo |  image media code |  preview | forecolor backcolor",
                        //            toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking template pagebreak "
                        //           
                });
            }

            function SetImageOnTinyMce(ImageUrl) {

                tinyMCE.activeEditor.dom.add(tinyMCE.activeEditor.getBody(), 'div', {
                    title: 'my title'
                }, "<img src='" + ImageUrl + "'/>");

            }

            function SetFileLinkOnTinyMce(FileLink, FileText) {
                //var s = tinymce.activeEditor.getContent();
                tinyMCE.activeEditor.dom.add(tinyMCE.activeEditor.getBody(), 'div', {
                    title: 'my title'
                }, "<a target='_blank' href='" + FileLink + "'>" + FileText + "</a>");
                //tinymce.activeEditor.setContent(s + "<a target='_blank' href='" + FileLink + "'>" + FileText + "</a>");

            }
        </script>
		<style>
			.nivo-directionNav{display: none;}
		</style>