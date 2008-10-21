<?php
/**
 * @category   Horde
 * @package    Support
 * @subpackage UnitTests
 * @copyright  2008 The Horde Project (http://www.horde.org/)
 * @license    http://opensource.org/licenses/bsd-license.php
 */

/**
 * @group      support
 * @category   Horde
 * @package    Support
 * @subpackage UnitTests
 * @copyright  2008 The Horde Project (http://www.horde.org/)
 * @license    http://opensource.org/licenses/bsd-license.php
 */
class Horde_Support_StubTest extends PHPUnit_Framework_TestCase
{
    public function testAnyOffsetIsGettable()
    {
        $stub = new Horde_Support_Stub;
        $oldTrackErrors = ini_set('track_errors', 1);
        $php_errormsg = null;
        $this->assertNull($stub->{uniqid()});
        $this->assertNull($php_errormsg);
    }

    public function testAnyMethodIsCallable()
    {
        $stub = new Horde_Support_Stub;
        $this->assertTrue(is_callable(array($stub, uniqid())));
    }

    public function testAnyStaticMethodIsCallable()
    {
        if (version_compare(PHP_VERSION, '5.3', '<')) {
            $this->markTestSkipped();
        }
        $this->assertTrue(is_callable(array('Horde_Support_Stub', uniqid())));
    }

}
