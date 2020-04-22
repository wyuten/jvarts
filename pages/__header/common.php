<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href=<?print("assets/styles/" . $style)?>>
    <?php endforeach; ?>
    <title><?print($pageTitle)?></title>
</head>
<body>
    <header class="header container">
        <a class="logo" href="index.php">jvarts</a>
    </header>