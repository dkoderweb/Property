<script>
    $(document).ready(function () {
        
        $.ajaxSetup({
            headers:{ 'X-CSRF-Token': '{{ csrf_token() }}'}
        });

        initDataTable()         
    });  
    $(document).on("click",".delete_extra_filter",function() {
            $(this).closest('.extra_filter').remove();

    });
    $(document).on("change","#select_operator",function() {
        var select_operator = $(this).val();
        if(select_operator == ''){
            $('.extra_filter_div').css('display','none');
            $("#select_columns_2 option:first").prop("selected", "selected");
            $("#number_filters_2 option:first").prop("selected", "selected");
            $('#from_balance_2').val('');
        }else{
            $('.extra_filter_div').css('display','block');
        }
    });
    $(document).on("change","#select_columns",function() {
        if($('#select_columns :selected').hasClass('text_col')){
            $("#number_filters .grater").attr("disabled", "true");
            $("#number_filters .less").attr("disabled", "true");
            $("#number_filters .grater_equal").attr("disabled", "true");
            $("#number_filters .less_equal").attr("disabled", "true");
            $('#number_filters option[class=equal]').prop('selected', 'selected').change();
            if($('#from_balance').hasClass('datepicker')){
                $('#from_balance').removeClass('datepicker').attr('type','text');
                $("#from_balance").datetimepicker("destroy");
            }else{
                $('#from_balance').attr('type','text');
            }

        }else if($('#select_columns :selected').hasClass('date_col')){
            $('#from_balance').val('');
            $('#from_balance').addClass('datepicker').attr('type','text');
            $('.datepicker').datetimepicker({
                defaultDate: new Date(),
                format: 'MM/DD/YYYY'
            });            
        }else{
            $("#number_filters").val($("#number_filters option:first").val());

            $("#number_filters .grater").removeAttr("disabled", "true");
            $("#number_filters .less").removeAttr("disabled", "true");
            $("#number_filters .grater_equal").removeAttr("disabled", "true");
            $("#number_filters .less_equal").removeAttr("disabled", "true");
            if($('#from_balance').hasClass('datepicker')){
                $('#from_balance').removeClass('datepicker').attr('type','number');
                $("#from_balance").datetimepicker("destroy");
            }else{
                $('#from_balance').attr('type','number');
            }
            
        }
    });
    $(document).on("change","#select_columns_2",function() {
        if($('#select_columns_2 :selected').hasClass('text_col')){
            $("#number_filters_2 .grater").attr("disabled", "true");
            $("#number_filters_2 .less").attr("disabled", "true");
            $("#number_filters_2 .grater_equal").attr("disabled", "true");
            $("#number_filters_2 .less_equal").attr("disabled", "true");
            $('#number_filters_2 option[class=equal]').prop('selected', 'selected').change();
            if($('#from_balance_2').hasClass('datepicker')){
                $('#from_balance_2').removeClass('datepicker').attr('type','text');
                $("#from_balance_2").datetimepicker("destroy");
            }else{
                $('#from_balance_2').attr('type','text');
            }
        }else if($('#select_columns_2 :selected').hasClass('date_col')){
            $('#from_balance_2').val('');            
            $('#from_balance_2').addClass('datepicker').attr('type','text');
            $('.datepicker').datetimepicker({
                defaultDate: new Date(),
                format: 'MM/DD/YYYY'
            });
        }else{
            $("#number_filters_2").val($("#number_filters_2 option:first").val());

            $("#number_filters_2 .grater").removeAttr("disabled", "true");
            $("#number_filters_2 .less").removeAttr("disabled", "true");
            $("#number_filters_2 .grater_equal").removeAttr("disabled", "true");
            $("#number_filters_2 .less_equal").removeAttr("disabled", "true");
            if($('#from_balance_2').hasClass('datepicker')){
                $('#from_balance_2').removeClass('datepicker').attr('type','number');
                $("#from_balance_2").datetimepicker("destroy");
            }else{
                $('#from_balance_2').attr('type','number');
            }
        }
    });
    $(document).on("change",".select_columns_extra",function() {
        if($(this).closest('.extra_filter').find('.select_columns_extra :selected').hasClass('text_col')){
            $(this).closest(".extra_filter").find('.number_filters_extra .grater').attr("disabled", "true");
            $(this).closest(".extra_filter").find('.number_filters_extra .less').attr("disabled", "true");
            $(this).closest(".extra_filter").find('.number_filters_extra .grater_equal').attr("disabled", "true");
            $(this).closest(".extra_filter").find('.number_filters_extra .less_equal').attr("disabled", "true");
            $(this).closest('.extra_filter').find('.number_filters_extra option[class=equal]').prop('selected', 'selected').change();
            if($(this).closest('.extra_filter').find('.from_balance_extra').hasClass('datepicker')){
                $(this).closest('.extra_filter').find('.from_balance_extra').removeClass('datepicker').attr('type','text');
                $(this).closest('.extra_filter').find('.from_balance_extra').datetimepicker("destroy");
            }else{
                $(this).closest('.extra_filter').find('.from_balance_extra').attr('type','text');
            }
        }else if($(this).closest('.extra_filter').find('.select_columns_extra :selected').hasClass('date_col')){
            $(this).closest('.extra_filter').find('.from_balance_extra').val('');
            $(this).closest('.extra_filter').find('.from_balance_extra').addClass('datepicker').attr('type','text');
            $('.datepicker').datetimepicker({
                defaultDate: new Date(),
                format: 'MM/DD/YYYY'
            });
        }else{
            $(this).closest(".extra_filter").find('.number_filters_extra').val($(".number_filters_extra option:first").val());

            $(this).closest(".extra_filter").find('.number_filters_extra .grater').removeAttr("disabled", "true");
            $(this).closest(".extra_filter").find('.number_filters_extra .less').removeAttr("disabled", "true");
            $(this).closest(".extra_filter").find('.number_filters_extra .grater_equal').removeAttr("disabled", "true");
            $(this).closest(".extra_filter").find('.number_filters_extra .less_equal').removeAttr("disabled", "true");
            if($(this).closest('.extra_filter').find('.from_balance_extra').hasClass('datepicker')){
                $(this).closest('.extra_filter').find('.from_balance_extra').removeClass('datepicker').attr('type','number');
                $(this).closest('.extra_filter').find('.from_balance_extra').datetimepicker("destroy")
            }else{
                $(this).closest('.extra_filter').find('.from_balance_extra').attr('type','number');
            }
        }
    });
    $(document).on("click",".delete_filter",function() {
        if (confirm("Are you sure?")) {
            var id = $(this).parents('tr').attr('id');
            $.ajax({
                url : '{{ route("filter.delete") }}',
                type : 'post',
                data : { id: id},
                success : function(data){
                    $('#'+id).remove();           
                }
            });
        }
        return false;
    });
    $(document).on("click",".filter_row",function() {
        $('.extra_appended_div').empty();
        var id = $(this).attr('id');
        var column_text = $(this).find("#column_text_"+id).attr('class');
        var number_filters = $(this).find("#number_filters_"+id).attr('class');
        var from_balance = $(this).find("#from_balance_"+id).attr('class');

        var select_operator = $(this).find("#select_operator_"+id).attr('class');
        var select_columns_2 = $(this).find("#select_columns_2_"+id).attr('class');
        var number_filters_2 = $(this).find("#number_filters_2_"+id).attr('class');
        var from_balance_2 = $(this).find("#from_balance_2_"+id).attr('class');

        var select_operator_3 = $(this).find("#select_operator_3_"+id).attr('class');
        var select_columns_3 = $(this).find("#select_columns_3_"+id).attr('class');
        var number_filters_3 = $(this).find("#number_filters_3_"+id).attr('class');
        var from_balance_3 = $(this).find("#from_balance_3_"+id).attr('class');

        var select_operator_4 = $(this).find("#select_operator_4_"+id).attr('class');
        var select_columns_4 = $(this).find("#select_columns_4_"+id).attr('class');
        var number_filters_4 = $(this).find("#number_filters_4_"+id).attr('class');
        var from_balance_4 = $(this).find("#from_balance_4_"+id).attr('class');

        var select_operator_5 = $(this).find("#select_operator_5_"+id).attr('class');
        var select_columns_5 = $(this).find("#select_columns_5_"+id).attr('class');
        var number_filters_5 = $(this).find("#number_filters_5_"+id).attr('class');
        var from_balance_5 = $(this).find("#from_balance_5_"+id).attr('class');
        //console.log(column_text);
        $('#select_columns option[value='+column_text+']').prop('selected', 'selected').change();
        $('#from_balance').val(from_balance);
        $('#number_filters option[class='+number_filters+']').prop('selected', 'selected').change();

        if(select_operator !== ''){
            $('.extra_filter_div').css('display','block');
            $('#select_operator option[class='+select_operator+']').prop('selected', 'selected').change();
            $('#select_columns_2 option[value='+select_columns_2+']').prop('selected', 'selected').change();
            $('#from_balance_2').val(from_balance_2);
            $('#number_filters_2 option[class='+number_filters_2+']').prop('selected', 'selected').change();
        }else{
            $("#select_columns_2 option:first").prop("selected", "selected");
            $("#number_filters_2 option:first").prop("selected", "selected");
            $('#from_balance_2').val('');
            $("#select_operator").val($("#select_operator option:first").val());
            $('.extra_filter_div').css('display','none');
        }

        if(select_operator_3 !== ''){
            $('.add_filter_div').click();
            $('.extra_num_3 .select_operator_extra option[class='+select_operator_3+']').prop('selected', 'selected').change();
            $('.extra_num_3 .select_columns_extra option[value='+select_columns_3+']').prop('selected', 'selected').change();
            $('.extra_num_3 .from_balance_extra').val(from_balance_3);
            $('.extra_num_3 .number_filters_extra option[class='+number_filters_3+']').prop('selected', 'selected').change();
        } 

        if(select_operator_4 !== ''){
            $('.add_filter_div').click();
            $('.extra_num_4 .select_operator_extra option[class='+select_operator_4+']').prop('selected', 'selected').change();
            $('.extra_num_4 .select_columns_extra option[value='+select_columns_4+']').prop('selected', 'selected').change();
            $('.extra_num_4 .from_balance_extra').val(from_balance_4);
            $('.extra_num_4 .number_filters_extra option[class='+number_filters_4+']').prop('selected', 'selected').change();
        }

        if(select_operator_5 !== ''){
            $('.add_filter_div').click();
            $('.extra_num_5 .select_operator_extra option[class='+select_operator_5+']').prop('selected', 'selected').change();
            $('.extra_num_5 .select_columns_extra option[value='+select_columns_5+']').prop('selected', 'selected').change();
            $('.extra_num_5 .from_balance_extra').val(from_balance_5);
            $('.extra_num_5 .number_filters_extra option[class='+number_filters_5+']').prop('selected', 'selected').change();
        }
    });
    function check_empty(){
        if($('.form-control').hasClass('select_columns_extra')){
            var select_columns_extra_empty = $('.select_columns_extra').filter(function() {
                return this.value == ''
            });

            var number_filters_extra_empty = $('.number_filters_extra').filter(function() {
                return this.value == ''
            });

            var from_balance_extra_empty = $('.from_balance_extra').filter(function() {
                return this.value == ''
            });

            var select_operator_extra_empty = $('.select_operator_extra').filter(function() {
                return this.value == ''
            });

            if (select_columns_extra_empty.length > 0 || number_filters_extra_empty.length > 0 || from_balance_extra_empty.length > 0 || select_operator_extra_empty.length > 0) {
                return 'empty';
            }else{
                return 'non empty';
            }
        }else{
            return 'non empty';
        }
    }
    $("#save_filters").on('click', function(){

        var check = check_empty();
        if(check == 'empty'){
            toastr.error('please select all options');
        }else{
            var select_columns_text = $('#select_columns :selected').text();
            if($('#select_columns :selected').hasClass('text_col')){
                var select_columns_name = $('#select_columns :selected').attr('class').replace("text_col", "");
            }else if($('#select_columns :selected').hasClass('date_col')){
                var select_columns_name = $('#select_columns :selected').attr('class').replace("date_col", "");
            }else{
                var select_columns_name = $('#select_columns :selected').attr('class');
            }
            
            var number_filters_name = $('#number_filters :selected').attr('class');
            var select_columns = $('#select_columns :selected').val();
            var number_filters = $('#number_filters').val();
            var from_balance = $('#from_balance').val();
            var report_name = '{{$route_name}}';

            var select_operator = $('#select_operator').val();
            var select_columns_2 = $('#select_columns_2').val();
            var number_filters_2 = $('#number_filters_2').val();
            var from_balance_2 = $('#from_balance_2').val();

            if(select_columns !== '' && number_filters !== '' && from_balance !== ''){
                if((select_operator !== '') && (select_columns_2 == '' && number_filters_2 == '' && from_balance_2 == '')){
                    toastr.error('please insert all options properly');
                }else{
                    if(select_operator == ''){
                        var select_columns_2_name = '';
                        var select_columns_2_text = '';
                        var number_filters_2_name = '';
                        var select_operator = '';
                        var select_operator_text = '';
                    }else{
                        var select_columns_2_name = $('#select_columns_2 :selected').val();
                        var select_columns_2_text = $('#select_columns_2 :selected').text();
                        var number_filters_2_name = $('#number_filters_2 :selected').attr('class');
                        var select_operator = $('#select_operator :selected').val();
                        var select_operator_text = $('#select_operator :selected').text();
                    }
                    var data_array = { number_filters:number_filters,from_balance : from_balance, report_name: report_name,select_columns_text: select_columns_text,number_filters_name : number_filters_name,select_columns_name: select_columns_name,number_filters_2: number_filters_2,from_balance_2: from_balance_2,select_operator: select_operator,select_operator_text : select_operator_text,select_columns_2_text : select_columns_2_text,number_filters_2_name : number_filters_2_name,select_columns_2_name:select_columns_2_name};
                    if($('.form-control').hasClass('select_columns_extra')){
                        var i = 3;
                        $(".select_columns_extra").each(function(){
                            data_array['select_columns_' + i+'_name'] = $(this).children("option:selected").val(); 
                            data_array['select_columns_' + i+'_text'] = $(this).children("option:selected").text(); 
                            i++;
                        });     
                        
                        var j = 3;
                        $(".number_filters_extra").each(function(){
                            data_array['number_filters_' + j] = $(this).children("option:selected").val(); 
                            data_array['number_filters_' + j+'_name'] = $(this).children("option:selected").attr('class'); 
                            j++;
                        });       
                        
                        var k = 3;
                        $(".from_balance_extra").each(function(){
                            data_array['from_balance_' + k] = $(this).val(); 
                            k++;
                        });     
                        
                        var l = 3;
                        $(".select_operator_extra").each(function(){
                            data_array['select_operator_' + l] = $(this).children("option:selected").val(); 
                            data_array['select_operator_' + l+'_text'] = $(this).children("option:selected").text(); 
                            l++;
                        });
                    }
                    $.ajax({
                        url : '{{ route("filter.save") }}',
                        type : 'post',
                        data : data_array,
                        success : function(data){
                            initDataTable('submit_filters');
                            var table_row = '<tr id="'+data.id+'" class="filter_row"><td id="column_text_'+data.id+'" class="'+data.select_columns_name+'">'+data.select_columns_text+'</td><td id="number_filters_'+data.id+'" class="'+data.number_filters_name+'">'+data.number_filters+'</td><td id="from_balance_'+data.id+'" class="'+data.from_balance+'">'+data.from_balance+'</td><td id="select_operator_'+data.id+'" class="'+data.select_operator+'">'+data.select_operator_text+'</td><td id="select_columns_2_'+data.id+'" class="'+data.select_columns_2_name+'">'+data.select_columns_2_text+'</td><td id="number_filters_2_'+data.id+'" class="'+data.number_filters_2_name+'">'+data.number_filters_2+'</td><td id="from_balance_2_'+data.id+'" class="'+data.from_balance_2+'">'+data.from_balance_2+'</td><td id="select_operator_3_'+data.id+'" class="'+data.select_operator_3+'">'+data.select_operator_3_text+'</td><td id="select_columns_3_'+data.id+'" class="'+data.select_columns_3_name+'">'+data.select_columns_3_text+'</td><td id="number_filters_3_'+data.id+'" class="'+data.number_filters_3_name+'">'+data.number_filters_3+'</td><td id="from_balance_3_'+data.id+'" class="'+data.from_balance_3+'">'+data.from_balance_3+'</td><td id="select_operator_4_'+data.id+'" class="'+data.select_operator_4+'">'+data.select_operator_4_text+'</td><td id="select_columns_4_'+data.id+'" class="'+data.select_columns_4_name+'">'+data.select_columns_4_text+'</td><td id="number_filters_4_'+data.id+'" class="'+data.number_filters_4_name+'">'+data.number_filters_4+'</td><td id="from_balance_4_'+data.id+'" class="'+data.from_balance_4+'">'+data.from_balance_4+'</td><td id="select_operator_5_'+data.id+'" class="'+data.select_operator_5+'">'+data.select_operator_5_text+'</td><td id="select_columns_5_'+data.id+'" class="'+data.select_columns_5_name+'">'+data.select_columns_5_text+'</td><td id="number_filters_5_'+data.id+'" class="'+data.number_filters_5_name+'">'+data.number_filters_5+'</td><td id="from_balance_5_'+data.id+'" class="'+data.from_balance_5+'">'+data.from_balance_5+'</td><td><span class="btn btn-xs btn-danger delete_filter"><i class="fa fa-trash " id="delete-2"></i></span></td></tr>';
                            $('.filters_tbody').append(table_row);                    
                        }
                    });
                    $('#myModal').modal('hide');
                }
            }else{
                toastr.error('please insert all options properly');
            }
        }
    });
    $("#clear_filters").on('click', function(){
        $("#select_columns").val($("#target option:first").val());
        $("#number_filters").val($("#target option:first").val());
        if($('#from_balance').hasClass('datepicker')){
            $('#from_balance').removeClass('datepicker').attr('type','number');
            $("#from_balance").datetimepicker("destroy");
        }else{
            $('#from_balance').attr('type','number');
        }
        $('#from_balance').val('');

        $("#select_operator").val($("#target option:first").val());
        $("#select_columns_2").val($("#target option:first").val());
        $("#number_filters_2").val($("#target option:first").val());
        if($('#from_balance_2').hasClass('datepicker')){
            $('#from_balance_2').removeClass('datepicker').attr('type','number');
            $("#from_balance_2").datetimepicker("destroy");
        }else{
            $('#from_balance_2').attr('type','number');
        }
        $('#from_balance_2').val('');
        $('.extra_appended_div').empty();
        $('.extra_filter_div').css('display','none');
        initDataTable();
        $('#myModal').modal('hide');
    });
    $("#submit_filters").on('click', function(){
        var check = check_empty();
        if(check == 'empty'){
            toastr.error('please select all options');
        }else{
            var select_columns = $('#select_columns').val();
            var number_filters = $('#number_filters').val();
            var from_balance = $('#from_balance').val();

            var select_operator = $('#select_operator').val();
            var select_columns_2 = $('#select_columns_2').val();
            var number_filters_2 = $('#number_filters_2').val();
            var from_balance_2 = $('#from_balance_2').val();

            if(select_columns !== '' && number_filters !== '' && from_balance !== ''){
                if((select_operator !== '') && (select_columns_2 == '' && number_filters_2 == '' && from_balance_2 == '')){
                    toastr.error('please insert all options properly');
                }else{
                    initDataTable('submit_filters');
                    $('#myModal').modal('hide');
                }
            }else{
                toastr.error('please insert all options properly');
            } 
        }
    });
    function newexportactionpdf(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function (e, s, data) {
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function (e, settings) {
                if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } 
                if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                }
                if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                }
                dt.one('preXhr', function (e, s, data) {
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                setTimeout(dt.ajax.reload, 0);
                return false;
            });
        });
        dt.ajax.reload();
    };
</script>