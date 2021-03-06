<?php
/*
*
*
*策略模式：定义一个算法族(继承/实现的同一个抽象类/接口)，同一族的算法(具体的类)可以相互替换，算法的改变不影响客户的使用。
*
*没有setter的策略模式，直接在构造方法中指定算法。
*
*主要元素：
*客户类:Tom
*	构造方法:定义weapon的具体对象
*	属性weapon:持有实现Weapon接口的一个对象
*	方法fight:把行为委托给Weapon对象的fight方法执行
*算法族:Weapon接口
*	具体的实现类:NilWeapon,Knife,Fork
*
*
*如示例Test所示，NilWeapon,Knife,Fork这3个算法可以互相替换，使用中，当需要更换算法时，我们完全可以不用修改Tom这个客户类，只要在实例化时赋予
*不同的算法即可。因为没有setter，Tom类在实例化后持有的weapon无法动态改变，所以下一节提供了具有setter的示例。
*
*
*/
class Character
{
	protected $weapon;

	public function fight()
	{
		$this->weapon->fight();
	}
}

interface Weapon
{
	public function fight();
}

class Tom extends Character
{
	public function __construct(Weapon $weapon)
	{
		$this->weapon = $weapon;
	}
}



class Knife implements Weapon
{
	public function fight()
	{
		echo "This is Knife!<br>\n";
	}
}

class Fork implements Weapon
{
	public function fight()
	{
		echo "This is Fork!<br>\n";
	}
}

class NilWeapon implements Weapon
{
	public function fight()
	{
		echo "No Weapon!<br>\n";
	}
}


class Test
{
	public function run()
	{
		$noWeapon = new NilWeapon();
		$knife = new Knife();
		$fork = new Fork();

		$tomA = new Tom($noWeapon);
		$tomA->fight();

		$tomB = new Tom($knife);
		$tomB->fight();

		$tomC = new Tom($fork);
		$tomC->fight();
	}
}

$test = new Test();

$test->run();