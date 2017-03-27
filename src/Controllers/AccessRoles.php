<?php
	namespace Controllers;

  class AccessRoles extends Controller
  {
		//wyświetla formularz do logowania
		public function logform($result = null)
		{
			$view=$this->getView('AccessRoles');
			$view->logform($result);
		}
		//zalogowuje do systemu
		public function login()
		{
			$model=$this->getModel('AccessRoles');
			$result = $model->login($_POST['login'],md5($_POST['password']));
			//if($result === 0)
			if($result['error'] ==="")
				$this->redirect('');
			else
				$this->logform($result);
		}

		//wylogowuje z systemu
		public function logout()
		{
			$model=$this->getModel('AccessRoles');
			$model->logout();
			$this->redirect('');
		}
  }
  ?>
