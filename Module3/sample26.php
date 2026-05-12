<?php
session_start();

// Initialize employees if not set
if (!isset($_SESSION['employees'])) {
    $_SESSION['employees'] = [
        ['id' => 1, 'name' => 'John Smith', 'position' => 'Manager', 'hourly_rate' => 35.50, 'hours_worked' => 40],
        ['id' => 2, 'name' => 'Sarah Johnson', 'position' => 'Developer', 'hourly_rate' => 30.00, 'hours_worked' => 38],
        ['id' => 3, 'name' => 'Michael Brown', 'position' => 'Designer', 'hourly_rate' => 28.75, 'hours_worked' => 42]
    ];
}

// User-defined functions
function calculateGrossPay($hourly_rate, $hours_worked) {
    // Overtime calculation (time and a half for hours over 40)
    if ($hours_worked > 40) {
        return (40 * $hourly_rate) + (($hours_worked - 40) * $hourly_rate * 1.5);
    } else {
        return $hours_worked * $hourly_rate;
    }
}

function calculateTax($gross_pay) {
    // Progressive tax calculation
    if ($gross_pay <= 500) {
        return $gross_pay * 0.10;
    } elseif ($gross_pay <= 1000) {
        return 50 + ($gross_pay - 500) * 0.15;
    } else {
        return 125 + ($gross_pay - 1000) * 0.20;
    }
}

function calculateNetPay($hourly_rate, $hours_worked) {
    $gross = calculateGrossPay($hourly_rate, $hours_worked);
    $tax = calculateTax($gross);
    return $gross - $tax;
}

function getPayrollStatistics($employees) {
    static $totalEmployees = 0;
    static $totalPayroll = 0;
    
    $totalEmployees += count($employees);
    
    $total = 0;
    foreach ($employees as $employee) {
        $netPay = calculateNetPay($employee['hourly_rate'], $employee['hours_worked']);
        $total += $netPay;
    }
    
    $totalPayroll += $total;
    
    return [
        'average_pay' => $total / count($employees),
        'total_employees' => $totalEmployees,
        'total_payroll' => $totalPayroll
    ];
}

// Handle form submissions
if (isset($_POST['add_employee'])) {
    $name = trim($_POST['name']);
    $position = trim($_POST['position']);
    $hourly_rate = floatval($_POST['hourly_rate']);
    $hours_worked = floatval($_POST['hours_worked']);
    
    if (!empty($name) && !empty($position) && $hourly_rate > 0 && $hours_worked >= 0) {
        $newId = end($_SESSION['employees'])['id'] + 1;
        $_SESSION['employees'][] = [
            'id' => $newId,
            'name' => $name,
            'position' => $position,
            'hourly_rate' => $hourly_rate,
            'hours_worked' => $hours_worked
        ];
    }
}

if (isset($_POST['update_hours'])) {
    $id = intval($_POST['employee_id']);
    $hours = floatval($_POST['hours_worked']);
    
    foreach ($_SESSION['employees'] as &$employee) {
        if ($employee['id'] == $id) {
            $employee['hours_worked'] = $hours;
            break;
        }
    }
}

if (isset($_POST['sort_employees'])) {
    $sort_by = $_POST['sort_by'];
    
    usort($_SESSION['employees'], function($a, $b) use ($sort_by) {
        if ($sort_by == 'net_pay') {
            $netA = calculateNetPay($a['hourly_rate'], $a['hours_worked']);
            $netB = calculateNetPay($b['hourly_rate'], $b['hours_worked']);
            return $netB - $netA; // Descending order for pay
        } else {
            return strcmp($a[$sort_by], $b[$sort_by]);
        }
    });
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Payroll System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:hover { background-color: #f5f5f5; }
        .form-section { margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
        .button { padding: 5px 10px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .button:hover { background: #45a049; }
        .stats { background: #e6f7ff; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Employee Payroll System</h1>
    
    <div class="form-section">
        <h2>Add New Employee</h2>
        <form method="post">
            <label>Name: <input type="text" name="name" required></label>
            <label>Position: <input type="text" name="position" required></label>
            <label>Hourly Rate: <input type="number" name="hourly_rate" step="0.01" min="0.01" required></label>
            <label>Hours Worked: <input type="number" name="hours_worked" step="0.5" min="0" required></label>
            <button type="submit" name="add_employee" class="button">Add Employee</button>
        </form>
    </div>
    
    <div class="form-section">
        <h2>Sort Employees</h2>
        <form method="post">
            <label>Sort by: 
                <select name="sort_by">
                    <option value="name">Name</option>
                    <option value="position">Position</option>
                    <option value="net_pay">Net Pay (High to Low)</option>
                </select>
            </label>
            <button type="submit" name="sort_employees" class="button">Sort</button>
        </form>
    </div>
    
    <div class="stats">
        <h3>Payroll Statistics</h3>
        <?php 
        $stats = getPayrollStatistics($_SESSION['employees']);
        echo "<p>Average Net Pay: $" . number_format($stats['average_pay'], 2) . "</p>";
        echo "<p>Total Employees Processed: " . $stats['total_employees'] . "</p>";
        echo "<p>Total Payroll (Lifetime): $" . number_format($stats['total_payroll'], 2) . "</p>";
        ?>
    </div>
    
    <h2>Employee Payroll Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Hourly Rate</th>
            <th>Hours Worked</th>
            <th>Gross Pay</th>
            <th>Tax</th>
            <th>Net Pay</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($_SESSION['employees'] as $employee): 
            $gross = calculateGrossPay($employee['hourly_rate'], $employee['hours_worked']);
            $tax = calculateTax($gross);
            $net = $gross - $tax;
        ?>
        <tr>
            <td><?= $employee['id'] ?></td>
            <td><?= htmlspecialchars($employee['name']) ?></td>
            <td><?= htmlspecialchars($employee['position']) ?></td>
            <td>$<?= number_format($employee['hourly_rate'], 2) ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="employee_id" value="<?= $employee['id'] ?>">
                    <input type="number" name="hours_worked" value="<?= $employee['hours_worked'] ?>" step="0.5" min="0" style="width: 50px;">
                    <input type="submit" name="update_hours" value="Update" class="button">
                </form>
            </td>
            <td>$<?= number_format($gross, 2) ?></td>
            <td>$<?= number_format($tax, 2) ?></td>
            <td>$<?= number_format($net, 2) ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="employee_id" value="<?= $employee['id'] ?>">
                    <input type="submit" name="generate_payslip" value="Payslip" class="button">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <h3>Array Visualization</h3>
    <div style="background: #f0f0f0; padding: 10px; border: 1px solid #ddd;">
        <h4>Using print_r():</h4>
        <pre><?php print_r($_SESSION['employees']); ?></pre>
    </div>
</body>
</html>