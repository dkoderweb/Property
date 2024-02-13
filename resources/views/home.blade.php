@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-end"> 
        <button type="button" class="btn btn-primary" style="float:right" data-bs-toggle="modal" data-bs-target="#myModal">Add Filter</button>
        <a class="btn btn-success mx-2" href="{{route('property.create')}}">+ Add</a>
    </div> 
    <div id="myModal" data-bs-toggle="myModal" data-bs-target="#myModal" class="modal fade" role="dialog" >
        <div class="modal-dialog" style="max-width: 1000px !important;">      
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Filter</h4>
                <button type="button" class="btn" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="col-md-3" style="align:center;">
                            <select name="" id="select_columns"  class="form-control"> 
                                <option value="">Columns</option>
                                <option value="title" class="title text_col">Title</option> 
                                <option value="price" class="price">Price</option> 
                                <option value="address" class="address text_col">Address</option> 
                                <option value="city" class="city text_col">City</option> 
                                <option value="state" class="state text_col">State</option> 
                                <option value="country" class="country text_col">Country</option> 
                                <option value="type" class="type text_col">Type</option> 
                                <option value="status" class="status text_col">Status</option> 
                                <option value="furnishing_status" class="furnishing_status text_col">Furnishing Status</option> 
                                <option value="developer" class="developer text_col">Developer</option> 
                                <option value="contact_details" class="contact_details text_col">Contact Details</option> 
                                <option value="amenities" class="amenities text_col">Amenities</option> 
                            </select> 
                        </div>  
                        <div class="col-md-3" style="align:center;">
                            <select name="" id="number_filters"  class="form-control"> 
                                <option value="">Filters</option>
                                <option value=">" class="grater">></option>
                                <option value="<" class="less"><</option>
                                <option value=">=" class="grater_equal">>=</option>
                                <option value="<=" class="less_equal"><=</option>
                                <option value="==" class="equal">=</option>
                            </select> 
                        </div>
                        <div class="col-md-3" style="align:center;">
                            <input type="number" required class="form-control" id="from_balance"> 
                        </div>
                        <div class="col-md-3" style="align:center;">
                            <select name="" id="select_operator"  class="form-control"> 
                                <option value="">Operator</option>
                                <option value="and" class="and">And </option>
                                <option value="or" class="or">OR </option>
                            </select> 
                        </div>  
                </div>
                <div class="row extra_appended_div">

                </div>
                <div class="row extra_filter_div" style=" display:none;">
                    <div class="col-md-12 extra_filter" style="margin-top: 10px;">
                        <div class="col-md-3" style="align:center;">
                            <select name="" id="select_columns_2"  class="form-control"> 
                                <option value="">Columns</option>
                                <option value="title" class="title text_col">Title</option> 
                                <option value="price" class="price">Price</option> 
                                <option value="address" class="address text_col">Address</option> 
                                <option value="city" class="city text_col">City</option> 
                                <option value="state" class="state text_col">State</option> 
                                <option value="country" class="country text_col">Country</option> 
                                <option value="type" class="type text_col">Type</option> 
                                <option value="status" class="status text_col">Status</option> 
                                <option value="furnishing_status" class="furnishing_status text_col">Furnishing Status</option> 
                                <option value="developer" class="developer text_col">Developer</option> 
                                <option value="contact_details" class="contact_details text_col">Contact Details</option> 
                                <option value="amenities" class="amenities text_col">Amenities</option>  
                            </select> 
                        </div>  
                        <div class="col-md-3" style="align:center;">
                            <select name="" id="number_filters_2"  class="form-control"> 
                                <option value="">Filters</option>
                                <option value=">" class="grater">></option>
                                <option value="<" class="less"><</option>
                                <option value=">=" class="grater_equal">>=</option>
                                <option value="<=" class="less_equal"><=</option>
                                <option value="==" class="equal">=</option>
                            </select> 
                        </div>
                        <div class="col-md-3" style="align:center;">
                            <input type="number" required class="form-control" id="from_balance_2"> 
                        </div>
                        <div class="col-md-3" style="align:center;">
                            <span class="btn btn-xs btn-primary add_filter_div"><i class="fa fa-plus " id="plus"></i></span>
                        </div>  
                    </div>
                </div>
                <div class="row" style="margin-top:10px; align:center;">
                    <div class="col-md-12" style="align:center;">
                        <h4 style="align:left;">Saved Filter :</h4>
                        <div class="table-responsive">
                            <table class="table" id="table_filter" style="margin-top:10px;">
                                <thead>
                                    <tr>
                                        <th scope="col">Column</th>
                                        <th scope="col">Filter</th>
                                        <th scope="col">Number</th>
                                        <th scope="col">Operator</th>
                                        <th scope="col">Column2</th>
                                        <th scope="col">Filter2</th>
                                        <th scope="col">Number2</th>
                                        <th scope="col">Operator</th>
                                        <th scope="col">Column3</th>
                                        <th scope="col">Filter3</th>
                                        <th scope="col">Number3</th>
                                        <th scope="col">Operator</th>
                                        <th scope="col">Column4</th>
                                        <th scope="col">Filter4</th>
                                        <th scope="col">Number4</th>
                                        <th scope="col">Operator</th>
                                        <th scope="col">Column5</th>
                                        <th scope="col">Filter5</th>
                                        <th scope="col">Number5</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="filters_tbody">
                                    @foreach ($filters as $row)
                                        <tr id="{{$row->id}}" class="filter_row">
                                            <td id="column_text_{{$row->id}}" class="{{$row->select_columns_name}}">{{$row->select_columns_text}}</td>
                                            <td id="number_filters_{{$row->id}}" class="{{$row->number_filters_name}}">{{$row->number_filters}}</td>
                                            <td id="from_balance_{{$row->id}}" class="{{$row->from_balance}}">{{$row->from_balance}}</td>
                                            <td id="select_operator_{{$row->id}}" class="{{$row->select_operator}}">{{$row->select_operator_text}}</td>
                                            <td id="select_columns_2_{{$row->id}}" class="{{$row->select_columns_2_name}}">{{$row->select_columns_2_text}}</td>
                                            <td id="number_filters_2_{{$row->id}}" class="{{$row->number_filters_2_name}}">{{$row->number_filters_2}}</td>
                                            <td id="from_balance_2_{{$row->id}}" class="{{$row->from_balance_2}}">{{$row->from_balance_2}}</td>
                                            <td id="select_operator_3_{{$row->id}}" class="{{$row->select_operator_3}}">{{$row->select_operator_3_text}}</td>
                                            <td id="select_columns_3_{{$row->id}}" class="{{$row->select_columns_3_name}}">{{$row->select_columns_3_text}}</td>
                                            <td id="number_filters_3_{{$row->id}}" class="{{$row->number_filters_3_name}}">{{$row->number_filters_3}}</td>
                                            <td id="from_balance_3_{{$row->id}}" class="{{$row->from_balance_3}}">{{$row->from_balance_3}}</td>
                                            <td id="select_operator_4_{{$row->id}}" class="{{$row->select_operator_4}}">{{$row->select_operator_4_text}}</td>
                                            <td id="select_columns_4_{{$row->id}}" class="{{$row->select_columns_4_name}}">{{$row->select_columns_4_text}}</td>
                                            <td id="number_filters_4_{{$row->id}}" class="{{$row->number_filters_4_name}}">{{$row->number_filters_4}}</td>
                                            <td id="from_balance_4_{{$row->id}}" class="{{$row->from_balance_4}}">{{$row->from_balance_4}}</td>
                                            <td id="select_operator_5_{{$row->id}}" class="{{$row->select_operator_5}}">{{$row->select_operator_5_text}}</td>
                                            <td id="select_columns_5_{{$row->id}}" class="{{$row->select_columns_5_name}}">{{$row->select_columns_5_text}}</td>
                                            <td id="number_filters_5_{{$row->id}}" class="{{$row->number_filters_5_name}}">{{$row->number_filters_5}}</td>
                                            <td id="from_balance_5_{{$row->id}}" class="{{$row->from_balance_5}}">{{$row->from_balance_5}}</td>
                                            <td>
                                                <span class="btn btn-xs btn-danger delete_filter"><i class="btn btn-danger " id="delete-2">Delete</i></span>
                                            </td>
                                        </tr>
                                    @endforeach                                              
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>                                  
                <div class="row" style="margin-top:10px; align:center;">
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm mx-2" id="submit_filters">OK</button>
                        <button class="btn btn-primary btn-sm mx-2" id="save_filters">Save Filters</button>
                        <button class="btn btn-primary btn-sm mx-2" style="margin-left: 5px;" id="clear_filters">Clear Filters</button>
                    </div> 
                </div>
            </div>
          </div>
      
        </div>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered table-hover dataTables-example" style="width: 100%;" id="tbl">
            <thead>
                <th class="no-export no-sort">Action</th>
                <th>Title</th>
                <th>Price</th>
                <th>Address</th> 
                <th>City</th> 
                <th>State</th> 
                <th>Country</th> 
                <th>Type</th> 
                <th>Status</th> 
                <th>Furnishing Status</th> 
                <th>Developer</th> 
                <th>Contact Details</th> 
                <th>Amenities</th>  
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
@endsection


