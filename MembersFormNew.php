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
          <form action="membersave.php" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6 form-group-column">
                <label for="MobileRep1" class="form-label">MOBILE NO</label>
                <input type="tel" class="form-control" id="MobileRep1" name="MobileRep1" required>
            </div>
            
        </div>

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
        <select class="form-select" id="DistrictName" name="DistrictName" required>
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
                <input type="url" class="form-control" id="website" name="website">
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

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-5 py-2">Submit</button>
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
    $("#DistrictName").change(function () {
    var district = $(this).val();

    if (district !== "") {
        $.ajax({
            url: "getunits.php",
            type: "POST",
            data: { district: district },
            success: function (response) {
                $("#ekai_id").html(response);
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error:", status, error);
                console.log("Response Text:", xhr.responseText);
                alert("Error fetching units!");
            }
        });
    } else {
        $("#ekai_id").html('<option value="">Select Unit</option>');
    }
});

});
</script>


</body>
</html>
