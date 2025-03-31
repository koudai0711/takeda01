<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>商品管理システム</title>
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="vsc-initialized">
    @inertia
</body>
</html> 