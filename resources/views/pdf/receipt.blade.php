<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <div style="font-family: 'DejaVu Sans', sans-serif;">
        <div style="text-align: center; font-size: 24px; font-weight: bold; margin-bottom: 20px;">{{ $title }}</div>
        
        <div style="margin-bottom: 20px;">
            <div style="float: left; width: 50%;">
                <p>ลูกค้า:</p>
                <p>ชื่อ: {{ $customer['name'] }}</p>
                <p>ที่อยู่: {{ $customer['address'] }}</p>
                <p>โทร: {{ $customer['tel'] }}</p>
                <p>อีเมล: {{ $customer['email'] }}</p>
            </div>
            <div style="float: right; width: 50%;">
                <p>ร้านค้า:</p>
                <p>ชื่อ: {{ $merchant['name'] }}</p>
                <p>ที่อยู่: {{ $merchant['address'] }}</p>
                <p>โทร: {{ $merchant['tel'] }}</p>
                <p>อีเมล: {{ $merchant['email'] }}</p>
            </div>
        </div>
        
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="padding: 8px; text-align: center;">ชื่อสินค้า</th>
                    <th style="padding: 8px; text-align: center;">ราคา</th>
                    <th style="padding: 8px; text-align: center;">รวม</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td style="padding: 8px; text-align: center;">{{ $product['name'] }}</td>
                    <td style="padding: 8px; text-align: center;">{{ $product['price'] }}</td>
                    <td style="padding: 8px; text-align: center;">{{ $product['total'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div style="text-align: right; font-weight: bold; margin-bottom: 20px;">
            @if($shipping)
            <p>ค่าจัดส่ง: {{ $shipping }}</p>
            @endif
            <p>รวมทั้งสิ้น: {{ $total }}</p>
        </div>
        
        <div style="margin-top: 50px;">
            <div style="float: left; width: 50%; text-align: center;">
                <p>ลายเซ็นลูกค้า</p>
            </div>
            <div style="float: right; width: 50%; text-align: center;">
                <p>ลายเซ็นผู้ขาย</p>
            </div>
        </div>
    </div>
</body>
</html>
