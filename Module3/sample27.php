<?php
session_start();

// Initialize products array if not set
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Laptop', 'price' => 899.99, 'category' => 'Electronics', 'stock' => 15],
        ['id' => 2, 'name' => 'Smartphone', 'price' => 599.99, 'category' => 'Electronics', 'stock' => 25],
        ['id' => 3, 'name' => 'Coffee Mug', 'price' => 12.99, 'category' => 'Home & Kitchen', 'stock' => 40]
    ];
}

// User-defined function to get available categories
function getAvailableCategories() {
    return [
        'Electronics',
        'Clothing',
        'Home & Kitchen',
        'Books',
        'Sports',
        'Toys',
        'Health & Beauty',
        'Automotive',
        'Office Supplies'
    ];
}

// User-defined functions for CRUD operations
function createProduct($name, $price, $category, $stock) {
    // Generate new ID (next sequential number)
    global $products; // Demonstrating global variable usage
    
    $newId = 1;
    if (!empty($_SESSION['products'])) {
        $lastProduct = end($_SESSION['products']);
        $newId = $lastProduct['id'] + 1;
    }
    
    $_SESSION['products'][] = [
        'id' => $newId,
        'name' => $name,
        'price' => $price,
        'category' => $category,
        'stock' => $stock
    ];
    
    return $newId;
}

function readProducts() {
    return $_SESSION['products'];
}

