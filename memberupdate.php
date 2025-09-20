<?php
// Enable error reporting (for debugging, remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conn.php';

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
$MobileRep1       = $_POST['MobileRep1'] ?? '';
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
$ekai_id          = $_POST['ekai_id'] ?? '';

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

// Assume hidden inputs are sent with form: previewImageRep1, previewImageRep2, etc.
$prev_ImageRep1    = $_POST['previewImageRep1'] ?? '';
$prev_ImageRep2    = $_POST['previewImageRep2'] ?? '';
$prev_gstfiles     = $_POST['previewGST'] ?? '';
$prev_paymentfiles = $_POST['previewPayment'] ?? '';
$prev_shopPhoto    = $_POST['previewShopPhoto'] ?? '';

// Upload files if new ones are provided, else use previous
$ImageRep1    = upload_file('ImageRep1', 'rep1_') ?: $prev_ImageRep1;
$ImageRep2    = upload_file('ImageRep2', 'rep2_') ?: $prev_ImageRep2;
$gstfiles     = upload_file('gstfiles', 'gst_') ?: $prev_gstfiles;
$paymentfiles = upload_file('paymentfiles', 'payment_') ?: $prev_paymentfiles;
$shopPhoto    = upload_file('shopPhoto', 'shop_') ?: $prev_shopPhoto;


// ✅ Check if MobileRep1 already exists
$checkStmt = $pdo->prepare("SELECT MembersId FROM members_edit WHERE MobileRep1 = ?");
$checkStmt->execute([$MobileRep1]);
$existingMember = $checkStmt->fetch(PDO::FETCH_ASSOC);

// print_r($existingMember);die();

if ($existingMember) {
    // ✅ UPDATE EXISTING MEMBER
    $sql = "UPDATE members_edit SET 
        MemberType=:MemberType, FirmName=:FirmName, Shop=:Shop, Complex=:Complex, Street=:Street,
        DistrictName=:DistrictName, CityName=:CityName, AreaName=:AreaName, PIN=:PIN, STDCode=:STDCode,
        GSTN=:GSTN, GroupName=:GroupName, Representative1=:Representative1, ImageRep1=:ImageRep1,
        EmailRep1=:EmailRep1, Representative2=:Representative2, ImageRep2=:ImageRep2, mobileRep2=:mobileRep2,
        emailRep2=:emailRep2, gstfiles=:gstfiles, paymentfiles=:paymentfiles, website=:website,
        shopPhoto=:shopPhoto, geoLocation=:geoLocation, reference=:reference, referenceMobile=:referenceMobile,
        ekai_id=:ekai_id
        WHERE MobileRep1 = :MobileRep1";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([
        ':MemberType' => $MemberType,
        ':FirmName' => $FirmName,
        ':Shop' => $Shop,
        ':Complex' => $Complex,
        ':Street' => $Street,
        ':DistrictName' => $DistrictName,
        ':CityName' => $CityName,
        ':AreaName' => $AreaName,
        ':PIN' => $PIN,
        ':STDCode' => $STDCode,
        ':GSTN' => $GSTN,
        ':GroupName' => $GroupName,
        ':Representative1' => $Representative1,
        ':ImageRep1' => $ImageRep1,
        ':EmailRep1' => $EmailRep1,
        ':Representative2' => $Representative2,
        ':ImageRep2' => $ImageRep2,
        ':mobileRep2' => $mobileRep2,
        ':emailRep2' => $emailRep2,
        ':gstfiles' => $gstfiles,
        ':paymentfiles' => $paymentfiles,
        ':website' => $website,
        ':shopPhoto' => $shopPhoto,
        ':geoLocation' => $geoLocation,
        ':reference' => $reference,
        ':referenceMobile' => $referenceMobile,
        ':ekai_id' => $ekai_id,
        ':MobileRep1' => $MobileRep1,
    ]);

    // echo $success ? "updated" : "error";
} 

// Redirect with message
if ($success) {
    echo "<script>alert('Form data saved successfully.'); window.location.href = 'MembersFormEdit.php';</script>";
} else {
    echo "<script>alert('Failed to save form data.'); window.history.back();</script>";
}
