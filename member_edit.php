<?php
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
      die("Database error: " . $ex->getMessage());
    }
  }
}

$db = new DBConnection();

// Get member ID
$id = $_GET['id'] ?? 0;
if (!$id) {
  die("Invalid Member ID");
}

// Fetch member data
$stmt = $db->pdo->prepare("SELECT * FROM members WHERE id = :id");
$stmt->execute([':id' => $id]);
$member = $stmt->fetch();

if (!$member) {
  die("Member not found");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Member</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
  <h3 class="mb-4">Edit Member</h3>

  <form action="memberupdate.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($member['id']) ?>">

    <div class="mb-3">
      <label class="form-label">Firm Name</label>
      <input type="text" name="FirmName" class="form-control" value="<?= htmlspecialchars($member['FirmName']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Shop</label>
      <input type="text" name="Shop" class="form-control" value="<?= htmlspecialchars($member['Shop']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">District</label>
      <input type="text" name="DistrictName" class="form-control" value="<?= htmlspecialchars($member['DistrictName']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">City</label>
      <input type="text" name="CityName" class="form-control" value="<?= htmlspecialchars($member['CityName']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Representative 1</label>
      <input type="text" name="Representative1" class="form-control" value="<?= htmlspecialchars($member['Representative1']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Email Rep 1</label>
      <input type="email" name="EmailRep1" class="form-control" value="<?= htmlspecialchars($member['EmailRep1']) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Representative 1 Photo</label>
      <?php if ($member['ImageRep1']): ?>
        <div><img src="<?= htmlspecialchars($member['ImageRep1']) ?>" width="100"></div>
      <?php endif; ?>
      <input type="file" name="ImageRep1" class="form-control">
    </div>

    <!-- Add more fields as needed (GSTN, website, etc.) -->

    <button type="submit" class="btn btn-success">Update</button>
    <a href="MembersFormNew" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
