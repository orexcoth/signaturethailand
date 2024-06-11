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
        .right-align {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="title">บิลเงินสด</div>
        <div class="info">
            <div>Receipt #: {{ $order->number }}</div>
            <div>Date: {{ $order->created_at->format('d/m/Y') }}</div> 
        </div>
        <div class="section">
            <div class="left customer-info">
                <h3>ข้อมูลลูกค้า</h3>
                <p>ชื่อ: {{ $order->firstname }} {{ $order->lastname }}</p>
                <p>ที่อยู่: {{ $order->shipping_detail ?? '' }}</p>
                <p>โทร: {{ $order->phone }}</p>
                <p>อีเมล: {{ $order->email }}</p>
            </div>
            <div class="right merchant-info">
                <h3>ข้อมูลผู้ขาย</h3>
                <p>ชื่อ: Signature Thailand</p>
                <p>ที่อยู่: Merchant Address</p>
                <p>โทร: 089 789 3649</p>
                <p>อีเมล: signature.thai@gmail.com</p>
            </div>
            <div style="clear: both;"></div>
        </div>

        <div class="section">
            <h3>รายละเอียดสินค้า</h3>
            <table>
                <tr>
                    <th>#</th>
                    <th>ชื่อ</th>
                    <th class="right-align">ราคา</th> <!-- Align ราคา column to the right -->
                </tr>
                @if($type == 'sells')
                    @php
                        $productName = '';
                        if ($order->package == 'th') {
                            $productName = $order->name_th;
                        } elseif ($order->package == 'en') {
                            $productName = $order->name_en;
                        } elseif ($order->package == 'all') {
                            $productName = $order->name_th . '/' . $order->name_en;
                        }
                        $productName .= ' #' . $order->id . ' (' . count(json_decode($order->signs)) . ' ลายเซ็นต์)';
                    @endphp
                    <tr>
                        <td>1</td> <!-- Assuming it's the first order -->
                        <td>{{ $productName }}</td>
                        <td class="right-align">{{ number_format($order->total, 2) }}</td> <!-- Align ราคา column to the right -->
                    </tr>
                @elseif($type == 'preorders')
                    @php
                        $productName = '';
                        if ($order->package == 'thai') {
                            $productName = $order->firstname_th . ' ' . $order->lastname_th;
                        } elseif ($order->package == 'english') {
                            $productName = $order->firstname_en . ' ' . $order->lastname_en;
                        } elseif ($order->package == 'combo') {
                            if ($order->preorder_type == 'firstname') {
                                $productName = $order->firstname_th . '/' . $order->firstname_en;
                            } elseif ($order->preorder_type == 'lastname') {
                                $productName = $order->lastname_th . '/' . $order->lastname_en;
                            } elseif ($order->preorder_type == 'duo') {
                                $productName = $order->firstname_th . ' ' . $order->lastname_th . '/' . $order->firstname_en . ' ' . $order->lastname_en;
                            }
                        }
                        $packageType = '';
                        if ($order->package == 'thai') {
                            $packageType = 'ไทย';
                        } elseif ($order->package == 'english') {
                            $packageType = 'อังกฤษ';
                        } elseif ($order->package == 'combo') {
                            $packageType = 'คอมโบไทยอังกฤษ';
                        }
                        $preorderType = '';
                        if ($order->preorder_type == 'firstname') {
                            $preorderType = 'เฉพาะชื่อ';
                        } elseif ($order->preorder_type == 'lastname') {
                            $preorderType = 'เฉพาะนามสกุล';
                        } elseif ($order->preorder_type == 'duo') {
                            $preorderType = 'ชื่อและนามสกุล';
                        }
                    @endphp
                    <tr>
                        <td>1</td> <!-- Assuming it's the first order -->
                        <td>{{ $productName }}<br>
                            แพ็คเกจ: {{ $packageType }}<br>
                            ประเภทการสั่งซื้อ: {{ $preorderType }}
                        </td>
                        <td class="right-align">{{ number_format($order->total_price, 2) }}</td> <!-- Align ราคา column to the right -->
                    </tr>
                    @if($order->shipping_price != 0)
                    <tr>
                        <td></td> <!-- Leave the "Order" column empty for these rows -->
                        <td>จัดส่งด่วน</td>
                        <td class="right-align">{{ number_format($order->shipping_price, 2) }}</td> <!-- Align ราคา column to the right -->
                    </tr>
                    <tr>
                        <td></td> <!-- Leave the "Order" column empty for these rows -->
                        <td>ยอดทั้งหมด</td>
                        <td class="right-align">{{ number_format($order->total_price + $order->shipping_price, 2) }}</td> <!-- Align ราคา column to the right -->
                    </tr>
                    @endif
                @endif
                <!-- Add more rows as needed -->
            </table>
        </div>
        <div class="signature">
            <div class="left">ลายเซ็นผู้ซื้อ</div>
            <div class="right">ลายเซ็นผู้ขาย</div>
            <div style="clear: both;"></div>
        </div>
    </div>
</body>
</html>
