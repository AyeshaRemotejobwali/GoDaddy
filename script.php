<?php
header('Content-Type: application/json');
require_once 'db.php';

// Handle incoming requests
$action = isset($_POST['action']) ? $_POST['action'] : '';

try {
    switch ($action) {
        case 'check_domain':
            $domain = isset($_POST['domain']) ? trim($_POST['domain']) : '';
            if (!$domain) {
                echo json_encode(['status' => 'error', 'message' => 'Domain is required']);
                exit;
            }
            $domainParts = explode('.', $domain);
            $domainName = $domainParts[0] ?? '';
            $extension = isset($domainParts[1]) ? '.' . $domainParts[1] : '';
            if (!$domainName || !$extension) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid domain format']);
                exit;
            }
            $stmt = $conn->prepare("SELECT * FROM domains WHERE domain_name = ? AND extension = ?");
            $stmt->execute([$domainName, $extension]);
            $isAvailable = $stmt->fetch() === false;
            echo json_encode([
                'status' => 'success',
                'available' => $isAvailable,
                'domain' => $domain
            ]);
            break;

        case 'add_to_cart':
            // Cart is managed client-side via localStorage, so this is a placeholder
            $domain = isset($_POST['domain']) ? trim($_POST['domain']) : '';
            if (!$domain) {
                echo json_encode(['status' => 'error', 'message' => 'Domain is required']);
                exit;
            }
            echo json_encode(['status' => 'success', 'message' => "$domain added to cart"]);
            break;

        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
}
?>
