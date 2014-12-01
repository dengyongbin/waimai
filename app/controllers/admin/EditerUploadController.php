<?php

/**
 * Created by PhpStorm.
 * User: Jian
 * Date: 14-11-17
 * Time: 下午3:31
 */
class EditerUploadController extends AdminController
{

    function upload()
    {
        $config = array();
        $config['type'] = array("flash", "img"); //上传允许type值
        $config['img'] = array("jpg", "bmp", "gif"); //img允许后缀
        $config['flash'] = array("flv", "swf"); //flash允许后缀
        $config['flash_size'] = 200; //上传flash大小上限 单位：KB
        $config['img_size'] = 5000; //上传img大小上限 单位：KB
        $config['message'] = "上传成功"; //上传成功后显示的消息，若为空则不显示
        $config['flash_dir'] = "/ckeditor/upload/flash"; //上传flash文件地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
        $config['img_dir'] = "/ckeditor/upload/img"; //上传img文件地址 采用绝对地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
        $config['site_url'] = ""; //网站的网址 这与图片上传后的地址有关 最后不加"/" 可留空
        //判断是否是非法调用
        if (empty($_GET['CKEditorFuncNum']))
            $this->mkhtml(1, "", "错误的功能调用请求");
        $fn = $_GET['CKEditorFuncNum'];
        if (!in_array($_GET['type'], $config['type']))
            $this->mkhtml(1, "", "错误的文件调用请求");
        $type = $_GET['type'];
        if (is_uploaded_file($_FILES['upload']['tmp_name'])) {
            //判断上传文件是否允许
            $filearr = pathinfo($_FILES['upload']['name']);
            $filetype = $filearr["extension"];
            if (!in_array($filetype, $config[$type]))
                $this->mkhtml($fn, "", "错误的文件类型！");
            //判断文件大小是否符合要求
            if ($_FILES['upload']['size'] > $config[$type . "_size"] * 1024)
                $this->mkhtml($fn, "", "上传的文件不能超过" . $config[$type . "_size"] . "KB！");

            $qiniu = \Qiniu\Qiniu::create(array(
                'access_key' => Config::get('wm.qiniu_access_key'),
                'secret_key' => Config::get('wm.qiniu_secret_key'),
                'bucket' => Config::get('wm.qiniu_bucket')
            ));
            if ($_FILES['upload']) {
                $info = $qiniu->uploadFile($_FILES['upload']['tmp_name'], $_FILES['upload']['name']);
            }
            if ($info != null) {
                $this->mkhtml($fn, $info->data['url'], $config['message']);
            } else {
                $this->mkhtml($fn, "", "文件上传失败，请检查上传目录设置和目录读写权限");
            }

        }
    }

    //输出js调用
    function mkhtml($fn, $fileurl, $message)
    {
        $str = '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' . $fn . ', \'' . $fileurl . '\', \'' . $message . '\');</script>';
        exit($str);
    }
}