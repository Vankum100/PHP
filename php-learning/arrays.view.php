<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    header{
        background: #e3e3e3;
        padding: 1em;
        text-align: center;
    }
    </style>
</head>
<body>

    <h4>Animal List</h4>

    <ul>
        <?php foreach ($animals as $animal) : ?>
            <li><?= $animal; ?></li>
        <?php endforeach; ?>
    </ul>

    <h4>Person Info</h4>

<ul>
    <?php foreach ($person as $key => $feature) : ?>
        <li><strong><?= ucwords($key);?></strong> <?= $feature; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>