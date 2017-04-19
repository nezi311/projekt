<?php
namespace Tools;
class AccessRoles extends Session
{
  // ** Dawid Dominiak **//
  private static $login='login';
  private static $loginTime = 'logintime';
  private static $sessionTime = 1200;
  private static $role="role";
  private static $id="id";

  //zaloguj
  public static function login($login,$role,$id)
  {
    //sprawdzenie istniej�cej sesji
    if(parent::check() === true)
    {
      //zmieniaj�c poziom dost�pu regenrerujemy sesj�
      parent::regenerate();
      //parent::set(self::$login, $login);
      parent::set(self::$login, $login);
      parent::set(self::$loginTime, time());
      parent::set(self::$role,$role);
      parent::set(self::$id,$id);

    }
  }
  //wyloguj
  public static function logout()
  {
    parent::clear(self::$login);
    parent::clear(self::$loginTime);
    parent::clear(self::$role);
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

  public static function getRole()
  {
    return parent::get($role);
  }
}

?>
