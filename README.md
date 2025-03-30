# 商品管理システム

## 概要
このプロジェクトは、商品の在庫管理、発注管理、在庫アラート機能を提供するWebアプリケーションです。

## 技術スタック
- フロントエンド: Vue.js 3.4.23 + Inertia.js
- バックエンド: Laravel 12.0+
- データベース: PostgreSQL 14.11
- コンテナ化: Docker
- バージョン管理: Git

## システム要件

### 機能要件

#### 1. 商品管理機能
- 商品の登録、編集、削除
- 商品一覧の表示
- 商品詳細の表示
- 商品の検索機能
- 商品のカテゴリ分類

#### 2. 在庫管理機能
- 在庫数の表示
- 在庫数の更新
- 在庫履歴の記録
- 在庫アラート機能（在庫が一定数以下になった場合の通知）

#### 3. 発注管理機能
- 発注の作成
- 発注履歴の表示
- 発注状況の管理
- 発注の承認フロー

#### 4. ユーザー管理機能
- ユーザーの登録、編集、削除
- ロールベースのアクセス制御
- ユーザー認証

### 非機能要件

#### 1. 性能要件
- ページロード時間: 2秒以内
- 同時接続ユーザー数: 100人以上
- データベース応答時間: 1秒以内

#### 2. セキュリティ要件
- ユーザー認証の必須化
- パスワードの暗号化
- SQLインジェクション対策
- XSS対策
- CSRF対策

#### 3. 可用性要件
- システム稼働率: 99.9%
- バックアップの定期実行
- 障害時の復旧手順

#### 4. 保守性要件
- コードの可読性
- モジュール化された設計
- 適切なドキュメント整備

## 開発環境

### 技術スタック詳細

#### 言語・ランタイム
- PHP: 8.2.15
- Node.js: Dockerfileでインストール

#### フレームワーク
- Laravel: 12.0+
- Vue.js: 3.4.23
- Inertia.js: Vue3アダプタ 1.0.15、Laravel側 2.0

#### データベース
- PostgreSQL: 14.11-alpine

#### コンテナ・ツール
- Docker: Dockerfileあり
- Nginx: 1.25.4-alpine
- PHP-FPM: 8.2.15-fpm
- Composer: 2.6.6

#### フロントエンドツール・ライブラリ
- Vite: 5.2.5
- Tailwind CSS: 4.0.17
- Axios: 1.8.2
- PostCSS: 8.5.3

#### テスト・開発ツール
- PHPUnit: 11.5+
- Laravel Sail: 1.41+
- Laravel Pint: 1.13+

### セットアップ手順
1. リポジトリのクローン
```bash
git clone https://github.com/koudai0711/takeda01.git
cd takeda01
```

2. 環境変数の設定
```bash
cp .env.example .env
```

3. Dockerコンテナの起動
```bash
docker-compose up -d
```

4. 依存パッケージのインストール
```bash
docker-compose exec app composer install
```

5. アプリケーションキーの生成
```bash
docker-compose exec app php artisan key:generate
```

6. データベースのマイグレーション
```bash
docker-compose exec app php artisan migrate
```

## ライセンス
MIT License