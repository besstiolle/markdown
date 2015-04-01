<?php

final class forge_smarty_plugins
{
    protected function __construct() {}

    public static function smarty_is_project_admin($params,$smarty) {
        /*$db = \cge_utils::get_db();
        $obj = cge_utils::get_module('CGExtensions');

        $query = 'SELECT * FROM '.CGEXTENSIONS_TABLE_STATES.' ORDER BY sorting DESC,name ASC';
        $tmp = $db->GetAll($query);
        $output = '';
        if( isset($params['selectone']) ) $output .= '<option value="">'.trim($params['selectone'])."</option>\n";
        foreach( $tmp as $row ) {
            $output .= "<option value=\"{$row['code']}\"";
            if( isset($params['selected']) && $params['selected'] == $row['code'] ) $output .= ' selected="selected"';
            $output .= ">{$row['name']}</option>\n";
        }
        return $output;*/

        //print_r($smarty->get_template_vars('project'));

        $project = $params['project'];
        $user_id = $params['user_id'];
        $assign = $params['assign'];

        if(empty($project) || empty($user_id) || empty($assign)){
            if(empty($project)){
                echo '<p>PARAMETER $project was null in {fg_is_project_admin}</p>';
            }
           /* if(empty($user_id)){
                echo '<p>PARAMETER $user_id was null in {fg_is_project_admin}</p>';
            }*/
            if(empty($assign)){
                echo '<p>PARAMETER $assign was null in {fg_is_project_admin}</p>';
            }
            $smarty->assign($assign, false);
            return;
        }

        $smarty->assign($assign, forge_utils::is_project_admin($project, $user_id));
    }
    public static function smarty_is_project_m($params,$smarty) {
        return forge_smarty_plugins::smarty_is_project_admin($params,$smarty);
        $project = $params['project'];
        $user_id = $params['user_id'];
        $assign = $params['assign'];

        if(empty($project) || empty($user_id) || empty($assign)){
            if(empty($project)){
                echo '<p>PARAMETER $project was null in {fg_is_project_admin}</p>';
            }
           /* if(empty($user_id)){
                echo '<p>PARAMETER $user_id was null in {fg_is_project_admin}</p>';
            }*/
            if(empty($assign)){
                echo '<p>PARAMETER $assign was null in {fg_is_project_admin}</p>';
            }
            $smarty->assign($assign, false);
            return;
        }

        $smarty->assign($assign, forge_utils::is_project_member($project, $user_id));
    }
}