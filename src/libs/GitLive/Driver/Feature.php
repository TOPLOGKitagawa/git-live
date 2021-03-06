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
class Feature extends DriverBase
{


    /**
     * +-- featureを実行する
     *
     * @access      public
     * @return void
     */
    public function feature()
    {
        $argv = $this->getArgv();
        $this->GitCmdExecuter->fetch(array('upstream'));
        $this->GitCmdExecuter->fetch(array('-p', 'upstream'));
        // $this->enableRelease();
        if (!isset($argv[2])) {
            $this->Driver('Help')->help();

            return;
        }

        switch ($argv[2]) {
        case 'start':
            if (!isset($argv[3])) {
                $this->Driver('Help')->help();

                return;
            }

            $this->featureStart($argv[3]);
        break;
        case 'publish':
            $this->featurePublish(isset($argv[3]) ? $argv[3] : null);
        break;
        case 'push':
            $this->featurePush(isset($argv[3]) ? $argv[3] : null);
        break;
        case 'close':
            $this->featureClose(isset($argv[3]) ? $argv[3] : null);
        break;
        case 'track':
            if (!isset($argv[3])) {
                $this->Driver('Help')->help();

                return;
            }

            $this->featureTrack($argv[3]);
        break;
        case 'pull':
            $this->featurePull(isset($argv[3]) ? $argv[3] : null);
        break;

        default:
            $this->Driver('Help')->help();
        break;
        }
    }

    /* ----------------------------------------- */

    /**
     * +-- featureを開始する
     *
     *
     * @access      public
     * @param  var_text $repository
     * @return void
     */
    public function featureStart($repository)
    {
        $this->GitCmdExecuter->fetch(array('--all'));
        if (strpos($repository, 'feature/') !== 0) {
            $repository = 'feature/'.$repository;
        }

        $this->GitCmdExecuter->checkout('upstream/develop');
        $this->GitCmdExecuter->checkout($repository, array('-b'));
    }

    /* ----------------------------------------- */

    /**
     * +-- 共用Repositoryにfeatureを送信する
     *
     * @access      public
     * @param  var_text $repository OPTIONAL:NULL
     * @return void
     */
    public function featurePublish($repository = null)
    {
        $this->GitCmdExecuter->fetch(array('--all'));
        if ($repository === null) {
            $repository = $this->getSelfBranch();
        } elseif (strpos($repository, 'feature/') !== 0) {
            $repository = 'feature/'.$repository;
        }

        $this->GitCmdExecuter->push('upstream', $repository);
    }

    /* ----------------------------------------- */

    /**
     * +-- 自分のリモートRepositoryにfeatureを送信する
     *
     * @access      public
     * @param  var_text $repository OPTIONAL:NULL
     * @return void
     */
    public function featurePush($repository = null)
    {
        if ($repository === null) {
            $repository = $this->getSelfBranch();
        } elseif (strpos($repository, 'feature/') !== 0) {
            $repository = 'feature/'.$repository;
        }

        $this->GitCmdExecuter->push('origin', $repository);
    }

    /* ----------------------------------------- */

    /**
     * +-- 共用Repositoryから他人のfeatureを取得する
     *
     * @access      public
     * @param  var_text $repository
     * @return void
     */
    public function featureTrack($repository)
    {
        if (strpos($repository, 'feature/') !== 0) {
            $repository = 'feature/'.$repository;
        }

        $self_repository = $this->getSelfBranch();
        $this->GitCmdExecuter->pull('upstream', $repository);

        if ($self_repository !== $repository) {
            $this->GitCmdExecuter->checkout($repository);
        }
    }
    /* ----------------------------------------- */

    /**
     * +-- 共用Repositoryからpullする
     *
     * @access      public
     * @param  var_text $repository OPTIONAL:NULL
     * @return void
     */
    public function featurePull($repository = null)
    {
        if ($repository === null) {
            $repository = $this->getSelfBranch();
        } elseif (strpos($repository, 'feature/') !== 0) {
            $repository = 'feature/'.$repository;
        }

        $this->GitCmdExecuter->pull('upstream', $repository);
    }

    /* ----------------------------------------- */

    /**
     * +-- featureを閉じる
     *
     * @access      public
     * @param  var_text $repository OPTIONAL:NULL
     * @return void
     */
    public function featureClose($repository = null)
    {
        $this->GitCmdExecuter->fetch(array('--all'));
        if ($repository === null) {
            $repository = $this->getSelfBranch();
        } elseif (strpos($repository, 'feature/') !== 0) {
            $repository = 'feature/'.$repository;
        }

        $this->GitCmdExecuter->push('upstream', ':'.$repository);
        $this->GitCmdExecuter->push('origin', ':'.$repository);
        $this->GitCmdExecuter->checkout('develop');
        $this->GitCmdExecuter->branch(array('-D', $repository));
    }

    /* ----------------------------------------- */
}
