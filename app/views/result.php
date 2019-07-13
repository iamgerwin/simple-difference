<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results - Simple Difference</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <table id="basic" class="diff">
        <thead>
            <tr>
                <td>Simple Difference</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($simpleResults as $result) : ?>
                <tr>
                    <td><?= $result ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <hr>
    <table id="advanced" class="diff">
        <thead>
            <tr>
                <td>Advanced Difference</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($advancedResults as $result) : ?>
                <tr>
                    <td><?= $result ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>