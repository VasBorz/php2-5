<?
include('BaseModel.php');

class M_User extends BaseModel
{
    //Authorization method
    public function auth($login, $pass)
    {
        if (!empty($login) || !empty($pass)) {
            return false;
        } else if (!preg_match("/^[-a-zA-Z0-9]*$/", $login)) {
            return false;
        }

        $user_vrf = htmlspecialchars($login);
        $sql = 'SELECT * FROM blog.users WHERE user_login=?;';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_vrf]);
        $result = $stmt->fetchAll();

        if ($result) {
            $pwd_hashed = password_hash($pass, PASSWORD_DEFAULT);
            $pwd_check = password_verify($pwd_hashed, $result['user_pwd']);
            if ($pwd_check === false) {
                return false;
            } else {
                return $result;
            }
        }

    }

    //Login method
    public function login($login,$pass){
        if ( $this->auth($login, $pass)){
            session_start();
            $_SESSION['user'] = $login;
            return true;
        }else{
            return false;
        }
    }

    //Logout Method
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        return true;
    }

    //Registration Method
    public function reg($login,$pass){
        if ($this->auth($login,$pass)){
            return false;
        }else{
            if (!preg_match("/^[-a-zA-Z0-9]*$/", $login)) {
                return false;
            }
            $pwdHashed = password_hash($pass, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO blog.users (user_login, user_pass) VALUES (?, ?);';
            $stmt = $this->connect()->prepare($sql);
            if ( $stmt->execute([$login, $pwdHashed])){
                return true;
            }else{
                return false;
            }
        }
    }
}