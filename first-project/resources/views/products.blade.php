<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">		
        <h2 class="mb-4">Danh sách sản phẩm</h2>		
        @if(session('error'))		
        <div class="alert alert-danger">{{ session('error') }}</div>		
        @endif		
        <table class="table table-bordered">		
            <thead>		
                <tr>		
                    <th>ID</th>		
                    <th>Tên sản phẩm</th>		
                    <th>Mô tả</th>		
                    <th>Giá</th>		
                    <th>Số lượng</th>		
                    </tr>		
            </thead>		
        <tbody>		
        @foreach($products as $product)		
        <tr>		
            <td>{{ $product['id'] }}</td>		
            <td>{{ $product['name'] }}</td>		
            <td>{{ $product['description'] }}</td>		
            <td>{{ number_format($product['price'], 2) }} $</td>		
            <td>{{ $product['quantity'] }}</td>		
            </tr>		
        @endforeach		
        </tbody>		
        </table>		
    </div>		
</body>
</html>