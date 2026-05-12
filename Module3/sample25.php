<?php
session_start();

// Initialize inventory if not set
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = [
        ['id' => 1, 'name' => 'Laptop', 'price' => 899.99, 'quantity' => 15],
        ['id' => 2, 'name' => 'Smartphone', 'price' => 599.99, 'quantity' => 25],
        ['id' => 3, 'name' => 'Headphones', 'price' => 79.99, 'quantity' => 40]
    ];
}

// User-defined functions
function calculateTotalValue($inventory) {
    $total = 0;
    foreach ($inventory as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

function findItemById($inventory, $id) {
    foreach ($inventory as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null;
}

function sortInventory(&$inventory, $sort_by, $order = 'asc') {
    usort($inventory, function($a, $b) use ($sort_by, $order) {
        $result = 0;
        if (isset($a[$sort_by]) && isset($b[$sort_by])) {
            if (is_numeric($a[$sort_by]) && is_numeric($b[$sort_by])) {
                $result = $a[$sort_by] - $b[$sort_by];
            } else {
                $result = strcmp($a[$sort_by], $b[$sort_by]);
            }
        }
        
        return ($order == 'desc') ? -$result : $result;
    });
}

// Handle form submissions
if (isset($_POST['add_item'])) {
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    
    if (!empty($name) && $price > 0 && $quantity >= 0) {
        $newId = end($_SESSION['inventory'])['id'] + 1;
        $_SESSION['inventory'][] = [
            'id' => $newId,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
}

if (isset($_POST['update_item'])) {
    $id = intval($_POST['item_id']);
    $quantity = intval($_POST['quantity']);
    
    foreach ($_SESSION['inventory'] as &$item) {
        if ($item['id'] == $id) {
            $item['quantity'] = $quantity;
            break;
        }
    }
}

if (isset($_POST['sort_inventory'])) {
    $sort_by = $_POST['sort_by'];
    $order = $_POST['order'];
    sortInventory($_SESSION['inventory'], $sort_by, $order);
}

// Display the inventory management system
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:hover { background-color: #f5f5f5; }
        .form-section { margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
        .button { padding: 5px 10px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .button:hover { background: #45a049; }
    </style>
</head>
<body>
    <h1>Inventory Management System</h1>
    
    <div class="form-section">
        <h2>Add New Item</h2>
        <form method="post">
            <label>Item Name: <input type="text" name="name" required></label>
            <label>Price: <input type="number" name="price" step="0.01" min="0.01" required></label>
            <label>Quantity: <input type="number" name="quantity" min="0" required></label>
            <button type="submit" name="add_item" class="button">Add Item</button>
        </form>
    </div>
    
    <div class="form-section">
        <h2>Sort Inventory</h2>
        <form method="post">
            <label>Sort by: 
                <select name="sort_by">
                    <option value="name">Name</option>
                    <option value="price">Price</option>
                    <option value="quantity">Quantity</option>
                </select>
            </label>
            <label>Order: 
                <select name="order">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </label>
            <button type="submit" name="sort_inventory" class="button">Sort</button>
        </form>
    </div>
    
    <h2>Current Inventory</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Value</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($_SESSION['inventory'] as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td>$<?= number_format($item['price'], 2) ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="0" style="width: 60px;">
                    <input type="submit" name="update_item" value="Update" class="button">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <h3>Inventory Summary</h3>
    <p>Total Items: <?= count($_SESSION['inventory']) ?></p>
    <p>Total Inventory Value: $<?= number_format(calculateTotalValue($_SESSION['inventory']), 2) ?></p>
    
    <h3>Array Visualization (for debugging)</h3>
    <div style="background: #f0f0f0; padding: 10px; border: 1px solid #ddd;">
        <h4>Using print_r():</h4>
        <pre><?php print_r($_SESSION['inventory']); ?></pre>
        
        <h4>Using var_dump():</h4>
        <pre><?php ob_start(); var_dump($_SESSION['inventory']); echo htmlspecialchars(ob_get_clean()); ?></pre>
    </div>
</body>
</html>