<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif; /* Use the Thai font */
            margin: 0;
            padding: 0;
        }
        .receipt {
            width: 100%;
            max-width: 600px; /* Adjust width as per your requirement */
            margin: 0 auto;
            padding: 20px;
        }
        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .info {
            text-align: right;
            margin-bottom: 10px;
        }
        .section {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .left {
            float: left;
            width: 50%;
        }
        .right {
            float: right;
            width: 50%;
        }
        .customer-info, .merchant-info {
            margin-bottom: 20px;
        }
        .signature {
            margin-top: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="title">บิลเงินสด</div>
        <div class="info">
            <div>Receipt #: XXXX</div>
            <div>Date: YYYY-MM-DD</div>
        </div>
        <div class="section">
            <div class="left customer-info">
                <h3>ข้อมูลลูกค้า</h3>
                <p>ชื่อ: Customer Name</p>
                <p>ที่อยู่: Customer Address</p>
                <p>โทร: Customer Tel</p>
                <p>อีเมล: Customer Email</p>
            </div>
            <div class="right merchant-info">
                <h3>ข้อมูลผู้ขาย</h3>
                <p>ชื่อ: Merchant Name</p>
                <p>ที่อยู่: Merchant Address</p>
                <p>โทร: Merchant Tel</p>
                <p>อีเมล: Merchant Email</p>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="section">
            <h3>รายละเอียดสินค้า</h3>
            <table>
                <tr>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th>รวม</th>
                </tr>
                <tr>
                    <td>Product 1</td>
                    <td>100</td>
                    <td>1000</td>
                </tr>
                <!-- Add more rows as needed -->
            </table>
        </div>
        <!-- Shipping section -->
        <!-- Total section -->
        <!-- Signature section -->
        <div class="signature">
            <div class="left">ลายเซ็นผู้ซื้อ</div>
            <div class="right">ลายเซ็นผู้ขาย</div>
            <div style="clear: both;"></div>
        </div>
    </div>
</body>
</html>
