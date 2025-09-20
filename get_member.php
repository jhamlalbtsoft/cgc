<?php
include 'conn.php';

$MobileRep1 = $_POST['MobileRep1'] ?? '';

if (!$MobileRep1) {
    echo json_encode(["success" => false, "message" => "Mobile number required"]);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM members WHERE MobileRep1 = ?");
    $stmt->execute([$MobileRep1]);
    $member = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($member) {
        echo json_encode(["success" => true, "member" => $member]);
    } else {
        echo json_encode(["success" => false, "message" => "No record found"]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
