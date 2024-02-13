<?php

function applyConditions($item, $input, $string_columns) {
    $column = $input['select_columns'];
    $filter = $input['number_filters'];
    $val = $input['from_balance'];

    $column2 = isset($input['select_columns_2']) ? $input['select_columns_2'] : '';
    $filter2 = isset($input['number_filters_2']) ? $input['number_filters_2'] : '';
    $val2 = isset($input['from_balance_2']) ? $input['from_balance_2'] : '';
    $operator = isset($input['select_operator']) ? $input['select_operator'] : '';

    $column3 = isset($input['select_columns_3']) ? $input['select_columns_3'] : '';
    $filter3 = isset($input['number_filters_3']) ? $input['number_filters_3'] : '';
    $val3 = isset($input['from_balance_3']) ? $input['from_balance_3'] : '';
    $operator_3 = isset($input['select_operator_3']) ? $input['select_operator_3'] : '';

    $column4 = isset($input['select_columns_4']) ? $input['select_columns_4'] : '';
    $filter4 = isset($input['number_filters_4']) ? $input['number_filters_4'] : '';
    $val4 = isset($input['from_balance_4']) ? $input['from_balance_4'] : '';
    $operator_4 = isset($input['select_operator_4']) ? $input['select_operator_4'] : '';

    $column5 = isset($input['select_columns_5']) ? $input['select_columns_5'] : '';
    $filter5 = isset($input['number_filters_5']) ? $input['number_filters_5'] : '';
    $val5 = isset($input['from_balance_5']) ? $input['from_balance_5'] : '';
    $operator_5 = isset($input['select_operator_5']) ? $input['select_operator_5'] : '';

   return $s_item = array_values(array_filter($item, function ($sales_res) use($column,$filter,$val,$column2,$filter2,$val2,$operator,$column3,$filter3,$val3,$operator_3,$column4,$filter4,$val4,$operator_4,$column5,$filter5,$val5,$operator_5, $string_columns) {

    if($operator == 'and'){
        $operator = '&&';
    }else if($operator == 'or'){
        $operator = '||';
    } 
    if($operator_3 == 'and'){
        $operator_3 = '&&';
    }else if($operator_3 == 'or'){
        $operator_3 = '||';
    } 
    if($operator_4 == 'and'){
        $operator_4 = '&&';
    }else if($operator_4 == 'or'){
        $operator_4 = '||';
    } 
    if($operator_5 == 'and'){
        $operator_5 = '&&';
    }else if($operator_5 == 'or'){
        $operator_5 = '||';
    } 
      
    if(!empty($operator) && !empty($filter2) && !empty($operator_3) && !empty($filter3) && !empty($operator_4) && !empty($filter4) && !empty($operator_5) && !empty($filter5)){
        $columnsNotNull = [$sales_res[$column], $sales_res[$column2], $sales_res[$column3], $sales_res[$column4], $sales_res[$column5]];

        if (!in_array(null, $columnsNotNull)) {
            if (!in_array($column, $string_columns)) {
                $condition   = "((".check_string_numeric(round($sales_res[$column])).$filter.check_string_numeric(round($val)).")".$operator ."(".check_string_numeric(round($sales_res[$column3])).$filter3. check_string_numeric(round($val3)).")".$operator_3 ."(".check_string_numeric(round($sales_res[$column4])).$filter4. check_string_numeric(round($val4)).")".$operator_4 ."(".check_string_numeric(round($sales_res[$column5])).$filter5. check_string_numeric(round($val5)).")".$operator_5 ."(".check_string_numeric(round($sales_res[$column2])).$filter2. check_string_numeric(round($val2)).")".")"; 
                eval( '$result = (' . $condition. ');' ); 
            }else{
                $condition   = "((".check_string_numeric($sales_res[$column]).$filter.check_string_numeric($val).")".$operator ."(".check_string_numeric($sales_res[$column3]).$filter3. check_string_numeric($val3).")".$operator_3 ."(".check_string_numeric($sales_res[$column4]).$filter4. check_string_numeric($val4).")".$operator_4 ."(".check_string_numeric($sales_res[$column5]).$filter5. check_string_numeric($val5).")".$operator_5 ."(".check_string_numeric($sales_res[$column2]).$filter2. check_string_numeric($val2).")".")"; 
                eval( '$result = (' . $condition. ');' ); 
            }
            return $result; 
        }
        
        
    }else if(!empty($operator) && !empty($filter2) && !empty($operator_3) && !empty($filter3) && !empty($operator_4) && !empty($filter4)){
        $columnsNotNull = [$sales_res[$column], $sales_res[$column2], $sales_res[$column3], $sales_res[$column4]];
        if (!in_array(null, $columnsNotNull)) {
            if (!in_array($column, $string_columns)) {
                $condition   = "((".check_string_numeric(round($sales_res[$column])).$filter.check_string_numeric(round($val)).")".$operator ."(".check_string_numeric(round($sales_res[$column3])).$filter3. check_string_numeric(round($val3)).")".$operator_3 ."(".check_string_numeric(round($sales_res[$column4])).$filter4. check_string_numeric(round($val4)).")".$operator_4 ."(".check_string_numeric(round($sales_res[$column2])).$filter2. check_string_numeric(round($val2)).")".")"; 
                eval( '$result = (' . $condition. ');' ); 
            }else{
                $condition   = "((".check_string_numeric($sales_res[$column]).$filter.check_string_numeric($val).")".$operator ."(".check_string_numeric($sales_res[$column3]).$filter3. check_string_numeric($val3).")".$operator_3 ."(".check_string_numeric($sales_res[$column4]).$filter4. check_string_numeric($val4).")".$operator_4 ."(".check_string_numeric($sales_res[$column2]).$filter2. check_string_numeric($val2).")".")"; 
                eval( '$result = (' . $condition. ');' ); 
            }
            return $result; 
        }
        
        
    }else if(!empty($operator) && !empty($filter2) && !empty($operator_3) && !empty($filter3)){
        $columnsNotNull = [$sales_res[$column], $sales_res[$column2], $sales_res[$column3]];
        if (!in_array(null, $columnsNotNull)) {
            if (!in_array($column, $string_columns)) {
                $condition   = "((".check_string_numeric(round($sales_res[$column])).$filter.check_string_numeric(round($val)).")".$operator ."(".check_string_numeric(round($sales_res[$column3])).$filter3. check_string_numeric(round($val3)).")".$operator_3 ."(".check_string_numeric(round($sales_res[$column2])).$filter2. check_string_numeric(round($val2)).")".")"; 
                eval( '$result = (' . $condition. ');' ); 
            }else{
                $condition   = "((".check_string_numeric($sales_res[$column]).$filter.check_string_numeric($val).")".$operator ."(".check_string_numeric($sales_res[$column3]).$filter3. check_string_numeric($val3).")".$operator_3 ."(".check_string_numeric($sales_res[$column2]).$filter2. check_string_numeric($val2).")".")"; 
                eval( '$result = (' . $condition. ');' ); 
            }
            return $result; 
        }
        
        
    }else if(!empty($operator) && !empty($filter2)){
        $columnsNotNull = [$sales_res[$column], $sales_res[$column2]];
        if (!in_array(null, $columnsNotNull)) {
            if (!in_array($column, $string_columns)) {
                $condition   = "((".check_string_numeric(round($sales_res[$column])).$filter.check_string_numeric(round($val)).")".$operator ."(".check_string_numeric(round($sales_res[$column2])).$filter2. check_string_numeric(round($val2))."))"; 
                eval( '$result = (' . $condition. ');' ); 
            }else{
                $condition   = "((".check_string_numeric($sales_res[$column]).$filter.check_string_numeric($val).")".$operator ."(".check_string_numeric($sales_res[$column2]).$filter2. check_string_numeric($val2)."))"; 
                eval( '$result = (' . $condition. ');' ); 
            }
            return $result;  
        }
        
        
    }else if(empty($operator)){
        
        $columnsNotNull = [$sales_res[$column]];    

        if (!in_array(null, $columnsNotNull)) {
            if (!in_array($column, $string_columns)) {
                $condition   = "((".check_string_numeric(round($sales_res[$column])).$filter.check_string_numeric(round($val))."))"; 
                eval( '$result = (' . $condition. ');' );
            }else{
                $condition   = "((".check_string_numeric($sales_res[$column]).$filter.check_string_numeric($val)."))"; 
                eval( '$result = (' . $condition. ');' );
            }
            
            return $result; 
        }
        
    }
    }
)); 
}