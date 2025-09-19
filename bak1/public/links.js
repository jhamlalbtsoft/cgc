var mylinks = {
  list : function () {
  // list() : show all the links

    adm.load({
      url : "ajax-links.php?Type="+Type+"&mType=1",
      target : "container",
      data : {
        req : "list"
      }
    });
  },

  addEdit : function (id) {
  // addEdit() : show add/edit user docket
  // PARAM id : user ID

    adm.load({
      url : "ajax-links.php?Type="+Type+"&mType=1",
      target : "container",
      data : {
        req : "addEdit",
        id : id
      },
	  ok : topFunction()
    });
  },

  save : function () {
  // save() : save user

    var id = document.getElementById("id").value;
    //alert(document.getElementById("Visibility").checked);
    adm.ajax({
      url : "ajax-links.php?Type="+Type+"&mType="+mType,
	  contentType: "application/x-www-form-urlencoded;charset=UTF-8",
      data : {
        req : (id=="" ? "add" : "edit"),
        id : id,
        Title : (document.getElementById("Title").value),
        ulink : (document.getElementById("ulink").value)
        
      },
      ok : mylinks.list
    });
    return false;
  },

  del : function (id) {
  // del() : delete user
  // PARAM id : user ID

    if (confirm("Want to Delete this Record?")) {
      adm.ajax({
        url : "ajax-links.php?Type="+Type,
        data : {
          req : "del",
          id : id
        },
        ok : mylinks.list
      });
    }
  }
};

window.addEventListener("load", mylinks.list);