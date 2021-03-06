<?php
// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile


use \Codeception\Maybe;
use Codeception\Module\CodeHelper;

/**
 * Inherited methods
 * @method void execute($callable)
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void offsetGet($offset)
 * @method void offsetSet($offset, $value)
 * @method void offsetExists($offset)
 * @method void offsetUnset($offset)
*/

class CodeGuy extends \Codeception\AbstractGuy
{
    
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
     * @see Codeception\Module\CodeHelper::runCommand()
     * @return \Codeception\Maybe
     */
    public function runCommand($cmd) {
        $this->scenario->addStep(new \Codeception\Step\Action('runCommand', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }

 
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
    * Conditional Assertion: Test won't be stopped on fail
     * @see Codeception\Module\CodeHelper::seeFile()
     * @return \Codeception\Maybe
     */
    public function canSeeFile($path) {
        $this->scenario->addStep(new \Codeception\Step\ConditionalAssertion('seeFile', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
     * @see Codeception\Module\CodeHelper::seeFile()
     * @return \Codeception\Maybe
     */
    public function seeFile($path) {
        $this->scenario->addStep(new \Codeception\Step\Assertion('seeFile', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }

 
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
    * Conditional Assertion: Test won't be stopped on fail
     * @see Codeception\Module\CodeHelper::seeFiles()
     * @return \Codeception\Maybe
     */
    public function canSeeFiles($paths) {
        $this->scenario->addStep(new \Codeception\Step\ConditionalAssertion('seeFiles', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
     * @see Codeception\Module\CodeHelper::seeFiles()
     * @return \Codeception\Maybe
     */
    public function seeFiles($paths) {
        $this->scenario->addStep(new \Codeception\Step\Assertion('seeFiles', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }

 
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
    * Conditional Assertion: Test won't be stopped on fail
     * @see Codeception\Module\CodeHelper::seeDirectory()
     * @return \Codeception\Maybe
     */
    public function canSeeDirectory($path) {
        $this->scenario->addStep(new \Codeception\Step\ConditionalAssertion('seeDirectory', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
     * @see Codeception\Module\CodeHelper::seeDirectory()
     * @return \Codeception\Maybe
     */
    public function seeDirectory($path) {
        $this->scenario->addStep(new \Codeception\Step\Assertion('seeDirectory', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }

 
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
     * @see Codeception\Module\CodeHelper::removeDir()
     * @return \Codeception\Maybe
     */
    public function removeDir($path) {
        $this->scenario->addStep(new \Codeception\Step\Action('removeDir', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }

 
    /**
     * This method is generated.
     * Documentation taken from corresponding module.
     * ----------------------------------------------
     *
     *
     * @see Codeception\Module::getName()
     * @return \Codeception\Maybe
     */
    public function getName() {
        $this->scenario->addStep(new \Codeception\Step\Action('getName', func_get_args()));
        if ($this->scenario->running()) {
            $result = $this->scenario->runStep();
            return new Maybe($result);
        }
        return new Maybe();
    }
}

