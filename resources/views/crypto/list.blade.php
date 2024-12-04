<!DOCTYPE html>
<html>
<head>
    <title>Crypto List</title>
</head>
<body>
<h1>Cryptocurrency List</h1>
<ul>
    @foreach ($cryptoList as $crypto)
        <li>{{ $crypto['name'] }} ({{ $crypto['symbol'] }})</li>
    @endforeach
</ul>
</body>
</html>
