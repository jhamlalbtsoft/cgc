var eep = {
  list : function () {
  // list() : show all the eep

    adm.load({
      url : "ajax-eep.php?TypeId="+TypeId+"&catType="+catType,
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
      url : "ajax-eep.php?TypeId="+TypeId,
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

    var id = document.getElementById("EEPId").value;
    adm.ajax({
      url : "ajax-eep.php?TypeId="+TypeId,
	  contentType: "application/x-www-form-urlencoded;charset=UTF-8",
      data : {
        req : (id=="" ? "add" : "edit"),
        id : id,
        Title : (document.getElementById("Title").value),
        Description : (document.getElementById("Description").value),
        DateOfEEP : document.getElementById("DateOfEEP").value,
        TypeId : TypeId,
        GovernmentPolicyId : document.getElementById("GovernmentPolicyId").value,
        ImagePath : document.getElementById("ImagePath").value,
        filePath : document.getElementById("filePath").value
      },
      ok : eep.list
    });
    return false;
  },

  del : function (id) {
  // del() : delete user
  // PARAM id : user ID

    if (confirm("Want to Delete this Record?")) {
      adm.ajax({
        url : "ajax-eep.php?TypeId="+TypeId,
        data : {
          req : "del",
          id : id
        },
        ok : eep.list
      });
    }
  },
  
  Remove : function (id, imgPath, _type) {
  // del() : delete user
  // PARAM id : user ID

    if (confirm("Want to Delete?")) {
      adm.ajax({
        url : "ajax-eep.php?TypeId="+TypeId,
        data : {
          req : "remove",
          id : id,
          imgPath : imgPath,
          ftype : _type
        },
        ok : eep.list
      });
    }
  }
};

window.addEventListener("load", eep.list);