<?php
/**
 * @category   GitCommand
 * @package    Git-Live
 * @subpackage Core
 * @author     akito<akito-artisan@five-foxes.com>
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright Project Git Live
 * @license MIT
 * @version    GIT: $Id$
 * @link https://github.com/Git-Live/git-live
 * @see https://github.com/Git-Live/git-live
 * @since      Class available since Release 1.0.0
 */
namespace GitLive\Driver;

/**
 * @category   GitCommand
 * @package    Git-Live
 * @subpackage Core
 * @author     akito<akito-artisan@five-foxes.com>
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright Project Git Live
 * @license MIT
 * @version    GIT: $Id$
 * @link https://github.com/Git-Live/git-live
 * @see https://github.com/Git-Live/git-live
 * @since      Class available since Release 1.0.0
 */
class Help extends DriverBase
{

    /**
     * +-- バージョン表示
     *
     * @access      public
     * @return void
     * @codeCoverageIgnore
     */
    public function version()
    {
        $this->ncecho('Git Live version '.self::VERSION."\n");
    }

    /* ----------------------------------------- */


    /**
     * +-- ヘルプの表示
     *
     * @access      public
     * @return void
     * @codeCoverageIgnore
     */
    public function help()
    {
        $indent = '    ';
        $this->ncecho('Git Live version '.self::VERSION."\n");
        $this->ncecho("NAME\n");
        $this->ncecho("{$indent}{$indent}git-live - "._('安全で効率的な、リポジトリ運用をサポートします。')."\n");
        $this->ncecho("SYNOPSIS\n");
        $this->ncecho("{$indent}{$indent}git live feature start <feature name>\n");
        $this->ncecho("{$indent}{$indent}git live feature publish\n");
        $this->ncecho("{$indent}{$indent}git live feature track\n");
        $this->ncecho("{$indent}{$indent}git live feature push\n");
        $this->ncecho("{$indent}{$indent}git live feature pull\n");
        $this->ncecho("{$indent}{$indent}git live feature close\n");

        $this->ncecho("{$indent}{$indent}git live pr track\n");
        $this->ncecho("{$indent}{$indent}git live pr pull\n");
        $this->ncecho("{$indent}{$indent}git live pr merge\n");

        $this->ncecho("{$indent}{$indent}git live hotfix open <release name>\n");
        $this->ncecho("{$indent}{$indent}git live hotfix close\n");
        $this->ncecho("{$indent}{$indent}git live hotfix sync\n");
        $this->ncecho("{$indent}{$indent}git live hotfix state\n");
        $this->ncecho("{$indent}{$indent}git live hotfix track\n");
        $this->ncecho("{$indent}{$indent}git live hotfix pull\n");
        $this->ncecho("{$indent}{$indent}git live hotfix push\n");

        $this->ncecho("{$indent}{$indent}git live release open <release name>\n");
        $this->ncecho("{$indent}{$indent}git live release close\n");
        $this->ncecho("{$indent}{$indent}git live release sync\n");
        $this->ncecho("{$indent}{$indent}git live release state\n");
        $this->ncecho("{$indent}{$indent}git live release track\n");
        $this->ncecho("{$indent}{$indent}git live release pull\n");
        $this->ncecho("{$indent}{$indent}git live release push\n");

        $this->ncecho("{$indent}{$indent}git live pull\n");
        $this->ncecho("{$indent}{$indent}git live push\n");
        $this->ncecho("{$indent}{$indent}git live update\n");

        $this->ncecho("{$indent}{$indent}git live merge develop\n");
        $this->ncecho("{$indent}{$indent}git live merge master\n");

        $this->ncecho("{$indent}{$indent}git live log develop\n");
        $this->ncecho("{$indent}{$indent}git live log master\n");

        $this->ncecho("{$indent}{$indent}git live init\n");
        $this->ncecho("{$indent}{$indent}git live start\n");
        $this->ncecho("{$indent}{$indent}git live restart\n");

        $this->ncecho("OPTIONS\n");
        $this->ncecho("{$indent}{$indent}feature start <feature name>\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("新たな開発用ブランチを'upstream'(共通リモートサーバー)の'develop'ブランチをベースとして作成し、開発用ブランチにスイッチします。")."\n");
        $this->ncecho("{$indent}{$indent}feature publish\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("複数人と同じ開発ブランチで作業するとき、自分の変更分を'upstream'(共通リモートサーバー)にプッシュします。")."\n");
        $this->ncecho("{$indent}{$indent}feature track <feature name>\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("'upstream'(共通リモートサーバー)から、誰かが作成した開発用ブランチを取得します。")."\n");
        $this->ncecho("{$indent}{$indent}feature push\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("'origin'(個人用リモートサーバー)に開発ブランチをpushします。(git live pushと動作は似ています)")."\n");
        $this->ncecho("{$indent}{$indent}feature pull\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("'origin'(個人用リモートサーバー)から開発ブランチをpullします。(git live pullと動作は似ています)")."\n");
        $this->ncecho("{$indent}{$indent}feature close\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('すべての場所から、開発ブランチを削除します。プルリクエストがマージされたあとに実行してください。')."\n");

        $this->ncecho("{$indent}{$indent}pr track <pull request number>\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("'upstream'(共通リモートサーバー)からプルリクエストされているコードを取得します。")."\n");
        $this->ncecho("{$indent}{$indent}pr pull \n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('pr trackしたプルリクエストの内容を最新化')."\n");
        $this->ncecho("{$indent}{$indent}pr merge <pull request number>\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('プルリクエストの内容をマージする。')."\n");

        $this->ncecho("{$indent}{$indent}hotfix open <release name>\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("緊急対応のため、'upstream'(共通リモートサーバー)の'master'ブランチからhotfixを開始します。")."\n");
        $this->ncecho("{$indent}{$indent}hotfix close\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("hotfixを終了し、'master'と'develop'にコードをマージし、タグを作成します。")."\n");
        $this->ncecho("{$indent}{$indent}hotfix sync\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('git live hotfix pullとgit live hotfix pushを連続で実行します。')."\n");
        $this->ncecho("{$indent}{$indent}hotfix state\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('hotfixの状態を確認します。')."\n");
        $this->ncecho("{$indent}{$indent}hotfix track\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('誰かが開けたhotfixを取得します。')."\n");
        $this->ncecho("{$indent}{$indent}hotfix pull\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("'deploy'(デプロイ用リモートサーバー)と'upstream'(共通リモートサーバー)からpullします。")."\n");
        $this->ncecho("{$indent}{$indent}hotfix push\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("'deploy'(デプロイ用リモートサーバー)と'upstream'(共通リモートサーバー)にpushします。")."\n");

        $this->ncecho("{$indent}{$indent}release open <release name>\n");
        $this->ncecho("{$indent}{$indent}{$indent}{$indent}"._('リリース作業を開始するため、release用のブランチを作成します。')."\n");
        $this->ncecho("{$indent}{$indent}release close\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("releaseを終了し、'master'と'develop'にコードをマージし、タグを作成します。")."\n");
        $this->ncecho("{$indent}{$indent}release sync\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('git live release pullとgit live release pushを連続で実行します。')."\n");
        $this->ncecho("{$indent}{$indent}release state\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('releaseの状態を確認します。')."\n");
        $this->ncecho("{$indent}{$indent}release pull\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("'deploy'(デプロイ用リモートサーバー)と'upstream'(共通リモートサーバー)からpullします。")."\n");
        $this->ncecho("{$indent}{$indent}release push\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._("'deploy'(デプロイ用リモートサーバー)と'upstream'(共通リモートサーバー)にpushします。")."\n");

        $this->ncecho("{$indent}{$indent}pull\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('適当な場所から、pullします。')."\n");
        $this->ncecho("{$indent}{$indent}push\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('適当な場所に、pushします。')."\n");
        $this->ncecho("{$indent}{$indent}update\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('git-liveコマンドの最新化。')."\n");
        $this->ncecho("{$indent}{$indent}merge develop\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('developから現在選択されているブランチに変更を取り込みます。')."\n");
        $this->ncecho("{$indent}{$indent}merge master\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('masterから現在選択されているブランチに変更を取り込みます。')."\n");

        $this->ncecho("{$indent}{$indent}log develop\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('developとのdiff')."\n");
        $this->ncecho("{$indent}{$indent}log master\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('masterとのdiff')."\n");

        $this->ncecho("{$indent}{$indent}start\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('初期化します。')."\n");
        $this->ncecho("{$indent}{$indent}restart\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('リポジトリを再構築します。')."\n");

        $this->ncecho("{$indent}{$indent}init\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('git live で管理するリポジトリを対話形式で作成します。')."\n");

        $this->ncecho("{$indent}{$indent}init <clone_repository> <upstream_repository> <deploy_repository> (<clone_dir>)\n");
        $this->ncecho("{$indent}{$indent}{$indent}"._('git live で管理するリポジトリを作成します。')."\n");
        $this->ncecho("{$indent}{$indent}{$indent}".'clone_repository：'."\n");
        $this->ncecho("{$indent}{$indent}{$indent}{$indent}"._('個人開発用のリモートリポジトリ(origin)。')."\n");
        $this->ncecho("{$indent}{$indent}{$indent}".'upstream_repository：'."\n");
        $this->ncecho("{$indent}{$indent}{$indent}{$indent}"._('originのfork元、共有のリモートリポジトリ(upstream)。')."\n");
        $this->ncecho("{$indent}{$indent}{$indent}".'deploy_repository：'."\n");
        $this->ncecho("{$indent}{$indent}{$indent}{$indent}"._('デプロイ用リポジトリ。')."\n");
        $this->ncecho("{$indent}{$indent}{$indent}".'clone_dir：'."\n");
        $this->ncecho("{$indent}{$indent}{$indent}{$indent}"._('cloneするローカルのディレクトリ。')."\n");
    }

    /* ----------------------------------------- */
}
