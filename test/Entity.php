<?php
//require_once("include/secucess.php");

/**
 * 名称：用户信息实体类
 * 作者：甄焱鲲 Shadow
 * 时间：2007年8月30日
 * 描述：设置和获取用户信息
 * 用法：$bizlogics = new userinfo();   echo "<br />" . $bizlogics->freezeid(1) ;
 */
class userinfo implements I_userinfo
{
    private $username;   //用户名
    private $userid;   //用户QQID
    private $userpic;   //用户头像图片
    private $userpoint;   //用户积分
    private $userleve;   //用户等级
    private $usernickname; //用户昵称
    private $usersex;   //用户性别
    private $userphone;   //用户电话号码
    private $userstate;   //用户帐号状态 0 正常 正数为封停 负数为申请封停
    private $userspeciality; //用户专长
    private $successId;

    /**
     * @return mixed
     */
    public function getSuccessId()
    {
        return $this->successId;
    }

    /**
     * @param mixed $successId
     */
    public function setSuccessId($successId)
    {
        $this->successId = $successId;
    }

//获取用户信息
    function get_username()
    {
        return $this->username;
    }

    function get_userid()
    {
        return $this->userid;
    }

    function get_userpic()
    {
        return $this->userpic;
    }

    function get_userpoint()
    {
        return $this->userpoint;
    }

    function get_userleve()
    {
        return $this->userleve;
    }

    function get_usernickname()
    {
        return $this->usernickname;
    }

    function get_usersex()
    {
        return $this->usersex;
    }

    function get_userphone()
    {
        return $this->userphone;
    }

    function get_userstate()
    {
        return $this->userstate;
    }

    function get_userspeciality()
    {
        return $this->userspeciality;
    }

//设置用户信息
    private function set_username($value)
    {
        $this->username = $value;
    }

    private function set_userid($value)
    {
        $this->userid = $value;
    }

    private function set_userpic($value)
    {
        $this->userpic = $value;
    }

    private function set_userpoint($value)
    {
        $this->userpoint = $value;
    }

    private function set_userleve($value)
    {
        $this->userleve = $value;
    }

    private function set_usernickname($value)
    {
        $this->usernickname = $value;
    }

    private function set_usersex($value)
    {
        $this->usersex = $value;
    }

    private function set_userphone($value)
    {
        $this->userphone = $value;
    }

    private function set_userstate($value)
    {
        $this->userstate = $value;
    }

    private function set_userspeciality($value)
    {
        $this->userspeciality = $value;
    }


    /**
     * 名称：构造函数
     * 描述：在实例化的时候利用构造函数初始化用户信息类的属性
     */
    function __construct()
    {
        //构造的时候必须初始化所有属性

        //取得用户的昵称和QQ号码
        $localinfo = $this->userinfo_comein();
        $this->set_username($localinfo['uname']);
        $this->set_userid($localinfo['uqq']);

        //初始化其他用户信息
        $mysqltool = new mysqldb();
        $sqlstr = "select * from UserMain where umid=1"; //测试内容 需要替换成利用接口获得的用户QQ号码然后进行查找
        $allstr = $mysqltool->getarray($sqlstr);
        $o = 0;
        foreach ($allstr[0] as $myrow) {
            if ($o === 1) {
                $this->set_username($myrow);
            } else if ($o === 2) {
                $this->set_usernickname($myrow);
            } else if ($o === 3) {
                $this->set_usersex($myrow);
            } else if ($o === 4) {
                $this->set_userphone($myrow);
            } else if ($o === 6) {
                $this->set_userspeciality($myrow);
            } else if ($o === 7) {
                $this->set_userpic($myrow);
            } else if ($o === 9) {
                $this->set_userstate($myrow);
            } else if ($o === 10) {
                $this->set_userleve($myrow);
            } else if ($o === 11) {
                $this->set_userpoint($myrow);
            }

            $o++;
        }
        //$this->set_userpic()

    }

    /**
     * 名称：析构函数
     * 功能：释放对象的属性
     *
     */
    function __destruct()
    {
        //析构函数释放用户信息
        $username = NULL;
        $userid = NULL;
        $userpic = NULL;
        $userpoint = NULL;
        $userleve = NULL;
        $usernickname = NULL;
        $usersex = NULL;
        $userphone = NULL;
        $userstate = NULL;
        $userspeciality = NULL;
    }

    /**
     * 名称：冻结帐号
     * 描述：将已经通过审批的帐号冻结
     *
     * @param用户QQ号码 $uid
     * @return   返回“true”代表操作成功，否则失败
     */
    function freezeid($uid)
    {
        $sqlstr = "update UserMain set Userstate=2 where UMID=1";
        $mysqltool = new mysqldb();
        $allstr = $mysqltool->del_modifiedrow($sqlstr);
        if ($allstr === 1) {
            return "true";
        } else {
            return "false";
        }
    }

    /**
     * 名称：提交需要冻结的帐号
     * 描述：为帐号冻结添加审核机制，很多时候直播员可以提交，但是由管理员审核方可封停。
     *
     * @param 用户的QQ号码 $uid
     * @return   返回“true”代表操作成功，否则失败
     */
    function freezeidsubmit($uid)
    {
        $sqlstr = "update UserMain set Userstate=-1 where UMID=1";
        $mysqltool = new mysqldb();
        $allstr = $mysqltool->del_modifiedrow($sqlstr);
        if ($allstr === 1) {
            return "true";
        } else {
            return "false";
        }
    }

    /**
     * 名称：帐号解冻
     * 描述：对已经封停的帐号解冻，由于此操作直接由管理员完成，不涉及审核。
     *
     * @param unknown_type $uid
     * @return unknown
     */
    function freeid($uid)
    {
        $sqlstr = "select * from UserMain";
        $mysqltool = new mysqldb();
        $allstr = $mysqltool->getstring($sqlstr, '&', '|');
        return $allstr;
    }

    /**
     * 名称：用户信息接口
     * 描述：利用外部接口取得用户当前登陆的QQ号码和昵称
     *
     * @return unknown
     */
    private function userinfo_comein()
    {
        $outarray = array('uname' => 'Shadow', 'uqq' => '123456');
        return $outarray;
    }
}

?>