function getProductById($id) {
    foreach ($_SESSION['products'] as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

function updateProduct($id, $name, $price, $category, $stock) {
    foreach ($_SESSION['products'] as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $name;
            $product['price'] = $price;
            $product['category'] = $category;
            $product['stock'] = $stock;
            return true;
        }
    }
    return false;
}

function deleteProduct($id) {
    foreach ($_SESSION['products'] as $key => $product) {
        if ($product['id'] == $id) {
            unset($_SESSION['products'][$key]);
            // Re-index the array to maintain sequential numeric keys
            $_SESSION['products'] = array_values($_SESSION['products']);
            return true;
        }
    }
    return false;
}

// Function to sort products (demonstrating array sorting)
function sortProducts($sort_by, $order = 'asc') {
    usort($_SESSION['products'], function($a, $b) use ($sort_by, $order) {
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

// Function to calculate statistics (demonstrating static variables)
function calculateProductStats() {
    static $totalAccesses = 0;
    $totalAccesses++;
    
    $products = $_SESSION['products'];
    $totalValue = 0;
    $totalStock = 0;
    
    foreach ($products as $product) {
        $totalValue += $product['price'] * $product['stock'];
        $totalStock += $product['stock'];
    }
    
    return [
        'total_products' => count($products),
        'total_stock' => $totalStock,
        'total_value' => $totalValue,
        'average_price' => count($products) > 0 ? array_sum(array_column($products, 'price')) / count($products) : 0,
        'access_count' => $totalAccesses
    ];
}

// Handle form submissions
$message = '';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        $name = trim($_POST['name']);
        $price = floatval($_POST['price']);
        $category = trim($_POST['category']);
        $stock = intval($_POST['stock']);
        
        if (!empty($name) && $price > 0 && !empty($category) && $stock >= 0) {
            $newId = createProduct($name, $price, $category, $stock);
            $message = "Product '$name' (ID: $newId) has been created successfully.";
            $action = 'list';
        } else {
            $message = "Error: Please fill in all fields with valid values.";
        }
    }
    elseif (isset($_POST['update'])) {
        $id = intval($_POST['id']);
        $name = trim($_POST['name']);
        $price = floatval($_POST['price']);
        $category = trim($_POST['category']);
        $stock = intval($_POST['stock']);
        
        if (!empty($name) && $price > 0 && !empty($category) && $stock >= 0) {
            if (updateProduct($id, $name, $price, $category, $stock)) {
                $message = "Product '$name' (ID: $id) has been updated successfully.";
                $action = 'list';
            } else {
                $message = "Error: Product with ID $id not found.";
            }
        } else {
            $message = "Error: Please fill in all fields with valid values.";
        }
    }
    elseif (isset($_POST['sort'])) {
        $sort_by = $_POST['sort_by'];
        $order = $_POST['order'];
        sortProducts($sort_by, $order);
        $message = "Products sorted by $sort_by ($order order).";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $product = getProductById($id);
    
    if ($product && deleteProduct($id)) {
        $message = "Product '{$product['name']}' (ID: $id) has been deleted successfully.";
    } else {
        $message = "Error: Product with ID $id not found.";
    }
    $action = 'list';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Management System (Array-Based CRUD)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .container { max-width: 1000px; margin: 0 auto; }
        h1 { color: #333; text-align: center; }
        .message { padding: 10px; margin: 15px 0; border-radius: 4px; }
        .success { background-color: #d4edda; color: #155724; }
        .error { background-color: #f8d7da; color: #721c24; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], 
        input[type="number"],
        select {
            width: 100%; 
            padding: 8px; 
            border: 1px solid #ddd; 
            border-radius: 4px;
            box-sizing: border-box;
        }
        .button {
            background-color: #4CAF50; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
        }
        .button:hover { background-color: #45a049; }
        .button-secondary {
            background-color: #f0ad4e;
            margin-right: 5px;
        }
        .button-secondary:hover { background-color: #ec971f; }
        .button-danger {
            background-color: #d9534f;
        }
        .button-danger:hover { background-color: #c9302c; }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin: 20px 0;
        }
        th, td { 
            padding: 12px; 
            text-align: left; 
            border-bottom: 1px solid #ddd; 
        }
        th { 
            background-color: #f2f2f2; 
            font-weight: bold;
        }
        tr:hover { background-color: #f5f5f5; }
        .actions { 
            display: flex; 
            gap: 5px;
        }
        .stats {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .array-debug {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 15px;
            margin-top: 20px;
            overflow: auto;
        }
        .debug-toggle {
            margin-bottom: 10px;
        }
        .hidden { display: none; }
        .nav { 
            display: flex; 
            justify-content: center; 
            margin-bottom: 20px;
            gap: 10px;
        }
        .nav a {
            padding: 8px 15px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .nav a:hover { background-color: #5a6268; }
        .nav a.active { background-color: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Management System (Array-Based CRUD)</h1>
        
        <div class="nav">
            <a href="?action=list" class="<?= $action == 'list' ? 'active' : '' ?>">Product List</a>
            <a href="?action=create" class="<?= $action == 'create' ? 'active' : '' ?>">Add Product</a>
        </div>
        
        <?php if ($message): ?>
            <div class="message <?= strpos($message, 'Error') !== false ? 'error' : 'success' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>
        
        <?php if ($action == 'list'): ?>
            <?php 
            $stats = calculateProductStats();
            ?>
            <div class="stats">
                <h3>Product Statistics</h3>
                <p>Total Products: <?= $stats['total_products'] ?></p>
                <p>Total Stock: <?= $stats['total_stock'] ?></p>
                <p>Total Inventory Value: $<?= number_format($stats['total_value'], 2) ?></p>
                <p>Average Price: $<?= number_format($stats['average_price'], 2) ?></p>
                <p>This page has been accessed <?= $stats['access_count'] ?> time(s) during this session.</p>
            </div>
            
            <form method="post">
                <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                    <div style="flex: 1;">
                        <label for="sort_by">Sort by:</label>
                        <select name="sort_by" id="sort_by">
                            <option value="name">Name</option>
                            <option value="price">Price</option>
                            <option value="category">Category</option>
                            <option value="stock">Stock</option>
                        </select>
                    </div>
                    <div style="flex: 1;">
                        <label for="order">Order:</label>
                        <select name="order" id="order">
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <div style="align-self: flex-end;">
                        <button type="submit" name="sort" class="button">Sort Products</button>
                    </div>
                </div>
            </form>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (readProducts() as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td>$<?= number_format($product['price'], 2) ?></td>
                        <td><?= htmlspecialchars($product['category']) ?></td>
                        <td><?= $product['stock'] ?></td>
                        <td class="actions">
                            <a href="?action=edit&id=<?= $product['id'] ?>" class="button button-secondary">Edit</a>
                            <a href="?action=delete&id=<?= $product['id'] ?>" 
                               class="button button-danger"
                               onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="array-debug">
                <h3>Array Visualization (For Debugging)</h3>
                <div class="debug-toggle">
                    <button onclick="document.getElementById('pr_output').classList.toggle('hidden')">Toggle print_r() Output</button>
                    <button onclick="document.getElementById('vd_output').classList.toggle('hidden')">Toggle var_dump() Output</button>
                </div>
                
                <div id="pr_output">
                    <h4>Using print_r():</h4>
                    <pre><?php print_r($_SESSION['products']); ?></pre>
                </div>
                
                <div id="vd_output" class="hidden">
                    <h4>Using var_dump():</h4>
                    <pre><?php 
                        ob_start();
                        var_dump($_SESSION['products']);
                        echo htmlspecialchars(ob_get_clean());
                    ?></pre>
                </div>
            </div>
            
        <?php elseif ($action == 'create'): ?>
            <h2>Add New Product</h2>
            <form method="post">
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" min="0.01" required>
                </div>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="">-- Select Category --</option>
                        <?php foreach (getAvailableCategories() as $category): ?>
                            <option value="<?= htmlspecialchars($category) ?>"><?= $category ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="stock">Stock Quantity:</label>
                    <input type="number" id="stock" name="stock" min="0" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="create" class="button">Create Product</button>
                    <a href="?action=list" class="button button-secondary">Cancel</a>
                </div>
            </form>
            
        <?php elseif ($action == 'edit' && isset($_GET['id'])): 
            $id = intval($_GET['id']);
            $product = getProductById($id);
            
            if ($product):
        ?>
            <h2>Edit Product (ID: <?= $id ?>)</h2>
            <form method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" min="0.01" value="<?= $product['price'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="">-- Select Category --</option>
                        <?php foreach (getAvailableCategories() as $categoryOption): ?>
                            <option value="<?= htmlspecialchars($categoryOption) ?>" 
                                <?= $product['category'] == $categoryOption ? 'selected' : '' ?>>
                                <?= $categoryOption ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="stock">Stock Quantity:</label>
                    <input type="number" id="stock" name="stock" min="0" value="<?= $product['stock'] ?>" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="update" class="button">Update Product</button>
                    <a href="?action=list" class="button button-secondary">Cancel</a>
                </div>
            </form>
        <?php 
            else:
                echo "<div class='message error'>Product with ID $id not found.</div>";
                include 'list.php'; // Redirect to list view
            endif;
        endif;
        ?>
    </div>
</body>
</html>