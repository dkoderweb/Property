<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportFilter;
use Auth;

class FilterController extends Controller
{
    public function deletefilters(Request $request){
        $input = $request->all();
        $delete = ReportFilter::where('id',$input['id'])->delete();
        return $delete;
    }
    public function savefilters(Request $request){
        $input = $request->all();
        $input['user_id'] = Auth::id(); 

        $insert = new ReportFilter;
        $insert->report_name = $input['report_name'];
        $insert->number_filters = $input['number_filters'];   
        $insert->from_balance = $input['from_balance'];  
        $insert->number_filters_2 = isset($input['number_filters_2']) ? $input['number_filters_2'] : '';   
        $insert->number_filters_2_name = isset($input['number_filters_2_name']) ? $input['number_filters_2_name'] : '';
        $insert->from_balance_2 = isset($input['from_balance_2']) ? $input['from_balance_2'] : '';   
        $insert->select_columns_2_name = isset($input['select_columns_2_name']) ? $input['select_columns_2_name'] : '';
        $insert->select_columns_text = $input['select_columns_text'];   
        $insert->number_filters_name = $input['number_filters_name'];
        $insert->select_columns_name = $input['select_columns_name'];
        $insert->select_operator = isset($input['select_operator']) ? $input['select_operator'] : '';
        $insert->select_columns_2_text = isset($input['select_columns_2_text']) ? $input['select_columns_2_text'] : '';  
        $insert->select_operator_text = isset($input['select_operator_text']) ? $input['select_operator_text'] : '';  
    
        $insert->number_filters_3 = isset($input['number_filters_3']) ? $input['number_filters_3'] : '';   
        $insert->select_columns_3_name = isset($input['select_columns_3_name']) ? $input['select_columns_3_name'] : '';   
        $insert->select_columns_3_text = isset($input['select_columns_3_text']) ? $input['select_columns_3_text'] : '';   
        $insert->number_filters_3 = isset($input['number_filters_3']) ? $input['number_filters_3'] : '';   
        $insert->number_filters_3_name = isset($input['number_filters_3_name']) ? $input['number_filters_3_name'] : '';   
        $insert->from_balance_3 = isset($input['from_balance_3']) ? $input['from_balance_3'] : '';   
        $insert->select_operator_3 = isset($input['select_operator_3']) ? $input['select_operator_3'] : '';  
        $insert->select_operator_3_text = isset($input['select_operator_3_text']) ? $input['select_operator_3_text'] : '';   
    
        $insert->number_filters_4 = isset($input['number_filters_4']) ? $input['number_filters_4'] : '';
        $insert->select_columns_4_name = isset($input['select_columns_4_name']) ? $input['select_columns_4_name'] : '';   
        $insert->select_columns_4_text = isset($input['select_columns_4_text']) ? $input['select_columns_4_text'] : '';   
        $insert->number_filters_4 = isset($input['number_filters_4']) ? $input['number_filters_4'] : '';   
        $insert->number_filters_4_name = isset($input['number_filters_4_name']) ? $input['number_filters_4_name'] : '';   
        $insert->from_balance_4 = isset($input['from_balance_4']) ? $input['from_balance_4'] : '';   
        $insert->select_operator_4 = isset($input['select_operator_4']) ? $input['select_operator_4'] : '';  
        $insert->select_operator_4_text = isset($input['select_operator_4_text']) ? $input['select_operator_4_text'] : '';
    
        $insert->number_filters_5 = isset($input['number_filters_5']) ? $input['number_filters_5'] : '';    
        $insert->select_columns_5_name = isset($input['select_columns_5_name']) ? $input['select_columns_5_name'] : '';   
        $insert->select_columns_5_text = isset($input['select_columns_5_text']) ? $input['select_columns_5_text'] : '';   
        $insert->number_filters_5 = isset($input['number_filters_5']) ? $input['number_filters_5'] : '';   
        $insert->number_filters_5_name = isset($input['number_filters_5_name']) ? $input['number_filters_5_name'] : '';   
        $insert->from_balance_5 = isset($input['from_balance_5']) ? $input['from_balance_5'] : '';   
        $insert->select_operator_5 = isset($input['select_operator_5']) ? $input['select_operator_5'] : '';  
        $insert->select_operator_5_text = isset($input['select_operator_5_text']) ? $input['select_operator_5_text'] : '';  
    
        $insert->user_id = $input['user_id']; 
        $insert->save(); 
        
        return $insert;
    }
}
