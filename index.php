<?php
// Function to perform addition
function add($num1, $num2) {
    return $num1 + $num2;
}

// Function to perform subtraction
function subtract($num1, $num2) {
    return $num1 - $num2;
}

// Function to perform multiplication
function multiply($num1, $num2) {
    return $num1 * $num2;
}

// Function to perform division
function divide($num1, $num2) {
    if ($num2 != 0) {
        return $num1 / $num2;
    } else {
        return "Error: Division by zero";
    }
}

// Main program
$num1 = 0;
$num2 = 0;
$operator = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];
    
    switch ($operator) {
        case '+':
            $result = add($num1, $num2);
            break;
        case '-':
            $result = subtract($num1, $num2);
            break;
        case '*':
            $result = multiply($num1, $num2);
            break;
        case '/':
            $result = divide($num1, $num2);
            break;
        default:
            $result = "Error: Invalid operator";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
</head>
<body>
    <h2>Simple Calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="number" name="num1" value="<?php echo $num1; ?>" required>
        <select name="operator" required>
            <option value="+" <?php if ($operator == '+') echo 'selected'; ?>>+</option>
            <option value="-" <?php if ($operator == '-') echo 'selected'; ?>>-</option>
            <option value="*" <?php if ($operator == '*') echo 'selected'; ?>>*</option>
            <option value="/" <?php if ($operator == '/') echo 'selected'; ?>>/</option>
        </select>
        <input type="number" name="num2" value="<?php echo $num2; ?>" required>
        <input type="submit" value="Calculate">
    </form>
    <?php
    if (isset($result)) {
        echo "Result: $result";
    }
    ?>
</body>
</html>

