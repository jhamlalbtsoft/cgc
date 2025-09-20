<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require __DIR__ . "/admin/lib/config.php";

class DBConnection {
  public $pdo;
  public $stmt;

  public function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, 
        DB_USER, 
        DB_PASSWORD, 
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
    } catch (Exception $ex) {
      echo 'Database error: ' . $ex->getMessage();
      exit; // Stop if DB fails
    }
  }

  public function __destruct() {
    $this->stmt = null;
    $this->pdo = null;
  }
}

// Create DB object
$db = new DBConnection();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Member Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    label {
      text-align: right;
    }
    input[type="text"] 
    {
      height: 30px;
    }
    select {
              height: auto;
              padding: 8px 12px;
              font-size: 1rem;
              border-radius: 5px;
              border: 1px solid #ccc;
              width: 100%; /* optional: to make full-width */
            }
   input[type="number"] 
    {
      height: 30px;
    }
    input[type="email"] 
    {
      height: 30px;
    }
    input[type="tel"] 
    {
      height: 30px;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="mb-0">MEMBERSHIP FORM FOR LIFETIME / ASSOCIATION MEMBERSHIP<br>
            <!-- <small class="text-white">(CAPITAL LETTERS ONLY)</small> -->
          </h4>
        </div>
        <div class="card-body">
            
            <!-- <h2>Coming Soon...</h2> -->
          <form action="memberupdate.php" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <div class="col-md-6 form-group-column">
                  <label for="MobileRep1" class="form-label">MOBILE NO</label>
                  <input type="tel" class="form-control" id="MobileRep1" name="MobileRep1" required>
              </div>

              <div class="text-center mt-4 showbeforevalidate">
                  <button type="button" class="btn btn-primary px-5 py-2 sendotp">Send OTP</button>
              </div>
            </div>
            <!-- OTP Input -->
          <div class="mb-3 showafterverify">
            <label for="otp" class="form-label">Enter OTP</label>
            <input type="text" class="form-control" id="otp" maxlength="5" placeholder="Enter OTP">
            <button type="button" class="btn btn-success mt-2 verifyotp">Verify OTP</button>
          </div>
          </div>
        <div class="showaftervalidate p-2">
        <div class="row mb-3">
          <div class="col-md-6 form-group-column">
                <label for="FirmName" class="form-label">FULL NAME OF FIRM</label>
                <input type="text" class="form-control" id="FirmName" name="FirmName" required>
            </div>
            <div class="col-md-6 form-group-column">
                <label for="Shop" class="form-label">SHOP NO.</label>
                <input type="text" class="form-control" id="Shop" name="Shop">
            </div>
           
            
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="Complex" class="form-label">COMPLEX NAME</label>
                <input type="text" class="form-control" id="Complex" name="Complex">
            </div>
            <div class="col-md-6 form-group-column">
                <label for="Street" class="form-label">Street</label>
                <input type="text" class="form-control" id="Street" name="Street">
            </div>
            
            
        </div>

       <div class="row mb-3">
    <div class="col-md-6 form-group-column">
        <label for="DistrictName" class="form-label">District</label>
        <select class="form-select" id="DistrictName" name="DistrictName" onchange="loadUnitsByDistrict(this.value, targetSelector = "#ekai_id")" required>
            <option value="">Select District</option>
            <?php
            $stmt = $db->pdo->prepare("SELECT DistrictName FROM district ORDER BY DistrictName");
            $stmt->execute();
            $districts = $stmt->fetchAll();

            foreach ($districts as $row) {
                echo '<option value="' . htmlspecialchars($row['DistrictName']) . '">' . htmlspecialchars($row['DistrictName']) . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="col-md-6 form-group-column">
        <label for="ekai_id" class="form-label">UNIT</label>
        <select class="form-select" id="ekai_id" name="ekai_id" required>
            <option value="">Select Unit</option>
        </select>
    </div>
</div>


        <div class="row mb-3">
          <div class="col-md-6 form-group-column">
                <label for="CityName" class="form-label">CITY / VILLAGE</label>
                <select class="form-select" id="CityName" name="CityName" required>
                    <?php
                              $stmt = $db->pdo->prepare("SELECT CityName FROM city order by CityName");
                                  $stmt->execute();
                                  $cities = $stmt->fetchAll();

                                  foreach ($cities as $row) {
                                      echo '<option value="' . htmlspecialchars($row['CityName']) . '">' . htmlspecialchars($row['CityName']) . '</option>';
                                  }

                          ?>
                </select>
            </div>
            <div class="col-md-6 form-group-column">
                <label for="AreaName" class="form-label">AREA / MOHALLA</label>
                <select class="form-select" id="AreaName" name="AreaName" required>
                          <option value="">Select Area</option>
                          <?php
                              $stmt = $db->pdo->prepare("SELECT AreaName FROM area order by AreaName");
                                  $stmt->execute();
                                  $areas = $stmt->fetchAll();

                                  foreach ($areas as $row) {
                                      echo '<option value="' . htmlspecialchars($row['AreaName']) . '">' . htmlspecialchars($row['AreaName']) . '</option>';
                                  }

                          ?>
                      

                </select>
            </div>
            <div class="col-md-6 form-group-column">
                <label for="PIN" class="form-label">PIN CODE NO.</label>
                <input type="text" class="form-control" id="PIN" name="PIN" required>
            </div>
            
        </div>

        <div class="row mb-3">
          <div class="col-md-6 form-group-column">
                <label for="STDCode" class="form-label">STD CODE</label>
                <input type="text" class="form-control" id="STDCode" name="STDCode">
            </div>
           <div class="col-md-6 form-group-column">
                <label for="Mobile" class="form-label">PHONE NO.</label>
                <input type="tel" class="form-control" id="Mobile" name="Mobile">
            </div>
           
            
            
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="GSTN" class="form-label">GST NO. / GUMASTA</label>
                <input type="text" class="form-control" id="GSTN" name="GSTN" required>
            </div>
            <div class="col-md-6 form-group-column">
                <label for="GroupName" class="form-label">TYPE OF BUSINESS</label>
                <select class="form-select" id="GroupName" name="GroupName" required>
                    <?php
                              $stmt = $db->pdo->prepare("SELECT GroupName FROM groups order by GroupName");
                                  $stmt->execute();
                                  $groups = $stmt->fetchAll();

                                  foreach ($groups as $row) {
                                      echo '<option value="' . htmlspecialchars($row['GroupName']) . '">' . htmlspecialchars($row['GroupName']) . '</option>';
                                  }

                          ?>
                </select>
            </div>
            <div class="col-md-6 form-group-column">
                <label for="Representative1" class="form-label">NAME OF REPRESENTATIVE (1)</label>
                <input type="text" class="form-control" id="Representative1" name="Representative1">
            </div>
             <div class="col-md-6 form-group-column">
                <label for="ImageRep1" class="form-label">Photo 1</label>
                <input type="file" class="form-control" id="ImageRep1" name="ImageRep1">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="EmailRep1" class="form-label">Email</label>
                <input type="email" class="form-control" id="EmailRep1" name="EmailRep1" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="Representative2" class="form-label">NAME OF REPRESENTATIVE (2)</label>
                <input type="text" class="form-control" id="Representative2" name="Representative2">
            </div>
            <div class="col-md-6 form-group-column">
                <label for="ImageRep2" class="form-label">Photo 2</label>
                <input type="file" class="form-control" id="ImageRep2" name="ImageRep2">
            </div>
            
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="mobileRep2" class="form-label">MOBILE NO.</label>
                <input type="tel" class="form-control" id="mobileRep2" name="mobileRep2">
            </div>
            <div class="col-md-6 form-group-column">
                <label for="emailRep2" class="form-label">E – MAIL</label>
                <input type="email" class="form-control" id="emailRep2" name="emailRep2">
            </div>
            
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="gstfiles" class="form-label">GST Certificate / Gumasta</label>
                <input type="file" class="form-control" id="gstfiles" name="gstfiles">
            </div>
            <div class="col-md-6 form-group-column">
                <label for="paymentfiles" class="form-label">Payment Attachment</label>
                <input type="file" class="form-control" id="paymentfiles" name="paymentfiles">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" name="website">
            </div>
             <div class="col-md-6 form-group-column">
                <label for="shopPhoto" class="form-label">Shop Photo</label>
                <input type="file" class="form-control" id="shopPhoto" name="shopPhoto">
            </div>
            
        </div>

        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="geoLocation" class="form-label">Geo Location</label>
                <input type="text" class="form-control" id="geoLocation" name="geoLocation">
            </div>
            <div class="col-md-6 form-group-column">
                <label for="reference" class="form-label">Reference</label>
                <input type="text" class="form-control" id="reference" name="reference">
            </div>
           
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="referenceMobile" class="form-label">Reference Mobile</label>
                <input type="tel" class="form-control" id="referenceMobile" name="referenceMobile">
            </div>
            
        </div>

        <!-- Hidden Image Previews -->
        <div class="row mb-3 d-none" id="imagePreviews">
            <div class="col-md-4 text-center">
                <label>Photo 1 Preview</label><br>
                <img id="previewImageRep1" src="" alt="Image Rep1" class="img-thumbnail" style="max-height:150px; display:none;">
            </div>
            <div class="col-md-4 text-center">
                <label>Photo 2 Preview</label><br>
                <img id="previewImageRep2" src="" alt="Image Rep2" class="img-thumbnail" style="max-height:150px; display:none;">
            </div>
            <div class="col-md-4 text-center">
                <label>GST / Gumasta Preview</label><br>
                <img id="previewGST" src="" alt="GST Files" class="img-thumbnail" style="max-height:150px; display:none;">
            </div>
        </div>

        <div class="row mb-3 d-none" id="otherPreviews">
            <div class="col-md-6 text-center">
                <label>Payment Attachment Preview</label><br>
                <img id="previewPayment" src="" alt="Payment Files" class="img-thumbnail" style="max-height:150px; display:none;">
            </div>
            <div class="col-md-6 text-center">
                <label>Shop Photo Preview</label><br>
                <img id="previewShopPhoto" src="" alt="Shop Photo" class="img-thumbnail" style="max-height:150px; display:none;">
            </div>
        </div>

        <!-- Hidden Inputs for Existing Files / Image Previews -->
        <input type="hidden" id="hiddenpreviewImageRep1" name="previewImageRep1" value="">
        <input type="hidden" id="hiddenpreviewImageRep2" name="previewImageRep2" value="">
        <input type="hidden" id="hiddenpreviewGST" name="previewGST" value="">
        <input type="hidden" id="hiddenpreviewPayment" name="previewPayment" value="">
        <input type="hidden" id="member_id" name="member_id" value="">



        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-5 py-2">Submit</button>
        </div>
      </div>
    </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto-uppercase script -->
<script>
  document.querySelectorAll('input[type="text"]').forEach(function(input) {
    input.addEventListener('input', function() {
      this.value = this.value.toUpperCase();
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
  $('.showaftervalidate').hide();
  $('.showafterverify').hide();
  $('.showbeforevalidate').show();




});

$(document).ready(function () {

    // STEP 1: Send OTP
    $(document).on("click", ".sendotp", function () {
        let MobileRep1 = $('#MobileRep1').val().trim();

        if (MobileRep1.length !== 10 || !/^[0-9]{10}$/.test(MobileRep1)) {
            alert("Please enter a valid 10-digit number.");
            return;
        }

        $.ajax({
            url: "sendotpedit.php",
            type: "POST",
            data: { MobileRep1: MobileRep1 },
            cache: false,
            success: function (html) {
                if (html == 1) {
                    $('.showbeforevalidate').hide();      // hide mobile input
                    $('.showafterverify').show();         // hide success message
                    $('.showaftervalidate').hide();       // show OTP input section
                    $('#MobileRep1').attr('readonly', true);
                } else {
                    alert("Failed to send OTP. Please try again.");
                    $('.showbeforevalidate').show();
                    $('.showaftervalidate').hide();
                    $('.showafterverify').hide();
                }
            },
            error: function () {
                alert("Server error while sending OTP.");
            }
        });
    });

    // STEP 2: Verify OTP
    $(document).on("click", ".verifyotp", function () {
        let otp = $('#otp').val().trim();
        let MobileRep1 = $('#MobileRep1').val().trim();

        if (otp.length !== 5 || !/^[0-9]{5}$/.test(otp)) {
            alert("Please enter a valid 5-digit OTP.");
            return;
        }

        $.ajax({
            url: "verify.php",
            type: "POST",
            data: { otp: otp },
            cache: false,
            success: function (response) {
                if (response == 1) {
                   $('.showbeforevalidate').hide();
                    $('.showaftervalidate').show();
                    $('.showafterverify').hide();
                    getrecord(MobileRep1);
                    // next step
                } else {
                    alert("Invalid OTP. Please try again.");
                }
            },
            error: function () {
                alert("Server error while verifying OTP.");
            }
        });
    });

});


// Function to get member record by MobileRep1
function getrecord(MobileRep1) {
    if (!MobileRep1) {
        alert("Mobile number is required!");
        return;
    }

    console.log("Fetching member for MobileRep1:", MobileRep1);

    $.ajax({
        url: "get_member.php",
        type: "POST",
        data: { MobileRep1: MobileRep1 },
        dataType: "json",
        success: function (data) {
            console.log("AJAX Response:", data);

            if (data.success && data.member) {
                let m = data.member;
                loadUnitsByDistrict(m.DistrictName, targetSelector = "#ekai_id")
                // Fill form fields
                $("#member_id").val(m.MembersId || '');
                $("#FirmName").val(m.FirmName || '');
                $("#Shop").val(m.Shop || '');
                $("#Complex").val(m.Complex || '');
                $("#Street").val(m.Street || '');
                $("#DistrictName").val(m.DistrictName || '');
                $("#CityName").val(m.CityName || '');
                $("#AreaName").val(m.AreaName || '');
                $("#PIN").val(m.PIN || '');
                $("#STDCode").val(m.STDCode || '');
                $("#GSTN").val(m.GSTN || '');
                $("#GroupName").val(m.GroupName || '');
                $("#Representative1").val(m.Representative1 || '');
                $("#EmailRep1").val(m.EmailRep1 || '');
                $("#Representative2").val(m.Representative2 || '');
                $("#mobileRep2").val(m.MobileRep2 || '');
                $("#emailRep2").val(m.EmailRep2 || '');
                $("#website").val(m.website || '');
                $("#geoLocation").val(m.geoLocation || '');
                $("#reference").val(m.reference || '');
                $("#referenceMobile").val(m.referenceMobile || '');
                
                setUnitValue(m.ekai_id);
                showImagePreviews(m);
                setHiddenImageValues(m);

                // Optional: show images
                if (m.ImageRep1) $("#previewImageRep1").attr("src", m.ImageRep1).show();
                if (m.ImageRep2) $("#previewImageRep2").attr("src", m.ImageRep2).show();
                if (m.paymentfiles) $("#previewPayment").attr("src", m.paymentfiles).show();
                if (m.gstfiles) $("#previewGST").attr("src", m.gstfiles).show();
                if (m.shopPhoto) $("#previewShopPhoto").attr("src", m.shopPhoto).show();

            } else {
                alert(data.message || "No member record found.");
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", status, error);
            console.error("Response:", xhr.responseText);
            alert("Error while fetching member record.");
        }
    });
}

// Function to fetch units based on district and populate a select element
function loadUnitsByDistrict(district, targetSelector = "#ekai_id") {
    if (!district) {
        $(targetSelector).html('<option value="">Select Unit</option>');
        return;
    }

    $.ajax({
        url: "getunits.php",
        type: "POST",
        data: { district: district },
        success: function (response) {
            $(targetSelector).html(response);
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", status, error);
            console.error("Response Text:", xhr.responseText);
            alert("Error fetching units!");
        }
    });
}


// Optional: show image previews if data exists
function showImagePreviews(m) {
    let anyImage = false;

    if (m.ImageRep1) {
        $("#previewImageRep1").attr("src", m.ImageRep1).show();
        anyImage = true;
    }
    if (m.ImageRep2) {
        $("#previewImageRep2").attr("src", m.ImageRep2).show();
        anyImage = true;
    }
    if (m.paymentfiles) {
        $("#previewPayment").attr("src", m.paymentfiles).show();
        anyImage = true;
    }
    if (m.gstfiles) {
        $("#previewGST").attr("src", m.gstfiles).show();
        anyImage = true;
    }
    if (m.shopPhoto) {
        $("#previewShopPhoto").attr("src", m.shopPhoto).show();
        anyImage = true;
    }

    // Show the preview container if any image exists
    if (anyImage) {
        $("#imagePreviews").removeClass("d-none");
        $("#otherPreviews").removeClass("d-none");
    }
}

// Call this function after fetching member record
// showImagePreviews(m);

// Set hidden input values after fetching member data
function setHiddenImageValues(m) {
    if (m.ImageRep1) $("#hiddenpreviewImageRep1").val(m.ImageRep1);
    if (m.ImageRep2) $("#hiddenpreviewImageRep2").val(m.ImageRep2);
    if (m.gstfiles) $("#hiddenpreviewGST").val(m.gstfiles);
    if (m.paymentfiles) $("#hiddenpreviewPayment").val(m.paymentfiles);
    if (m.shopPhoto) $("#hiddenpreviewShopPhoto").val(m.shopPhoto);
}

// Call this function in getrecord() after fetching data

// Wait until #ekai_id is populated, then set its value
function setUnitValue(unitId) {
    let attempts = 0;
    const interval = setInterval(function() {
        attempts++;

        // Check if the select has options
        if ($('#ekai_id option').length > 1) { // assuming first option is "Select Unit"
            $('#ekai_id').val(unitId || '');
            clearInterval(interval); // stop checking
        }

        // Safety: stop after 10 attempts (10 seconds)
        if (attempts >= 10) {
            clearInterval(interval);
            console.warn("Could not set #ekai_id value: options not loaded.");
        }
    }, 1000); // check every 1 second
}

// Example usage after fetching member record:



</script>


</body>
</html>
