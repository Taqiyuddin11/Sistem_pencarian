<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f3f5;
            margin: 0;
            padding: 40px;
        }

        h2 {
            color: #212529;
            margin-bottom: 30px;
        }

        .result-item {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }

        .result-item:hover {
            transform: translateY(-2px);
        }

        .result-url {
            color: #007bff;
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
        }

        .result-url:hover {
            text-decoration: underline;
        }

        .result-snippet {
            color: #495057;
            font-size: 15px;
            margin-top: 10px;
            line-height: 1.6;
        }

        .no-results {
            font-size: 18px;
            color: #dc3545;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <h2>Hasil Pencarian:</h2>

    <?php if (empty($results)): ?>
        <p class="no-results">Maaf, tidak ada hasil ditemukan.</p>
    <?php else: ?>
        <?php foreach ($results as $row): ?>
            <div class="result-item">
                <a class="result-url" href="<?= $row['url'] ?>" target="_blank"><?= $row['url'] ?></a>
                <p class="result-snippet"><?= substr(strip_tags($row['content']), 0, 300) ?>...</p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>