<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require 'config.php'; // connexion PDO

// Recuperer le nombre total de visites
$stmt = $pdo->query("SELECT COUNT(*) as total FROM visites");
$total_visites = $stmt->fetch()['total'];

// Recuperer les visites par page
$stmt = $pdo->query("SELECT page, COUNT(*) as nb FROM visites GROUP BY page ORDER BY nb DESC");
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculer les pourcentages
$data = [];
foreach ($pages as $p) {
    $pourcentage = ($p['nb'] / $total_visites) * 100;
    $data[] = [
        'page' => $p['page'],
        'nb' => $p['nb'],
        'pourcentage' => round($pourcentage, 2)
    ];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .stats { margin-bottom: 20px; }
        table { border-collapse: collapse; width: 60%; }
        table, th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>
    <h1>📊 Tableau de bord - Admin</h1>
    <div class="stats">
        <p><strong>Total des visites :</strong> <?= $total_visites ?></p>
    </div>

    <h2>Visites par page</h2>
    <table>
        <tr><th>Page</th><th>Nombre</th><th>%</th></tr>
        <?php foreach ($data as $d): ?>
            <tr>
                <td><?= htmlspecialchars($d['page']) ?></td>
                <td><?= $d['nb'] ?></td>
                <td><?= $d['pourcentage'] ?>%</td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Diagramme circulaire</h2>
    <canvas id="pieChart" width="400" height="400"></canvas>

    <script>
        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?= json_encode(array_column($data, 'page')) ?>,
                datasets: [{
                    data: <?= json_encode(array_column($data, 'nb')) ?>,
                    backgroundColor: ['#FF6384','#36A2EB','#FFCE56','#4BC0C0','#9966FF','#FF9F40']
                }]
            }
        });
    </script>
</body>
</html>
