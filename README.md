## 系統名稱

### 巧克力購物網站

## 系統畫面

### 會員 - 商品區

<a href="https://i.imgur.com/jwiiz9y.png"><img src="https://i.imgur.com/jwiiz9y.png" title="source: imgur.com" /></a>

### 會員 - 購物車

<a href="https://i.imgur.com/SQvZGp4.png"><img src="https://i.imgur.com/SQvZGp4.png" title="source: imgur.com" /></a>

### 會員 - 訂單

<a href="https://i.imgur.com/IXJ2E3B.png"><img src="https://i.imgur.com/IXJ2E3B.png" title="source: imgur.com" /></a>

## 系統的主要功能

前台

- 商品區 Route::middleware(['auth:sanctum', 'verified'])
  ->get('/products', [ProductsController::class, 'index'])
  ->name('shop.index');
  [3A732036 葉軍佑](https://github.com/3A732036)

- 購物車 Route::middleware(['auth:sanctum', 'verified'])
  ->get('/cart', [CartsController::class, 'index'])
  ->name('cart.index');
  [3A732036 葉軍佑](https://github.com/3A732036)

  Route::middleware(['auth:sanctum', 'verified'])
  ->delete('/cart/{id}', [CartsController::class, 'destroy'])
  ->name('cart.destroy');
  [3A732036 葉軍佑](https://github.com/3A732036)

  Route::middleware(['auth:sanctum', 'verified'])
  ->post('/cartadd', [CartsController::class, 'store'])
  ->name('cart.add');
  [3A732036 葉軍佑](https://github.com/3A732036)

- 訂單 Route::middleware(['auth:sanctum', 'verified'])
  ->get('/order', [OrdersController::class, 'index'])
  ->name('order.index');
  [3A732036 葉軍佑](https://github.com/3A732036)

  Route::middleware(['auth:sanctum', 'verified'])
  ->post('/order', [OrdersController::class, 'store'])
  ->name('order.store');
  [3A732036 葉軍佑](https://github.com/3A732036)
  


## ERD

<a href="https://i.imgur.com/ImEDf48.png"><img src="https://i.imgur.com/ImEDf48.png" title="source: imgur.com" /></a>

## 關聯式綱要圖

<a href="https://i.imgur.com/vNMR9ld.jpg"><img src="https://i.imgur.com/vNMR9ld.jpg" title="source: imgur.com" /></a>

## 初始專案與DB負責的同學

初始專案、DB：[3A732036 葉軍佑](https://github.com/3A732036)

## 額外使用的套件或樣板

前台樣板：[Modern Business](https://startbootstrap.com/template/modern-business)

後台樣板：[Sidebar](https://startbootstrap.com/template/simple-sidebar)

## 系統測試資料存放位置

     final04底下的sql資料夾

## 系統使用者測試帳號

前台

     帳號：3a732036@gm.student.ncut.edu.tw
     密碼：3a732036

## 系統開發人員與工作分配

[3A732036 葉軍佑](https://github.com/3A732036)

      前台
      初始專案
      資料庫創建
      readme 撰寫
      期中報告製作

[3A732043 吳辰恩](https://github.com/3A732043)

      後台
      期中報告製作


