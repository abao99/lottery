<?php
header('Content-type:text/html;charset=uft-8');
/**
 * 命令模式
 */

/**
 * Interface Validator 命令接口
 */
interface Command
{
    /**
     * 有任何参数的方法
     * @param mixed
     * @return boolean
     */
    public function isValid($value);
}

/**
 * Class MoreThanZeroValidator 具体命令
 */
class ConcreteCommand implements Command
{
    /**
     * 实现验证方法
     *
     * @param $value
     *
     * @return bool
     */
    public function isValid($value)
    {
        // 大于0的数字
        return $value > 0;
    }
}

/**
 * Class ConcreteCommandTwo 具体命令2
 */
class ConcreteCommandTwo implements Command
{
    /**
     * 实现验证方法
     *
     * @param $value
     *
     * @return bool
     */
    public function isValid($value)
    {
        // 能被2整除的数字
        return $value % 2 == 0;
    }
}

/**
 * Class Invoker 调用者
 */
class Invoker
{
    protected $_rule;

    /**
     * 构造方法
     * 接收具体命令对象
     * Invoker constructor.
     *
     * @param Command $rule
     */
    public function __construct (Command $rule)
    {
        $this->_rule = $rule;
    }

    public function process(array $numbers)
    {
        foreach ($numbers as $n) {
            if ($this->_rule->IsValid($n)) {
                echo $n, "\n";
            }
        }
    }
}

/**
 * Class Client 客户端
 */
class Client {
    /**
     * 测试
     */
    public static function test()
    {
        $invoker = new Invoker(new ConcreteCommand());
        $invoker->process(array(-1,-4,-8,1, 10, 15, 20, 36, 48, 59,111));
        echo '<br>';
        $invoker = new Invoker(new ConcreteCommandTwo());
        $invoker->process(array(-1,-4,-8,1, 10, 15, 20, 36, 48, 59,111));
    }
}

// 执行测试
Client::test();