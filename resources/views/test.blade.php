<!DOCTYPE html>
<html>
<head>
    <title>Test Page</title>
</head>
<body>
    <h1>Данные из модели Test</h1>

    @if ($test)
        <p>ID: {{ $test->id }}</p>
        <p>Текст: {{ $test->text }}</p>
    @else
        <p>Запись не найдена.</p>
    @endif

    @dump($test)
</body>
</html>