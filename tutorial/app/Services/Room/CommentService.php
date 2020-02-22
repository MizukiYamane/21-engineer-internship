<?php

//このファイルの場所
namespace  App\Services\Room;

//使うファイルのディレクトリ
use App\Models\_common\CategoryData;
use App\Models\_common\RoomData;
use App\Models\_common\UserData;
use App\Models\_common\CommentData;

//このファイルのクラス名と役割
class CommentService
{
    protected $_category;
    protected $_room;
    protected $_user;
    protected $_comment;

    //全体で使う変数等を定義
    public function __construct(
        CategoryData $category,
        RoomData $room,
        UserData $user,
        CommentData $comment
    )
    {
        $this->_category = $category;
        $this->_room = $room;
        $this->_user = $user;
        $this->_comment = $comment;
    }

    //コメントを投稿
    public function postNewComment($param)
    {
        //ユーザーIDを取得
        $param['user_id'] = \Auth::guard('user')->Id();
        //コメントを投稿
        $result = $this->_comment->postNewComment($param);

        return $result;
    }

    //コメントを編集
    public function editComment($param)
    {
        //ユーザーIDを取得
        $param['user_id'] = \Auth::guard('user')->Id();
        //コメントを編集
        $result = $this->_comment->updateComment($param);

        return $result;
    }

    //コメントを削除
    public function deleteComment($param)
    {
        //ユーザーIDを取得
        $param['user_id'] = \Auth::guard('user')->Id();
        //check userflag_1
        $param['user_flag1_auth'] = $this->_user->getUserAdminData($param['user_id']);
        
        //if authorized
        if($param['user_flag1_auth']['user_flag1']==1){
            $param['user_id'] = $this->_user->getUserInfoFromCommentId($param['comment_id']);
            $result = $this->_comment->deleteCommentAuth($param);
        }
            //preDump($param,1);
            
        
        //コメントを削除
        else {$result = $this->_comment->deleteComment($param);}

        return $result;
    }
}
