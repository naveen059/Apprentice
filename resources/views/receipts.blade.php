<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>
    <h1>Receipt</h1>
    <p><strong>Amount:</strong> {{ $receiptData['amount'] }}</p>
    <p><strong>Payment Method:</strong> {{ $receiptData['payment_method'] }}</p>
    <p><strong>Payment Status:</strong> {{ $receiptData['payment_status'] }}</p>
    <p><strong>Course Name:</strong> {{ $receiptData['course_name'] }}</p>
    <p><strong>Transaction Date:</strong> {{ $receiptData['transaction_date'] }}</p>
</body>
</html>
