<?php
namespace App\Org;
//�Զ���ͼƬ������

class Image
{
   private $info = array(); //�������ͼƬ��Ϣ
   private $srcim = null; //������Ļ�����Դ
   private $dstim = null; //Ŀ�껭����Դ�������Ļ�����
    
   //��ʼ������
   public function open($pic)
   {
        $this->info = getimagesize($pic); //��ȡ�������ͼƬ��Ϣ
        //����ͼƬ���ͣ�ʹ�ö�Ӧ�ĺ�����������Դ��
        switch($this->info[2]){
            case 1: //gif��ʽ
                $this->srcim = imagecreatefromgif($pic);
                break;
            case 2: //jpeg��ʽ
                $this->srcim = imagecreatefromjpeg($pic);
                break;
            case 3: //png��ʽ
                $this->srcim = imagecreatefrompng($pic);
                break;
           default:
                throw new Exception("��Ч��ͼƬ��ʽ");
                break;
        }
        return $this;
   }
   
   //ִ�����ŷ���
   public function thumb($maxWidth,$maxHeight)
   {
        //��ȡԭͼƬ�Ŀ�͸�
        $width = $this->info[0];
        $height= $this->info[1];
        // �������ź��ͼƬ�ߴ�
        if($maxWidth/$width<$maxHeight/$height){
            $w = $maxWidth;
            $h = ($maxWidth/$width)*$height;
        }else{
            $w = ($maxHeight/$height)*$width;
            $h = $maxHeight;
        }
        //����Ŀ�껭��
        $this->dstim = imagecreatetruecolor($w,$h); 

        //5. ��ʼ�滭(����ͼƬ����)
        imagecopyresampled($this->dstim,$this->srcim,0,0,0,0,$w,$h,$width,$height);
        
        return $this;
   }
   
   //���Ϊ
   public function save($saveFile)
   {
        //���ͼ�����Ϊ
        switch($this->info[2]){
            case 1: //gif��ʽ
                imagegif($this->dstim,$saveFile);
                break;
            case 2: //jpeg��ʽ
                imagejpeg($this->dstim,$saveFile);
                break;
            case 3: //png��ʽ
                imagepng($this->dstim,$saveFile);
                break;
        }
   }
}