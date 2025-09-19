<?php
require __DIR__ . "/admin/lib/config.php";

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    die("DB connection failed: " . $e->getMessage());
}

if (!empty($_POST['district'])) {
    $district = trim($_POST['district']);

    $stmt = $pdo->prepare("
        SELECT tu.id, tu.name
        FROM tbl_unit tu
        LEFT JOIN district d ON d.DistrictId = tu.distict_id
        WHERE d.DistrictName = :district
        ORDER BY tu.name
    ");
    $stmt->execute([':district' => $district]);
    $units = $stmt->fetchAll();

    echo '<option value="">Select Unit</option>';
    foreach ($units as $row) {
        echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
    }
} else {
    echo '<option value="">No district selected</option>';
}
