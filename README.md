# KURIADELE

EC会員サイトです。
商品の選択から購入まで一貫して行えるツールです。

## 概要

KURIADELE は以下の機能を実装しています。

レイアウトに Bootstrap を使用したECサイトです。

顧客の非会員部門・会員の商品購入機能部門・管理者専用部門 3つのテーブルで作成しております。

管理者が商品を登録すると、顧客の商品一覧ページに商品が反映されます

顧客がログインする事で、顧客自身が直接個人情報変更・商品の購入・購入一覧ページも見る事ができます。

MVCの思想にのっとり、Model/Viewを自作し連携させています。


## 機能一覧
顧客部門
・ログイン機能
・顧客登録機能
・顧客情報変更機能
・ショッピングカート機能
・商品購入機能
・購入商品一覧表示機能
・各種フラッシュメッセージ表示機能
・入力値に関するバリデーション機能

管理者部門
・ログイン機能
・商品登録機能
・商品在庫数変更機能
・各種情報登録・表示機能

                
## 設計図
![plan_1](https://user-images.githubusercontent.com/70011422/117910982-e99e0880-b317-11eb-9658-24e1a8e3c630.jpg)
![plan_2](https://user-images.githubusercontent.com/70011422/117911056-0afef480-b318-11eb-8443-a0f958506c04.jpg)
![plan_3](https://user-images.githubusercontent.com/70011422/117911081-181be380-b318-11eb-9577-349d27df1a5d.jpg)

## データベース図
![plan_4](https://user-images.githubusercontent.com/70011422/117911107-2407a580-b318-11eb-8cfb-8f466eb15d54.jpg)

## 使用方法
動画をご覧ください。

## 動画

非会員 商品ページ![not_customer_product](https://user-images.githubusercontent.com/70011422/118083596-2b06e480-b3fa-11eb-98a5-60676d89cfb7.gif)


新規登録 ログイン![customer_login](https://user-images.githubusercontent.com/70011422/118083786-8507aa00-b3fa-11eb-936c-5b3963b0ee41.gif)


会員 ログイン 商品ページ カート 購入![login_cart_pur](https://user-images.githubusercontent.com/70011422/118083762-715c4380-b3fa-11eb-94d5-6622864284ca.gif)


管理者 商品登録![admin_product_set](https://user-images.githubusercontent.com/70011422/118083898-aff1fe00-b3fa-11eb-9534-4f808775a2c3.gif)


管理者 顧客確認 news登録![admin_customer_news](https://user-images.githubusercontent.com/70011422/118083996-de6fd900-b3fa-11eb-9737-206d9b0b7a23.gif)


管理者 問合せ 企業情報![admin_question_KURIADELE](https://user-images.githubusercontent.com/70011422/118083940-c5672800-b3fa-11eb-96f7-3e489dde17bd.gif)


管理者 支払銀行登録![admin_bank](https://user-images.githubusercontent.com/70011422/118084700-1cb9c800-b3fc-11eb-8657-c5f011e4ee0e.gif)

## エピソード

PHPを学んで5か月ほどです。
何を制作するか悩んでいた所に、身内で事業をしているので購入サイトがあったら嬉しいとのお話を頂き
制作に至りました。
どんなECサイトを作るのか・どんな雰囲気のページにしたいのか・何の機能があったら良いかなど打合せしながら取り組みました。
何もかもが初めてで分からない部分が多く大変苦労しました。
その中でも一番力を入れた所は、新規登録した顧客が login して
商品を選び、カートに入れ購入するという一連の流れについて整っているかという所です。

まだ未熟ですが、今できる範囲での精一杯の作品です。改善点などありましたら、ご連絡いて抱けたらと思います。

## 著者

Hazuki Baba
