<?php
// ==============================
// PHP SECTION (Server-side Logic)
// Interaction: This PHP code responds when the user submits the form.
// It grabs the topping from the form data and creates a response message.
// This runs BEFORE anything is shown in the browser.
// ==============================
$order = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $topping = $_POST["topping"];  // Get the selected topping from the form
    $order = "You ordered a pizza with: " . $topping;  // Create a message
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Pizza Order</title>

    <!-- 
    CSS SECTION (Client-side Styling)
    This <style> block contains CSS to style the page.
    It affects how elements look in the browser.

    - The 'body' selector centers content, sets a font, and adds a background color.
    - The 'select' and 'button' selectors control padding and font size for input elements.
    - The '.result' class makes the PHP output stand out in green.
    -->
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            padding-top: 50px;
            background-color: #fffde7;
        }

        select, button {
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
        }

        .result {
            margin-top: 20px;
            font-size: 20px;
            color: green;
        }
    </style>
</head>
<body>

    <!-- 
    HTML SECTION (Page Structure)
    This builds the form on the page. The form uses the POST method to send data to the same PHP file.

    - The <select> dropdown lets the user choose one topping.
    - The <button> submits the form.

    Interaction: The user chooses a topping from the dropdown menu.
    This is the first user interaction — it updates the visible selection (via JS).
    When the user clicks the button, the form sends data to the server (PHP).
    -->
    <h1>Pizza Order</h1>
    
    <!-- Form Interaction: When submitted, it triggers PHP on the server -->
    <form method="POST">
        <label for="topping">Choose a topping:</label><br>

        <!-- Dropdown menu for toppings -->
        <!-- Interaction: The onchange="showChoice()" attribute means this will trigger a JavaScript function
        whenever the user selects a different topping. -->
        <select name="topping" id="topping" onchange="showChoice()">
            <option value="Cheese">Cheese</option>
            <option value="Pepperoni">Pepperoni</option>
            <option value="Mushrooms">Mushrooms</option>
            <option value="Pineapple">Pineapple</option>
        </select><br>

        <!-- 
        Interaction:
        Clicking this button submits the form, which sends the data to the server.
        PHP then runs and updates the page with the selected topping.
        -->
        <button type="submit">Order</button>
    </form>

    <!-- 
    PLACEHOLDER for JavaScript output
    This paragraph will be updated when the user changes the dropdown.
    -->
    <p id="choice"></p>

    <!-- 
    PHP OUTPUT SECTION (Server-side Result)
    If the form was submitted, PHP creates a message and displays it here.
    -->
    <div class="result">
        <?php echo $order; ?>
    </div>

    <!-- 
    JAVASCRIPT SECTION (Client-side Interactivity)
    This script runs in the browser when the user selects a topping.
    It instantly updates the text on the page without needing to reload.

    - Gets the value of the selected topping.
    - Changes the inner text of the <p id="choice"> element.

    Interaction: This function runs when the user changes the dropdown.
    It grabs the selected topping and updates the text on the page — instantly, without refreshing.
    -->
    <script>
        function showChoice() {
            var topping = document.getElementById("topping").value;
            document.getElementById("choice").innerText = "You selected: " + topping;
        }
    </script>

</body>
</html>