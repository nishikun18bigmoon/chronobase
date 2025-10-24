<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>売上登録フォーム</title>
<style>
  body { font-family: 'Helvetica', 'Yu Gothic', sans-serif; background-color: #f5f5f5; padding: 20px; }
  h1 { text-align: center; color: #222; }
  form {
    max-width: 600px; margin: 0 auto; background: #fff;
    padding: 20px; border-radius: 10px; box-shadow: 0 0 8px rgba(0,0,0,0.1);
  }
  label { display: block; margin-top: 10px; font-weight: bold; }
  input[type="text"], input[type="date"] {
    width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;
  }
  button {
    margin-top: 20px; width: 100%; padding: 10px;
    background: #333; color: #fff; border: none; border-radius: 5px; cursor: pointer;
  }
  button:hover { background: #555; }
  fieldset { margin-top: 15px; border: 1px solid #ccc; border-radius: 8px; padding: 10px; }
  legend { font-weight: bold; }
</style>
</head>
<body>

<h1>売上登録フォーム</h1>

<form method="POST" action="?route=sales_save">
  <label>商品ID</label>
  <input type="text" name="product_id" required>

  <label>ブランド</label>
  <input type="text" name="brand" required>

  <label>モデル</label>
  <input type="text" name="model" required>

  <label>金額（円）</label>
  <input type="text" name="price" required pattern="[0-9]+" title="半角数字のみ入力してください">

  <fieldset>
    <legend>販売担当者</legend>
    <?php
      $staffs = ["店長","森田","西村","渡邉","寺川","平井"];
      foreach ($staffs as $s) {
          echo "<label><input type='radio' name='staff' value='{$s}' required> {$s}</label>";
      }
    ?>
  </fieldset>

  <fieldset>
    <legend>販売先</legend>
    <?php
      $destinations = ["店頭","WEB","楽天","ヤフオク","免税","クロノ24"];
      foreach ($destinations as $d) {
          echo "<label><input type='radio' name='destination' value='{$d}' required> {$d}</label>";
      }
    ?>
  </fieldset>

  <fieldset>
    <legend>販売方法</legend>
    <?php
      $methods = ["現金","カード","ローン","代引き","ペイジェント"];
      foreach ($methods as $m) {
          echo "<label><input type='radio' name='method' value='{$m}' required> {$m}</label>";
      }
    ?>
  </fieldset>

  <label>販売日</label>
  <input type="date" name="sale_date" required>

  <button type="submit">登録する</button>
</form>

</body>
</html>