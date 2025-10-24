<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>買取管理一覧</title>
<style>
body { font-family: sans-serif; background: #f7f7f7; padding: 20px; }
table { border-collapse: collapse; width: 100%; background: white; }
th, td { border: 1px solid #ccc; padding: 8px 10px; text-align: left; }
th { background: #333; color: white; }
h1 { text-align: center; }
a { color: #333; text-decoration: none; }
</style>
</head>
<body>
<h1>買取管理一覧</h1>
<p><a href="/?route=dashboard">← ダッシュボードへ戻る</a></p>

<table>
<tr><th>ブランド</th><th>モデル</th><th>金額</th><th>担当者</th><th>買取方法</th><th>登録日時</th></tr>
<?php foreach($data as $row): ?>
<tr>
<td><?= htmlspecialchars($row['brand']) ?></td>
<td><?= htmlspecialchars($row['model']) ?></td>
<td><?= htmlspecialchars($row['price']) ?></td>
<td><?= htmlspecialchars($row['staff']) ?></td>
<td><?= htmlspecialchars($row['method']) ?></td>
<td><?= htmlspecialchars($row['time']) ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