@section('script')
@include('filter_js')


<script type="text/javascript">
    $(document).on("click",".add_filter_div",function() {
        var numItems = $('.extra_filter').length;
        var extra_num = numItems+2;
        if(numItems < 4){
        var div = `<div class="col-md-12 extra_filter extra_num_${extra_num}" style="margin-top: 10px;">
                            <div class="col-md-3" style="align:center;">
                                <select name="" id="" class="form-control select_columns_extra">
                                    <option value="">Columns</option>
                                    <option value="title" class="title text_col">Title</option> 
                                    <option value="price" class="price">Price</option> 
                                    <option value="address" class="address text_col">Address</option> 
                                    <option value="city" class="city text_col">City</option> 
                                    <option value="state" class="state text_col">State</option> 
                                    <option value="country" class="country text_col">Country</option> 
                                    <option value="type" class="type text_col">Type</option> 
                                    <option value="status" class="status text_col">Status</option> 
                                    <option value="furnishing_status" class="furnishing_status text_col">Furnishing Status</option> 
                                    <option value="developer" class="developer text_col">Developer</option> 
                                    <option value="contact_details" class="contact_details text_col">Contact Details</option> 
                                    <option value="amenities" class="amenities text_col">Amenities</option> 
                                </select>
                            </div>
                            <div class="col-md-3" style="align:center;">
                                <select name="" id="" class="form-control number_filters_extra">
                                    <option value="">Filters</option>
                                    <option value=">" class="grater">></option>
                                    <option value="<" class="less"><</option>
                                    <option value=">=" class="grater_equal">>=</option>
                                    <option value="<=" class="less_equal"><=</option>
                                    <option value="==" class="equal">=</option>
                                </select>
                            </div>
                            <div class="col-md-3" style="align:center;">
                                <input type="number" required class="form-control from_balance_extra" id="">
                            </div>
                            <div class="col-md-2" style="align:center;">
                                <select name="" id="" class="form-control select_operator_extra">
                                    <option value="">Operator</option>
                                    <option value="and" class="and">And </option>
                                    <option value="or" class="or">OR </option>
                                </select>
                            </div>
                            <div class="col-md-1" style="align:center;">
                                <span class="btn btn-xs btn-danger delete_extra_filter"><i class="fa fa-trash "></i></span>
                            </div>
                        </div>`;

                $('.extra_appended_div').append(div);
            }
        });  


    function filterColumnsTable(){
        if($('.dataTables-example thead tr').length == '2')
        {
            $('.dataTables-example thead tr:eq(0)').remove();
        }
        $('.dataTables-example thead tr').clone(true).appendTo( '.dataTables-example thead' );
        $('.dataTables-example thead tr:eq(0) th').each( function (i) {
            var title = $(this).text();

            var newTitle = title.split(' ').join('_');

            $(this).html( '<input type="text" class="form-control input-sm search_'+newTitle+'" data-col="'+i+'" placeholder="Search" />' );

            $('input', this ).on( 'keyup', function () {
                if ( table.column(i).search() !== this.value ) 
                {
                    table
                    .column(i)
                    .search( this.value )
                    .draw();
                }
            });

            $('.search_Action').prop('disabled',true);
             
        });
        $('.search_Action').prop('disabled',true);
        $('.dataTables-example thead tr:eq(0) th input').css({
            'width':'80px',
            'display':'inline-block'
        });

        var select_columns = $('#select_columns').val();
        var number_filters = $('#number_filters').val();
        if($('#from_balance').hasClass('datepicker')){
            var from_balance = moment($('#from_balance').val()).format('YYYY/MM/DD');  

        }else{
            var from_balance = $('#from_balance').val();
        }

        var select_columns_2 = $('#select_columns_2').val();
        var number_filters_2 = $('#number_filters_2').val();
        if($('#from_balance_2').hasClass('datepicker')){
            var from_balance_2 = moment($('#from_balance_2').val()).format('YYYY/MM/DD');  

        }else{
            var from_balance_2 = $('#from_balance_2').val();
        }

        var select_operator = $('#select_operator').val();

        var data_array = { select_columns : select_columns, number_filters : number_filters, from_balance : from_balance,select_columns_2 : select_columns_2,number_filters_2 : number_filters_2,from_balance_2 : from_balance_2,select_operator : select_operator };

        if($('.form-control').hasClass('select_columns_extra')){
            var i = 3;
            $(".select_columns_extra").each(function(){
                data_array['select_columns_' + i] = $(this).val(); 
                i++;
            });     
            
            var j = 3;
            $(".number_filters_extra").each(function(){
                data_array['number_filters_' + j] = $(this).val(); 
                j++;
            });       
            
            var k = 3;
            $(".from_balance_extra").each(function(){
                if($(this).closest('.extra_filter').find('.select_columns_extra :selected').hasClass('text_col')){
                    data_array['from_balance_' + k] = $(this).val(); 
                }else if($(this).closest('.extra_filter').find('.select_columns_extra :selected').hasClass('datepicker')){
                    data_array['from_balance_' + k] = moment($(this).val()).format('YYYY/MM/DD');  
                }else{
                    data_array['from_balance_' + k] = parseInt($(this).val()); 
                }
                
                k++;
            });     
            
            var l = 3;
            $(".select_operator_extra").each(function(){
                data_array['select_operator_' + l] = $(this).val(); 
                l++;
            });
        }
        return data_array;
    } 

    function initDataTable(data = null)
    {
 
        var data_array =  filterColumnsTable()   

        table = $('.dataTables-example').DataTable({
            destroy: true,
            pageLength: 25,
            responsive: true,
            processing: true,
            serverSide: true,
            fixedHeader: false,
            paging: true,
            dom: '<"html5buttons"B>lTftigp', 
            buttons: 
            [
                { 
                    extend: 'copy',
                    footer: true
                },
                {
                    extend: 'csv', 
                    exportOptions: { columns: ":not(.no-export)" },
                    action: newexportactionpdf 

                },
                {
                    extend: 'excel',  
                    exportOptions: { columns: ":not(.no-export)" },
                    action: newexportactionpdf
                },
                { 
                    extend: 'pdfHtml5',  title: 'Customer Sales Analysis with Address', orientation: 'landscape',
                    exportOptions: 
                    {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied',
                        modifier: 
                        {
                            pageMargins: [ 0, 0, 0, 0 ],  
                            margin: [ 10,0 ],  
                            alignment: 'center'
                        }, 
                        body: 
                        {
                            margin:[10,0],
                            pageMargins: [ 0, 0, 0, 0 ],
                            alignment: 'center'
                        }, 
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27] 
                    },
                    customize: function (doc) 
                    {                       
                        doc.content[1].table.widths = ['3%','3%','4%','4%','4%','3%','3%','4%','3%','3%','4%','4%','3%','4%','4%','4%','3%','4%','4%','4%','4%','3%','3%','3%','3%','4%','4%','4%'];
                        doc.content[1].borders = ['2px solid'];
 

                        doc.content.splice(0,0);

                        var now = new Date();
                        var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
                        var tables = doc.content[1].table['body'];
                        $.each(tables, function( index, table ) {
                            table[3]['alignment'] = 'right';
                            table[4]['alignment'] = 'right';
                            table[5]['alignment'] = 'right';
                            table[6]['alignment'] = 'right';
                            table[7]['alignment'] = 'right';
                            table[8]['alignment'] = 'right';
                            table[9]['alignment'] = 'right';
                            table[10]['alignment'] = 'right';
                            table[11]['alignment'] = 'right';
                            table[12]['alignment'] = 'right';
                            table[13]['alignment'] = 'right';
                            table[14]['alignment'] = 'right';
                        });
                        var logo = '-';
                        
                        doc.pageMargins = [20,60,20,30];

                        doc.defaultStyle.fontSize = 4;
                        doc.styles.tableHeader.fontSize = 6;
                        doc.styles.tableHeader.alignment = 'left';
                        
                        doc['header']=(function() {
                            return {
                                columns: [
                                    {
                                        image: logo,
                                        width: 80
                                    },
                                ],
                                margin: 20,
                                width:100
                            }
                        });
                    
                        doc['footer']=(function(page, pages) {
                            return {
                                columns: [
                                    {
                                        alignment: 'left',
                                        text: ['Created on: ', { text: jsDate.toString() }]
                                    },
                                    {
                                        alignment: 'right',
                                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                                    }
                                ],
                                margin: 20
                            }
                        });
                    
                        var objLayout = {};
                        objLayout['hLineWidth'] = function(i) { return .100; };
                        objLayout['vLineWidth'] = function(i) { return .100; };
                        objLayout['hLineColor'] = function(i) { return '#aaa'; };
                        objLayout['vLineColor'] = function(i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function(i) { return 0; };
                        objLayout['paddingRight'] = function(i) { return 0; };
                        objLayout['alignment'] = function(i) { return 'center'; };
                        doc.content[0].layout = objLayout;
                    },
                    action: newexportactionpdf
                },
                {
                    extend: 'print', text : 'Print Preview',
                    exportOptions: 
                    {
                        columns: ':not(.no-export)'
                    },
                    customize: function (win)
                    {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                
                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');

                        $(win.document.body).find('image')
                                .addClass('img')
                                .css('height', '50');                                               
                    }
                }
            ],
            ajax: {
                url:'{{ route("property.index") }}',
                method:'get',
                data: data_array,
            },
            columns : [
                {data : 'action', name : 'action'},
                {data : 'title', name : 'title',className: "text-right"},
                {data : 'price', name : 'price',className: "text-right"},  
                {data : 'address', name : 'address'}, 
                {data : 'city', name : 'city'},   
                {data : 'state', name : 'state'}, 
                {data : 'country', name : 'country'}, 
                {data : 'type', name : 'type'}, 
                {data : 'status', name : 'status'}, 
                {data : 'furnishing_status', name : 'furnishing_status'}, 
                {data : 'developer', name : 'developer'}, 
                {data : 'contact_details', name : 'contact_details'}, 
                {data : 'amenities', name : 'amenities'}, 
            ],
        });
    }
    
    function get_filter_data(){
        var division = $("#divisions").val();
        var month = $("#month").val();
        var year = $("#year").val();
        var data = {
            division: division,
            month: month,
            year: year,
            report_url: '{{ url()->full() }}', 
        };
        return data;
    }
    
    function formatDate(dt) 
    {
        if ($("#txt_date_format").val() == '' || $("#txt_date_format").val() == undefined || $("#txt_date_format").val() == null) 
        {
            var date_format = 'd/m/y';
        }
        else
        {
            var date_format = $("#txt_date_format").val();
        }

        var d = new Date(dt),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        var new_dt = date_format;

        new_dt = date_format.replace('d',day).replace('m',month).replace('Y',year);
        return new_dt;
    }

  
  /*$(document).ajaxStart(function(){
        $('.datatable-export-button').css('pointer-events', 'none').attr('disabled','disabled');
    })
    .ajaxStop(function(){
        $('.datatable-export-button').css('pointer-events', 'auto').removeAttr('disabled');
    });*/



        $("#ExportCSA").on('click', function(){

            $('#export_hidden_division').val($('#divisions').val());
            $('#export_hidden_year').val($('#year').val());
            $('#export_hidden_month').val($('#month').val());
                
            $('#formExport').submit();
        });


</script>

@endsection
