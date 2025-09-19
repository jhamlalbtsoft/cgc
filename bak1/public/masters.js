var masters = {
  list : function () {
  // list() : show all the masters

    adm.load({
      url : "ajax-masters.php?Type="+Type+"&mType="+mType,
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
      url : "ajax-masters.php?Type="+Type+"&mType="+mType,
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
      url : "ajax-masters.php?Type="+Type+"&mType="+mType,
	  contentType: "application/x-www-form-urlencoded;charset=UTF-8",
      data : {
        req : (id=="" ? "add" : "edit"),
        id : id,
        Title : (document.getElementById("Title").value),
        Code : (document.getElementById("Code").value),
        ParentID : (document.getElementById("ParentID").value),
        Visibility : document.getElementById("Visibility").checked,
        
      },
      //ok : masters.list
      ok : alert("Added Successfully")
    });
    return false;
  },

  del : function (id) {
  // del() : delete user
  // PARAM id : user ID

    if (confirm("Want to Delete this Record?")) {
      adm.ajax({
        url : "ajax-masters.php?Type="+Type,
        data : {
          req : "del",
          id : id
        },
        ok : masters.list
      });
    }
  }
};

window.addEventListener("load", masters.list);