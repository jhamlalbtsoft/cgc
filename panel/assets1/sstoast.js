// toastr.success('We do have the Kapua suite available.', 'Success Alert', {timeOut: 5000})

 function successMsg(msg) {
    // toastr.success(msg);
    toastr.success(msg, 'Success', {timeOut: 5000});
 }

 function errorMsg(msg) {
     toastr.error(msg, 'Error', {timeOut: 5000});
 }

 function infoMsg(msg) {
     toastr.info(msg , 'Info', {timeOut: 5000});
 }

 function warningMsg(msg) {
     toastr.warning(msg, 'Warning', {timeOut: 5000});
 }
 // header afix//

 