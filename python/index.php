<?php
if(isset($_POST['submit']) && ($_POST['submit'] == "Convert")){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST["amount"];
    $key = "a31db7f3272fab9ccd6564dcc34a8e44";
    $url = "http://api.exchangerate.host/convert?access_key={$key}&from={$from}&to={$to}&amount={$amount}";
    $curl =  curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json']
    ]);
    $data = json_decode(curl_exec($curl), 1)['result'];
    print_r($data);


}



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <form action="" method="post">
        <label for="from">Enter the from currency code :</label>
        <input type="text" name="from" placeholder="From Currency (e.g. USD)" required><br>
        <label for="from">Enter the to currency code :</label>
        <input type="text" name="to" placeholder="To Currency (e.g. EUR)" required><br>
        <label for="from">Enter the Amount :</label>
        <input type="number" name="amount" placeholder="Amount" step="0.01" required><br>
        <input type="submit" name="submit" value="Convert">
    </form>
</body>
</html>