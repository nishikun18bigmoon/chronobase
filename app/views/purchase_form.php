<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>買取管理</title>
<style>
body { font-family: sans-serif; background: #f5f5f5; }
.container { width: 480px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
h2 { text-align: center; color: #333; }
label { display: block; margin-top: 10px; color: #333; }
input, select {
  width: 100%; padding: 10px; margin-top: 5px;
  border: 1px solid #ccc; border-radius: 5px;
}
button {
  margin-top: 20px; width: 100%; padding: 12px;
  background: #333; color: white; border: none; border-radius: 5px;
  font-size: 16px;
}
button:hover { background: #555; }
</style>
</head>
<body>
<div class="container">
<h2>買取管理</h2>
<form method="POST" action="/?route=purchase_submit">
  <label>ブランド</label>
  <input type="text" name="brand">

  <label>モデル</label>
  <input type="text" name="model">

  <label>金額</label>
  <input type="number" name="price">

  <label>買取担当者</label>
  <input type="text" name="staff">

  <label>買取方法</label>
  <select name="method">
    <option value="店舗">店舗</option>
    <option value="郵送">郵送</option>
    <option value="出張">出張</option>
    <option value="その他">その他</option>
  </select>

  <button type="submit">登録する</button>
</form>
</div>
</body>
</html>
