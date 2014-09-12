<?php
class MY_Model extends CI_Model {
	function __construct()
	{
	  	parent::__construct();
	}
	/**
	 * 获取分页数据及总条数
	 * @param string @tablename 表名
	 * @param mixed $where 条件
	 * @param int $limit 每页条数
	 * @param int $offset 当前页
	 * @param string $order_by 排序字段
	 */
	public function get_page_data($tablename, $where, $limit, $offset, $order_by) {
	    if(empty($tablename)) {
	        return FALSE;
	    }
	    if($where) {
	        if(is_array($where)) {
	            $this->db->where($where);
	        } else {
	            $this->db->where($where, NULL, false);
	        }
	    }
	    if($limit) {
	        $dbhandle->limit($limit);
	    }
	    if($offset) {
	        $dbhandle->offset($offset);
	    }
	    if($order_by) {
	        $dbhandle->order_by($order_by);
	    }
	    $data = $dbhandle->get($tablename)->result_array();
	    return array('total' => $total, 'data' => $data);
	}

}