<?php
// Enable error reporting (for debugging, remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$host = 'localhost';     // usually localhost
$port = 3306;            // default MySQL port
$dbname = 'cgc';         // your database name
$user = 'root';          // your DB username
$password = '';          // your DB password
$charset = 'utf8mb4';

// Connect with PDO
try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get POST values (safe with null coalescing)
$MemberType       = 'LT';
$FirmName         = $_POST['FirmName'] ?? '';
$Shop             = $_POST['Shop'] ?? '';
$Complex          = $_POST['Complex'] ?? '';
$Street           = $_POST['Street'] ?? '';
$DistrictName     = $_POST['DistrictName'] ?? '';
$CityName         = $_POST['CityName'] ?? '';
$AreaName         = $_POST['AreaName'] ?? '';
$PIN              = $_POST['PIN'] ?? '';
$STDCode          = $_POST['STDCode'] ?? '';
$GSTN             = $_POST['GSTN'] ?? '';
$GroupName        = $_POST['GroupName'] ?? '';
$Representative1  = $_POST['Representative1'] ?? '';
$EmailRep1        = $_POST['EmailRep1'] ?? '';
$Representative2  = $_POST['Representative2'] ?? '';
$mobileRep2       = $_POST['mobileRep2'] ?? '';
$emailRep2        = $_POST['emailRep2'] ?? '';
$website          = $_POST['website'] ?? '';
$geoLocation      = $_POST['geoLocation'] ?? '';
$reference        = $_POST['reference'] ?? '';
$referenceMobile  = $_POST['referenceMobile'] ?? '';

// Upload folder
$upload_dir = __DIR__ . '/uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

// File upload handler
function upload_file($field_name, $prefix = '') {
    global $upload_dir;
    if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] === 0) {
        $ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);
        $filename = uniqid($prefix, true) . '.' . $ext;
        $dest_path = $upload_dir . $filename;
        if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $dest_path)) {
            return 'uploads/' . $filename; // relative path saved in DB
        }
    }
    return '';
}

// Upload files
$ImageRep1    = upload_file('ImageRep1', 'rep1_');
$ImageRep2    = upload_file('ImageRep2', 'rep2_');
$gstfiles     = upload_file('gstfiles', 'gst_');
$paymentfiles = upload_file('paymentfiles', 'payment_');
$shopPhoto    = upload_file('shopPhoto', 'shop_');

// Prepare SQL
$sql = "INSERT INTO members (
    MemberType,FirmName, Shop, Complex, Street, DistrictName, CityName, AreaName, PIN, STDCode, GSTN,
    GroupName, Representative1, ImageRep1, EmailRep1, Representative2, ImageRep2, mobileRep2, emailRep2,
    gstfiles, paymentfiles, website, shopPhoto, geoLocation, reference, referenceMobile
) VALUES (
    :MemberType,:FirmName, :Shop, :Complex, :Street, :DistrictName, :CityName, :AreaName, :PIN, :STDCode, :GSTN,
    :GroupName, :Representative1, :ImageRep1, :EmailRep1, :Representative2, :ImageRep2, :mobileRep2, :emailRep2,
    :gstfiles, :paymentfiles, :website, :shopPhoto, :geoLocation, :reference, :referenceMobile
)";

$stmt = $pdo->prepare($sql);

// Execute
$success = $stmt->execute([
    ':MemberType'      => $MemberType,
    ':FirmName'        => $FirmName,
    ':Shop'            => $Shop,
    ':Complex'         => $Complex,
    ':Street'          => $Street,
    ':DistrictName'    => $DistrictName,
    ':CityName'        => $CityName,
    ':AreaName'        => $AreaName,
    ':PIN'             => $PIN,
    ':STDCode'         => $STDCode,
    ':GSTN'            => $GSTN,
    ':GroupName'       => $GroupName,
    ':Representative1' => $Representative1,
    ':ImageRep1'       => $ImageRep1,
    ':EmailRep1'       => $EmailRep1,
    ':Representative2' => $Representative2,
    ':ImageRep2'       => $ImageRep2,
    ':mobileRep2'      => $mobileRep2,
    ':emailRep2'       => $emailRep2,
    ':gstfiles'        => $gstfiles,
    ':paymentfiles'    => $paymentfiles,
    ':website'         => $website,
    ':shopPhoto'       => $shopPhoto,
    ':geoLocation'     => $geoLocation,
    ':reference'       => $reference,
    ':referenceMobile' => $referenceMobile
]);

// Redirect with message
if ($success) {
    echo "<script>alert('Form data saved successfully.'); window.location.href = 'MembersFormNew';</script>";
} else {
    echo "<script>alert('Failed to save form data.'); window.history.back();</script>";
}
