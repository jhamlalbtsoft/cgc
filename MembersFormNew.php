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
            
            <h2>Coming Soon...</h2>
          <form method="post" action="membersave.php" enctype="multipart/form-data" style="display:none;">
            
            <div class="row m-3 align-items-center">
              <label for="FirmName" class="col-sm-2 col-form-label text-left text-left">FULL NAME OF FIRM</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="FirmName" name="FirmName" required>
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="Shop" class="col-sm-2 col-form-label text-left">SHOP NO.</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="Shop" name="Shop" required>
              </div>
            </div>
            <div class="row m-3 align-items-center">
            	<label for="Complex" class="col-sm-2 col-form-label text-left">COMPLEX NAME</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="Complex" name="Complex" required>
              </div>
            </div>
            <div class="row m-3 align-items-center">
            	<label for="Street" class="col-sm-2 col-form-label text-left">Street</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="Street" name="Street" required>
              </div>
            </div>
            <div class="row m-3 align-items-center">
              <label for="DistrictId" class="col-sm-2 col-form-label text-left">District</label>
              <div class="col-sm-6">
                 <select class="form-select" id="DistrictId" name="DistrictId" required>
										  <option value="">Select District</option>
										  <?php
										    $sql = "SELECT DistrictId as id, DistrictName as name FROM district ORDER BY DistrictName";
										    $stmt = $db->pdo->prepare($sql);
										    $stmt->execute();
										    $entry = $stmt->fetchAll();
										    foreach ($entry as $group) {
										      echo '<option value="' . $group['id'] . '" >' . htmlspecialchars($group['name']) . '</option>';
										    }
										  ?>
								</select>
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="CityId" class="col-sm-2 col-form-label text-left">CITY / VILLAGE</label>
              <div class="col-sm-6">
                <select class="form-select" id="CityId" name="CityId" required>
										  <option value="">Select City</option>
										  <?php
										    $sql = "SELECT CityId as id, CityName as name FROM city ORDER BY CityName";
										    $stmt = $db->pdo->prepare($sql);
										    $stmt->execute();
										    $entry = $stmt->fetchAll();
										    foreach ($entry as $group) {
										      echo '<option value="' . $group['id'] . '" >' . htmlspecialchars($group['name']) . '</option>';
										    }
										  ?>
								</select>

              </div>
            </div>
            <div class="row m-3 align-items-center">
              <label for="AreaId" class="col-sm-2 col-form-label text-left">AREA / MOHALLA</label>
              <div class="col-sm-6">
                 <select class="form-select" id="AreaId" name="AreaId" required>
										  <option value="">Select Area</option>
										  <?php
										    $sql = "SELECT AreaId as id, AreaName as name FROM area ORDER BY AreaName";
										    $stmt = $db->pdo->prepare($sql);
										    $stmt->execute();
										    $entry = $stmt->fetchAll();
										    foreach ($entry as $group) {
										      echo '<option value="' . $group['id'] . '" >' . htmlspecialchars($group['name']) . '</option>';
										    }
										  ?>
								</select>
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="PIN" class="col-sm-2 col-form-label text-left">PIN CODE NO.</label>
              <div class="col-sm-6">
                <input type="number" class="form-control" id="PIN" name="PIN" required pattern="\d{6}" maxlength="6">
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="STDCode" class="col-sm-2 col-form-label text-left">STD CODE</label>
              <div class="col-sm-4">
                <input type="number" class="form-control" id="STDCode" name="STDCode" required maxlength="5">
              </div>
              <label for="Landline" class="col-sm-2 col-form-label text-left">PHONE NO.</label>
              <div class="col-sm-4">
                <input type="tel" class="form-control" id="Landline" name="Landline" required maxlength="10">
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="GSTN" class="col-sm-2 col-form-label text-left">GST NO. / GUMASTA</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="GSTN" name="GSTN" required>
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="GroupsID" class="col-sm-2 col-form-label text-left">TYPE OF BUSINESS</label>
              <div class="col-sm-6">
                <!-- <input type="text" class="form-control" id="business_type" name="business_type" required> -->
                <select class="form-select" id="GroupsID" name="GroupsID" required>
										  <option value="">Select Group</option>
										  <?php
										    $sql = "SELECT GroupsId as id, GroupName as name FROM groups ORDER BY GroupName";
										    
										  
										    $stmt = $db->pdo->prepare($sql);
										    $stmt->execute();
										    $entry = $stmt->fetchAll();
										    foreach ($entry as $group) {
										      echo '<option value="' . $group['id'] . '" >' . ($group['name']) . '</option>';
										    }
										  ?>
								</select>
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="Representative1" class="col-sm-2 col-form-label text-left">NAME OF REPRESENTATIVE (1)</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="Representative1" name="Representative1">
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="MobileRep1" class="col-sm-2 col-form-label text-left">MOBILE NO</label>
              <div class="col-sm-4">
                <input type="tel" class="form-control" id="MobileRep1" name="MobileRep1" required maxlength="10">
              </div>
              <label for="EmailRep1" class="col-sm-2 col-form-label text-left">E – MAIL</label>
              <div class="col-sm-4">
                <input type="email" class="form-control" id="EmailRep1" name="EmailRep1">
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="Representative2" class="col-sm-2 col-form-label text-left">NAME OF REPRESENTATIVE (2)</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="Representative2" name="Representative2">
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="MobileRep2" class="col-sm-2 col-form-label text-left">MOBILE NO.</label>
              <div class="col-sm-4">
                <input type="tel" class="form-control" id="MobileRep2" name="MobileRep2" maxlength="10">
              </div>
              <label for="EmailRep2" class="col-sm-2 col-form-label text-left">E – MAIL</label>
              <div class="col-sm-4">
                <input type="email" class="form-control" id="EmailRep2" name="EmailRep2">
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="photofiles" class="col-sm-2 col-form-label text-left">Photo 1</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" id="photofiles" name="photofiles">
              </div>
              <label for="photofiles2" class="col-sm-2 col-form-label text-left">Photo 2</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" id="photofiles2" name="photofiles2">
              </div>
            </div>

            <div class="row m-3 align-items-center">
              <label for="gstfiles" class="col-sm-2 col-form-label text-left">GST Certificate</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" id="gstfiles" name="gstfiles">
              </div>
              <label for="paymentfiles" class="col-sm-2 col-form-label text-left">Payment Attachment</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" id="paymentfiles" name="paymentfiles">
              </div>
            </div>


            <div class="row m-3">
              <div class="col text-center">
                <button type="submit" class="btn btn-primary px-5">Submit</button>
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

</body>
</html>
