<?php

class Gen_ed_model extends CI_Model
{
    function get_gen_ed($cat_nums)
    {
        $gen_eds = $this->db
                ->select('cat_num, category')
                ->from('gen_ed')
                ->where_in('cat_num', $cat_nums)
                ->get()->result();
                
        // group tags by tweet id
        $result = array();
        foreach ($gen_eds as $gen_ed)
        {
            $result[$gen_ed->cat_num][] = $gen_ed->category;
       }        

        return $result;
    }        

   function gen_ed_options()
   {
       $rows = $this->db->select('category')
               ->from('gen_ed')
               ->get()->result();
       
       $gen_ed_options = array('' => '');
       foreach ($rows as $row)
       {
           $gen_ed_options[$row->category] = $row->category;
       }
       
       return $gen_ed_options;
       
   }
   
}
