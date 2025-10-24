<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ChronoBase ダッシュボード</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        header {
            background: #111;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 20px;
        }
        main {
            max-width: 950px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #222;
            margin-bottom: 25px;
        }
        canvas {
            max-width: 100%;
            height: 400px;
        }
        .links {
            text-align: center;
            margin-top: 40px;
        }
        .links a {
            display: inline-block;
            background: #333;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 8px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .links a:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <header>ChronoBase 管理ダッシュボード</header>
    <main>
        <h1>📊 月別売上グラフ</h1>
        <canvas id="salesChart"></canvas>

        <div class="links">
            <a href="?route=sales_form">📝 売上登録</a>
            <a href="?route=sales_list">📘 売上一覧</a>
            <a href="?route=purchase_form">💰 買取登録</a>
            <a href="?route=purchase_list">📗 買取一覧</a>
            <a href="?route=logout" style="background:#a00;">🚪 ログアウト</a>
        </div>
    </main>

    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesData = <?php echo json_encode($salesData ?? []); ?>;
        const labels = salesData.map(d => d.month);
        const values = salesData.map(d => d.total_sales);

        if (labels.length === 0) {
            document.getElementById('salesChart').insertAdjacentHTML('afterend', "<p style='text-align:center;color:#999;'>データがまだ登録されていません。</p>");
        } else {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '月別売上（円）',
                        data: values,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: true, text: '売上推移' }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        }
    </script>
</body>
</html>
