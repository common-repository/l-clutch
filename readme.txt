=== L-Clutch ===
Contributors: onriseweb
Tags: line,ライン,social login
Requires at least: 6.2
Tested up to: 6.5
Stable tag: 1.0.4
License: GPL-3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.html

L-Clutchは、WordpressとLINE公式アカウントを連携し、webサイトのユーザーとLINEアカウントの紐づけを行います。

== Description ==

L-Clutchは、WordpressとLINE公式アカウントを連携するプラグインです。
webサイトにLINEログインボタンを設置し、webサイトのユーザーとLINEアカウントを紐づけます。

= 主な機能 =

- **ユーザー一覧機能** - これまでにログインしたユーザの一覧が確認できます。最終ログイン日時や公式アカウントの友だち追加状況などの情報が確認可能です。
- **リッチメニュー設定機能** - WordPress管理画面からリッチメニューを設定できます。複数のリッチメニューを作成し、切り替えを行うことも可能です。
- **L-Clutchブロック** - ブロックエディタで使用可能なブロックです。下記が主なブロックになります。
  - **LINEログインボタン** - LINEログインできるボタンを設置できます。
  - **閲覧制限エリア** - エリア内のコンテンツを閲覧できるユーザーを制限できます。
  - **友だち追加ボタン** - LINE公式アカウントを友だちに追加するためのボタンです。

== Installation ==

1. インストールしたいwebサイトのWordPressダッシュボードから、プラグインディレクトリにアクセスし、「L-Clutch」をインストールして下さい。

2. プラグイン画面で、L-Clutchを有効化します。

3. ダッシュボードのメニューに「L-Clutch」が追加されるので、L-Clutch内の「設定」を開き、「LINE接続設定」タブでLINEログインチャネルとLINE Messaging APIチャネルを設定して下さい。

== Frequently Asked Questions ==

= 私のテーマでL-Clutchは動作しますか？ =

はい。L-Clutchはどんなテーマでもお使い頂けるように設計しております。

= ブロックエディタを使用していないのですが、L-Clutchを利用できますか？ =

はい。ブロックエディタを使用していなくても、L-Clutchをご利用頂けます。L-Clutchブロックに対応したショートコードを用意しておりますので、そちらをお使い下さい。

= 他のLINE連携ツールと併用できますか？ =

いいえ。今のところ、他のLINE連携ツールと併用する機能はございません。L-Clutchを使用する場合、他のLINE連携ツールは使用できないので、予めご了承下さい。

== External Services Used ==

このプラグインは、下記の外部サービスを使用します。

= LINE プラットフォーム =

WordPressとLINEを連携するために、LINEプラットフォームのLINEログインチャネル、Messaging APIチャネルへAPIを通じてアクセスします。
それぞれのチャネルは、[LINE Developers Console](https://developers.line.biz/console/)より、作成してください。
APIの利用に当たり、下記のガイドラインを遵守してください。

- [LINEヤフー共通利用規約](https://terms.line.me/line_terms_notice)
- [LINE開発者契約](https://terms2.line.me/LINE_Developers_Agreement)
- [LINEユーザーデータポリシー](https://terms2.line.me/LINE_Developers_user_data_policy?lang=ja)
- [LINE公式アカウントAPI利用規約](https://terms2.line.me/official_account_api_terms_jp?lang=ja)

このプラグインは、LINEプラットフォームの下記のサービス、APIを使用しています。

- Channel Access Token API
  - エンドポイント: https://api.line.me/
  - [APIリファレンス](https://developers.line.biz/ja/reference/messaging-api/#channel-access-token)
  - [チャンネルアクセストークンについて](https://developers.line.biz/ja/docs/basics/channel-access-token/)
- Messaging API
  - エンドポイント: https://api.line.me/v2/bot/, https://api-data.line.me/v2/bot/
  - [APIリファレンス](https://developers.line.biz/ja/reference/messaging-api/)
  - [開発ガイドライン](https://developers.line.biz/ja/docs/messaging-api/development-guidelines/)
- LINEログイン v2.1 API
  - エンドポイント: https://api.line.me/oauth2/v2.1/verify, https://api.line.me/v2/profile, https://api.line.me/friendship/v1/status
  - 認証URL: https://access.line.me/oauth2/v2.1/authorize
  - [公式ドキュメント](https://developers.line.biz/ja/reference/line-login/)
  - [開発ガイドライン](https://developers.line.biz/ja/docs/line-login/development-guidelines/)

== Source Code =

distフォルダーにあるコードのソースコードは、srcフォルダーに格納されています。

== Changelog ==

= 1.0.4 = 

- 不具合の修正
  - 有効なリッチメニュー保存時に、リッチメニュー切り替えアクションが保存できない
  - 有効なリッチメニュー作成時に、Messaging APIでエラーが発生した場合に、下書きのリッチメニューが作成されてしまう
