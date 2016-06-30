<?php
/**
 * PHP versions 5
 *
 *
 *
 * @category   %%project_category%%
 * @package    %%project_name%%
 * @subpackage %%subpackage_name%%
 * @author     %%your_name%% <%%your_email%%>
 * @copyright  %%your_project%%
 * @license    %%your_license%%
 * @version    GIT: $Id$
 * @link       %%your_link%%
 * @see        http://www.enviphp.net/c/man/v3/core/unittest
 * @since      File available since Release 1.0.0
 * @doc_ignore
 */


/**
 * @category   %%project_category%%
 * @package    %%project_name%%
 * @subpackage %%subpackage_name%%
 * @author     %%your_name%% <%%your_email%%>
 * @copyright  %%your_project%%
 * @license    %%your_license%%
 * @version    GIT: $Id$
 * @link       %%your_link%%
 * @see        http://www.enviphp.net/c/man/v3/core/unittest
 * @since      File available since Release 1.0.0
 * @doc_ignore
 */
class GitCmdExecuterTest extends testCaseBase
{
    protected $instance;

    public function initialize()
    {
        $this->instance = new \GitLive\Mock\GitCmdExecuter;
        $this->free();
    }
    /* ----------------------------------------- */


    public function fetchPullRequestTest()
    {
        $res = $this->instance->fetchPullRequest();

        $this->assertSame("git fetch upstream '+refs/pull/*:refs/remotes/pr/*'", $res);
    }


    public function createCmdTest()
    {
        $res = $this->call($this->instance, 'createCmd', array('pull', array('upstream', 'master')));

        $this->assertSame('git pull upstream master', $res);
    }

    public function tagTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('tag', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->tag(['--fooo', 'baaaa']);
        $this->assertSame('git tag --fooo baaaa', $res);
    }

    public function copyTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('clone', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->copy(['--fooo', 'baaaa']);
        $this->assertSame('git clone --fooo baaaa', $res);
    }
    public function remoteTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('remote', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->remote(['--fooo', 'baaaa']);
        $this->assertSame('git remote --fooo baaaa', $res);
    }
    public function statusTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('status', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->status(['--fooo', 'baaaa']);
        $this->assertSame('git status --fooo baaaa', $res);
    }
    public function diffTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('diff', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->diff(['--fooo', 'baaaa']);
        $this->assertSame('git diff --fooo baaaa', $res);
    }

    public function mergeTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('merge', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->merge('origin', ['--fooo', 'baaaa']);
        $this->assertSame('git merge --fooo baaaa origin', $res);
    }

    public function fetchTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('fetch', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->fetch(['--fooo', 'baaaa']);
        $this->assertSame('git fetch --fooo baaaa', $res);
    }

    public function checkoutTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('checkout', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->checkout('origin', ['--fooo', 'baaaa']);
        $this->assertSame('git checkout --fooo baaaa origin', $res);
    }
    public function branchTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('branch', ['--fooo', 'baaaa'])
        ->once()
        ->andNoBypass();

        $res = $instance->branch(['--fooo', 'baaaa']);
        $this->assertSame('git branch --fooo baaaa', $res);
    }
    public function pullTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('pull', ['origin', 'master'])
        ->once()
        ->andNoBypass();

        $res = $instance->pull('origin', 'master');
        $this->assertSame('git pull origin master', $res);
    }

    public function pushTest()
    {
        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('push', ['origin', 'master'])
        ->once()
        ->andNoBypass();

        $res = $instance->push('origin', 'master');
        $this->assertSame('git push origin master', $res);
    }
    public function tagPushTest()
    {
        $remote = 'origin';
        $cmd    = 'git push';
        $cmd .= ' '.$remote.' --tags';

        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('push', [$remote, '--tags'])
        ->once()
        ->andNoBypass();

        $res = $instance->tagPush($remote);
        $this->assertSame($cmd, $res);
    }

    public function logTest()
    {
        $option = 'hoge';
        $left   = 'asdfsadfsafa';
        $right  = 'juyioyuiyoyu';

        $cmd = 'git log --pretty=fuller --name-status '
            .$option.' '.$left.'..'.$right;

        $instance = EnviMockLight::mock('\GitLive\Mock\GitCmdExecuter', [], false);
        $instance->shouldReceive('createCmd')
        ->with('log', ['--pretty=fuller', '--name-status', $option, $left.'..'.$right])
        ->once()
        ->andNoBypass();

        $res = $instance->log($left, $right, $option);
        $this->assertSame($cmd, $res);
    }

    /**
     * +-- 終了処理
     *
     * @access public
     * @return void
     */
    public function shutdown()
    {
    }
}
