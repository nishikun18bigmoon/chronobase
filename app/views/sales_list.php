<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>売上管理一覧</title>
<style>
  body { font-family: 'Helvetica', 'Yu Gothic', sans-serif; background-color: #f5f5f5; padding: 20px; }
  h1 { text-align: center; color: #222; }
  table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
  th, td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
  }
  th { background: #333; color: #fff; }
  tr:nth-child(even) { background: #f9f9f9; }
  a { color: #333; text-decoration: none; }
  a:hover { text-decoration: underline; }
  .back { margin-bottom: 10px; display: inline-block; }
</style>
</head>
<body>

<a class="back" href="?route=dashboard">← ダッシュボードへ戻る</a>
<h1>売上管理一覧</h1>

<table>
  <tr>
    <th>商品ID</th>
    <th>ブランド</th>
    <th>モデル</th>
    <th>金額</th>
    <th>販売担当</th>
    <th>販売先</th>
    <th>販売方法</th>
    <th>登録日時</th>
  </tr>

  <?php if (!empty($sales)): ?>
    <?php foreach ($sales as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['product_id']) ?></td>
        <td><?= htmlspecialchars($row['brand']) ?></td>
        <td><?= htmlspecialchars($row['model']) ?></td>
        <td><?= number_format($row['price']) ?> 円</td>
        <td><?= htmlspecialchars($row['staff']) ?></td>
        <td><?= htmlspecialchars($row['destination']) ?></td>
        <td><?= htmlspecialchars($row['method']) ?></td>
        <td><?= htmlspecialchars($row['created_at']) ?></td>
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
      <tr><td colspan="8" style="text-align:center;">登録データがありません。</td></tr>
  <?php endif; ?>
</table>

</body>
</html>