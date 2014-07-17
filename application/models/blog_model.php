<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	/************************后台方法***************************************/
	//添加到数据库
	public function add($arr)
	{
	   //无需加表前缀
		$this->db->insert('blog',$arr);
	}
	//查看文章
	public function check()
	{
	   //返回数组
		$arr=$this->db->get('blog')->result_array();
		return $arr;
	}
    //查看某篇文章
	public function check_u($a_id)
	{
		//查询数组 于column表 并返回数组 
		//指定gc_id 指定表 获得该行 
	     $arr=$this->db->where(array('a_id'=>$a_id))->get('blog')->result_array();
	     return $arr;
	}
	//编辑文章
	public function update($a_id,$data)
	{
		//表 修改参数 指定行
	    $this->db->update('blog',$data,array('a_id'=>$a_id));
	}
	//删除文章
	public function delete($a_id)
	{
		//表 指定行
	     $this->db->delete('blog',array('a_id'=>$a_id));
	}
	/************************前台方法***************************************/
	public function blog_check()
	{
		//限制显示的标题数目 （暂时没限制）
		$arr=$this->db->select('a_id,a_title,a_info,a_thumb,a_time')->order_by('a_time','desc')
		->get('blog')->result_array();
		return $arr;
	}
    //搜索查询数据库
	public function search($text)
	{
       $data=$this->db->select('a_id,a_title,a_info,a_time')->like('a_info',$text)->get('blog')->result_array();
       return $data;
	}
	//搜索一条数据返回给首页
	public function send_article()
	{
		//返回数组
<<<<<<< .mine
		$arr=$this->db->select('a_id,a_title,a_info,a_thumb,a_time')->order_by('a_time','desc')
		->get('blog')->result_array();
=======
		$arr=$this->db->select('a_id,a_title,a_info,a_time')->order_by('a_time','desc')
		->limit(1)->get('blog')->result_array();
>>>>>>> .r555
		return $arr;
<<<<<<< .mine
	}//->limit(1)
=======
       
	}
>>>>>>> .r555
}