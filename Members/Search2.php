<div class="row-fluid">

    <div class="row-fluid dataTables_wrapper">

        <h2 class="pull-left">

            Members

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



        </h2>

        <div class="pull-right margin-top-20">

            <div class="dataTables_info hidden-phone" id="example_info">

                Showing <b>1 to 2</b> of 2 entries</div>

        </div>

        <div class="clearfix">

        </div>

    </div>

    <div id="email-list">

        <table class="table table-fixed-layout table-hover table-bordered" id="emails">

            <thead>

                <tr>

                     <th class="medium-cell">

                    </th>



                    

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

                       

                            <input id="CbRep1" type="checkbox"  value="" onchange="cbrep1click()"   ></input>

                       

                           Rep(1)

                    </th>

                    <th>

                              <input id="CbRep2" type="checkbox"   value="" onchange="cbrep2click()"  ></input>

                        

                             Rep(2)

                    </th>

                    <th>



                    </th>

                        <th class="">

                        </th>

                </tr>

            </thead>

            <tbody>

                    <tr id="10051">

                        

                        <td valign="middle" class="medium-cell">

                                <i class="icon-group app10051" style ="color:#00ff00"></i>

                            

                                <input id="Approved" type="checkbox" class="bapp" onclick="appclick()" value="10051" name="Approved" ></input>

                            

                        </td>



                        <td class="clickable" font="Calibri">

                            <span class="muted">MAHALAXMI ENTERPRISES </span>

                        </td>

                        <td class="clickable">

                            <span class="muted">CCCI/LT/02/60/10051 <br>CCCI28530/ 60 / LT </br> </span>

                        </td>

                        <td class="clickable">

                            <span class="muted">LT </span>

                        </td>

                        <td class="clickable">

                            <span class="muted">Others (60) </span>

                        </td>

                             <td class="clickable">

                            <span class="muted">Reg. Cert 

Card print action on 06.08.2015 </span>

                        </td>

                       

                        <td class="clickable">

                            <span class="muted">

                                    <input id="" type="checkbox" class="gb cbrep1"  value="1_10051" onclick="gbclick()" name="Approved" ></input>

                                          <img src="showimage.aspx?h=50&w=50&image=Image/MANOHAR LAL THADANI_4632.jpg" />        

 MANOHAR LAL THADANI                                    <br />8103288884                                    <br />

                                 <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('PrintId')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('PrintId')" data-ajax-update="#PrintId > #modal-body" href="/school/B-Members-CardPrint?id=10051&Rep=1&rowid=10051  ">

                                        <i class="icon-ok"></i>Print Id</a> 

                            </span>

                        </td>

                        <td class="clickable">

                            <span class="muted">

                                    <input id="" type="checkbox" class="gb cbrep2"  value="2_10051" onclick="gbclick()" name="Approved" ></input>

                                          <img src="showimage.aspx?h=50&w=50&image=Image/SUNNY THADANI_4633.jpg" /> 

SUNNY THADANI                                    <br />9303788884                                    <br />

                                 <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('PrintId')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('PrintId')" data-ajax-update="#PrintId > #modal-body" href="/school/B-Members-CardPrint?id=10051&Rep=2&rowid=10051  ">

                                        <i class="icon-ok"></i>Print Id</a> 

                            </span>

                        </td>

                        <td>

                            <a class="noprint btn btn-primary btn-mini" target="_blank" href="view member?id=10051">

                                <i class="icon-ok"></i>View</a> 

                                <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="/school/B-Request-Create?id=10051">

                                    <i class="icon-ok"></i>Request</a>

                                   <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Remark')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Remark')" data-ajax-update="#Remark > #modal-body" href="/school/B-Members-Remark?id=10051">

                                <i class="icon-ok"></i>Remark</a> 

                                    



                        </td>

                            <td>

                                <a  class="btn btn-primary btn-mini"  href="/school/B-Members-Edit?id=10051 " data-ajax="true" data-ajax-begin="makedpt('EditMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('EditMem')" data-ajax-update="#EditMem > #modal-body"    >

                                    <i class="icon-edit"></i>Edit</a> <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelMem')" data-ajax-update="#DelMem > #modal-body" href="/school/B-Members-Delete?id=10051&amp;rowid=10051  ">

                                        <i class="icon-remove"></i>Delete</a>

                                    <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Cert')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Cert')" data-ajax-update="#Cert > #modal-body" href="/school/B-Members-CertEdit?id=10051&amp;rowid=10051  ">

                                        <i class="icon-ok"></i>Cert</a>

                            </td>

                    </tr>

                    <tr id="11796">

                        

                        <td valign="middle" class="medium-cell">

                                <i class="icon-group app11796" style ="color:#00ff00"></i>

                            

                                <input id="Approved" type="checkbox" class="bapp" onclick="appclick()" value="11796" name="Approved" ></input>

                            

                        </td>



                        <td class="clickable" font="Calibri">

                            <span class="muted">KHANDWE SANJAY &amp; ASSOCIATES  </span>

                        </td>

                        <td class="clickable">

                            <span class="muted">CCCI/LT/02/31/10413 <br>28820 </br> </span>

                        </td>

                        <td class="clickable">

                            <span class="muted">LT </span>

                        </td>

                        <td class="clickable">

                            <span class="muted">Contractors (31) </span>

                        </td>

                             <td class="clickable">

                            <span class="muted">TIN NO. AND REGISTRATION CERTIFICATE AND MEMBER PHOTOS  </span>

                        </td>

                       

                        <td class="clickable">

                            <span class="muted">

                                    <input id="" type="checkbox" class="gb cbrep1"  value="1_11796" onclick="gbclick()" name="Approved" ></input>

SANJAY KHANDWE                                     <br />9424100196                                    <br />

                            </span>

                        </td>

                        <td class="clickable">

                            <span class="muted">

                            </span>

                        </td>

                        <td>

                            <a class="noprint btn btn-primary btn-mini" target="_blank" href="view member?id=11796">

                                <i class="icon-ok"></i>View</a> 

                                <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Req')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Req')" data-ajax-update="#Req > #modal-body" data-ajax-complete="Inittinymce()" href="/school/B-Request-Create?id=11796">

                                    <i class="icon-ok"></i>Request</a>

                                   <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Remark')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Remark')" data-ajax-update="#Remark > #modal-body" href="/school/B-Members-Remark?id=11796">

                                <i class="icon-ok"></i>Remark</a> 

                                    



                        </td>

                            <td>

                                <a  class="btn btn-primary btn-mini"  href="/school/B-Members-Edit?id=11796 " data-ajax="true" data-ajax-begin="makedpt('EditMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('EditMem')" data-ajax-update="#EditMem > #modal-body"    >

                                    <i class="icon-edit"></i>Edit</a> <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('DelMem')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('DelMem')" data-ajax-update="#DelMem > #modal-body" href="/school/B-Members-Delete?id=11796&amp;rowid=11796  ">

                                        <i class="icon-remove"></i>Delete</a>

                                    <a class="noprint btn btn-primary btn-mini" data-ajax="true" data-ajax-begin="makedpt('Cert')" data-ajax-loading="#load" data-ajax-mode="replace" data-ajax-success="showdpt('Cert')" data-ajax-update="#Cert > #modal-body" href="/school/B-Members-CertEdit?id=11796&amp;rowid=11796  ">

                                        <i class="icon-ok"></i>Cert</a>

                            </td>

                    </tr>

            </tbody>

        </table>

    </div>

</div>

<script>

    appsel = "";

    gbsel = "";



</script>
