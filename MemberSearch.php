
   <div id="page_header" class="uh_grey_with_glare bottom-shadow" style="height:10px;min-height:10px" >
			<div class=" bgback"></div>


<div class="zn_header_bottom_style"></div>
		</div>
    <section id="content">
    <div class="container">

        <div id="mainbody zn_has_sidebar">




            <div class="row">
  <h1 class="page-title">Member Search </h1>
      <?php echo webUrl ?>member
<iframe border="0" id="Mem" style="width:100%;border:0px solid;" src="<?php echo webUrl ?>member" scrolling="no" onload='javascript:resizeIframe(this);'></iframe>

                
            </div><!-- end row -->
        </div><!-- end mainbody -->

    </div><!-- end container -->

</section>
<script language="javascript" type="text/javascript">
  function resizeIframe() {
    //obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
document.getElementById('Mem').style.height = 100 + document.getElementById('Mem').contentWindow.document.body.scrollHeight + 'px';
//alert(document.getElementById('Mem').style.height);
  }
</script>
   