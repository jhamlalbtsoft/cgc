<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/admin/lib/config.php";

class DBConnection {
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
                DB_USER,
                DB_PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (Exception $ex) {
            die('Database error: ' . $ex->getMessage());
        }
    }
}

$db = new DBConnection();
$pdo = $db->pdo;

// Get POST values
$MemberType = 'LT';
$FirmName = $_POST['FirmName'] ?? '';
$Shop = $_POST['Shop'] ?? '';
$Complex = $_POST['Complex'] ?? '';
$AreaId = $_POST['AreaId'] ?? '';
$CityId = $_POST['CityId'] ?? '';
$DistrictId = $_POST['DistrictId'] ?? '';
$Street = $_POST['Street'] ?? '';
$PIN = $_POST['PIN'] ?? '';
$STDCode = $_POST['STDCode'] ?? '';
$Landline = $_POST['Landline'] ?? '';
$GSTN = $_POST['GSTN'] ?? '';
$GroupsID = $_POST['GroupsID'] ?? '';
$Representative1 = $_POST['Representative1'] ?? '';
$MobileRep1 = $_POST['MobileRep1'] ?? '';
$EmailRep1 = $_POST['EmailRep1'] ?? '';
$Representative2 = $_POST['Representative2'] ?? '';
$MobileRep2 = $_POST['MobileRep2'] ?? '';
$EmailRep2 = $_POST['EmailRep2'] ?? '';

// Upload folder
$upload_dir = __DIR__ . '/uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

// Upload handler function
function upload_file($field_name, $prefix = '') {
    global $upload_dir;
    if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] === 0) {
        $ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);
        $filename = uniqid($prefix, true) . '.' . $ext;
        $dest_path = $upload_dir . $filename;
        if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $dest_path)) {
            return 'uploads/' . $filename;
        }
    }
    return '';
}

// Upload files
$photoPath = upload_file('photofiles', 'photo1_');
$photoPath2 = upload_file('photofiles2', 'photo2_');
$gstPath = upload_file('gstfiles', 'gst_');
$paymentPath = upload_file('paymentfiles', 'payment_');

// Prepare SQL
$sql = "INSERT INTO members (
    FirmName, Shop, Complex, AreaId, CityId, PIN, STDCode, Landline, GSTN, GroupsID,
    Representative1, MobileRep1, EmailRep1,
    Representative2, MobileRep2, EmailRep2, DistrictId, Street, MemberType,
    ImageRep1, ImageRep2, GSTFilePath, PaymentFilePath
) VALUES (
    :FirmName, :Shop, :Complex, :AreaId, :CityId, :PIN, :STDCode, :Landline, :GSTN, :GroupsID,
    :Representative1, :MobileRep1, :EmailRep1,
    :Representative2, :MobileRep2, :EmailRep2, :DistrictId, :Street, :MemberType,
    :PhotoPath, :PhotoPath2, :GSTFilePath, :PaymentFilePath
)";

$stmt = $pdo->prepare($sql);
$success = $stmt->execute([
    ':FirmName' => $FirmName,
    ':Shop' => $Shop,
    ':Complex' => $Complex,
    ':AreaId' => $AreaId,
    ':CityId' => $CityId,
    ':PIN' => $PIN,
    ':STDCode' => $STDCode,
    ':Landline' => $Landline,
    ':GSTN' => $GSTN,
    ':GroupsID' => $GroupsID,
    ':Representative1' => $Representative1,
    ':MobileRep1' => $MobileRep1,
    ':EmailRep1' => $EmailRep1,
    ':Representative2' => $Representative2,
    ':MobileRep2' => $MobileRep2,
    ':EmailRep2' => $EmailRep2,
    ':DistrictId' => $DistrictId,
    ':Street' => $Street,
    ':MemberType' => $MemberType,
    ':PhotoPath' => $photoPath,
    ':PhotoPath2' => $photoPath2,
    ':GSTFilePath' => $gstPath,
    ':PaymentFilePath' => $paymentPath
]);

if ($success) {
    echo "<script>alert('Form data saved successfully.'); window.location.href = 'MembersFormNew';</script>";
} else {
    echo "<script>alert('Failed to save form data.'); window.history.back();</script>";
}
?>
