<?php
//dodatkowa klasa ktora dziedziczy po acces (roles)
// dodatkowa zmienna statyczna roles
// login dziedziczy po klasie pochodnej (access)
// logout tak SAMConnection
// dopisac metode getrole();
// potem w controlerach sprawdzać role
	namespace Tools;

	class Access extends Session
	{
		private static $login;
		private static $loginTime = 'logintime';
		private static $sessionTime = 900;

		//zaloguj
		public static function login($login)
		{
			//sprawdzenie istniej�cej sesji
			if(parent::check() === true)
			{
				//zmieniaj�c poziom dost�pu regenrerujemy sesj�
				parent::regenerate();
				parent::set(self::$login, $login);
				parent::set(self::$loginTime, time());
			}
		}
		//wyloguj
		public static function logout()
		{
			parent::clear(self::$login);
			parent::clear(self::$loginTime);
			parent::regenerate();
		}
		//sprawd� czy jest zalogowany
		public static function islogin()
		{
			if(parent::is(self::$login) === true)
			{

				if(time() > parent::get(self::$loginTime) + self::$sessionTime)
				{
					//przekroczono czas sesji, wyloguj
					self::logout();
					return false;
				}
				parent::set(self::$loginTime, time());
				return true;
			}
			return false;
		}

	}
