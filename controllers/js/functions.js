/**
 * Constants
 * **/
let processing_message = 'Working ...';
let processing_area = '.processing';
let processing_area_ = '.processing_';
let ico = `<img src="assets/dist/img/shope/loader.gif" title="${processing_message}" height="22px" alt="..." />`
let this_location = $('#thislocation').val();
let reader = new FileReader();

reader.onload = (e) => {
    $(".item_preview").attr('src', e.target.result);
}


/**
 * Datatables Initialization
 * **/
$(document).ready(function () {
    $('body').overlayScrollbars({ });

    $('#employees').DataTable({
        dom: 'Bfrtip',
        processing: true,
        serverSide: true,
        searching: false,
        pageLength: 10,
        ajax: {
            url: "controllers/datatables/employees.php",
            type: "POST"
        },
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend: 'pageLength',
                className: 'btn btn-sm bg-gradient-navy text-white'
            },
            {
                extend: 'copy',
                className: 'btn btn-sm bg-gradient-navy text-white'
            },
            {
                extend: 'excel',
                className: 'btn btn-sm bg-gradient-navy text-white',
                footer: true
            },
            {
                extend: 'pdf',
                className: 'btn btn-sm bg-gradient-navy text-white',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-sm bg-gradient-navy text-white',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'colvis',
                className: 'btn btn-sm bg-gradient-navy text-white'
            }
        ],
        columnDefs: [
            {
                targets: [],
                visible: false,
            },
            {
                render: function (data, type, row) {
                    let rowID = row[8];
                    return `<a href="details/staff/${rowID}"><i class="fa fa-eye"'></i></a>`
                },
                targets: 8
            }
        ]
    });
    $('#customers').DataTable({
        dom: 'Bfrtip',
        processing: true,
        serverSide: true,
        searching: true,
        pageLength: 10,
        ajax: {
            url: "controllers/datatables/customers.php",
            type: "POST"
        },
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend: 'pageLength',
                className: 'btn btn-sm bg-gradient-navy text-white'
            },
            {
                extend: 'copy',
                className: 'btn btn-sm bg-gradient-navy text-white'
            },
            {
                extend: 'excel',
                className: 'btn btn-sm bg-gradient-navy text-white',
                footer: true
            },
            {
                extend: 'pdf',
                className: 'btn btn-sm bg-gradient-navy text-white',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-sm bg-gradient-navy text-white',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'colvis',
                className: 'btn btn-sm bg-gradient-navy text-white'
            }
        ],
        columnDefs: [
            {
                targets: [],
                visible: false,
            },
            {
                render: function (data, type, row) {
                    let rowID = row[9];
                    return `<a href="details/customer/${rowID}"><i class="fa fa-eye"'></i></a>`
                },
                targets: 9
            }
        ]
    });
    $('#products').DataTable({
        dom: 'Bfrtip',
        processing: true,
        serverSide: true,
        searching: true,
        pageLength: 10,
        ajax: {
            url: "controllers/datatables/products.php",
            type: "POST"
        },
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend: 'pageLength',
                className: 'btn btn-sm bg-gradient-navy text-white'
            },
            {
                extend: 'copy',
                className: 'btn btn-sm bg-gradient-navy text-white'
            },
            {
                extend: 'excel',
                className: 'btn btn-sm bg-gradient-navy text-white',
                footer: true
            },
            {
                extend: 'pdf',
                className: 'btn btn-sm bg-gradient-navy text-white',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-sm bg-gradient-navy text-white',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'colvis',
                className: 'btn btn-sm bg-gradient-navy text-white'
            }
        ],
        columnDefs: [
            {
                targets: [],
                visible: false,
            },
            {
                render: function (data, type, row) {
                    let rowID = row[6];
                    return `<a href="details/product/${rowID}"><i class="fa fa-eye"'></i></a>`
                },
                targets: 6
            }
        ]
    });
    $('#category').DataTable({
        dom: 'Bfrtip',
        processing: true,
        serverSide: true,
        searching: true,
        pageLength: 10,
        ajax: {
            url: "controllers/datatables/categories.php",
            type: "POST"
        },
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend: 'pageLength',
                className: 'btn btn-sm bg-gradient-navy text-white'
            },
            {
                extend: 'copy',
                className: 'btn btn-sm bg-gradient-navy text-white'
            },
            {
                extend: 'excel',
                className: 'btn btn-sm bg-gradient-navy text-white',
                footer: true
            },
            {
                extend: 'pdf',
                className: 'btn btn-sm bg-gradient-navy text-white',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-sm bg-gradient-navy text-white',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'colvis',
                className: 'btn btn-sm bg-gradient-navy text-white'
            }
        ],
        columnDefs: [
            {
                targets: [],
                visible: false,
            },
            {
                render: function (data, type, row) {
                    let rowID = row[4];
                    return `<a href="details/category/${rowID}"><i class="fa fa-eye"'></i></a>`
                },
                targets: 4
            }
        ]
    });
})


/**
 * Custom Functions
 **/
let test_js = () => {alert('Js Is FiNe')}

let redirect = (url) => window.location = url

let reload = () => location.reload()

let db_post = (action_page, params, feedback_type='persistent', feedback_area='.feedback_area', processing_area = '.processing', processing_message=' Processing') => {
    $.ajax({
        method: 'POST',
        url: action_page,
        data: params,
        beforeSend:  () => {
            $(processing_area).html(ico + processing_message);
            $(processing_area).show();
        },
        success:  (response) => {
            if(feedback_type === 'persistent')
                $(feedback_area).html(response)
            else if(feedback_type === 'popup'){
                $(feedback_area).html(response)
                setTimeout(function(){
                    $(feedback_area).text('')
                }, 5000);
            }else
                $(feedback_area).html(response)
            $(processing_area).show()
        },
        complete: () => {$(processing_area).hide();},
        error: () => {
            $(feedback_area).html('Oops! Something went wrong...');
            $(processing_area).show();
        }
    })
}

let db_post_2 = (action_page, params, feedback_type='persistent', feedback_area='.feedback_area', processing_area = '.processing', processing_message=' Processing') => {
    $.ajax({
        method: 'POST',
        url: action_page,
        data: params,
        processData: false,
        contentType: false,
        beforeSend:  () => {
            $(processing_area).html(ico + processing_message);
            $(processing_area).show();
        },
        success:  (response) => {
            if(feedback_type === 'persistent')
                $(feedback_area).html(response)
            else if(feedback_type === 'popup'){
                $(feedback_area).html(response)
                setTimeout(function(){
                    $(feedback_area).text('')
                }, 5000);
            }else
                $(feedback_area).html(response)
            $(processing_area).show()
        },
        complete: () => {$(processing_area).hide();},
        error: () => {
            $(feedback_area).html('Oops! Something went wrong...');
            $(processing_area).show();
        }
    })
}

let cart_post = (action_page, params, feedback_area='#cart_items') => {
    $.ajax({
        method: 'POST',
        url: action_page,
        data: params,
        success:  (response) => {
            $(feedback_area).html(response)
        },
        error: () => {
            $(feedback_area).html('Oops! Something went wrong...');
        }
    })
}

let cart_action = (action, product_id) => {
    let params = "";
    if(action !== ""){
        switch(action){
            case "add":
                params = `action=${action}&product_id=${product_id}&quantity=1`;
                break;
            case "minus":
                params = `action=${action}&product_id=${product_id}&quantity=1`;
                break;
            case "add_customer":
                params = `action=${action}&customer_id=${product_id}`;
                break;
            case "remove":
                params = `action=${action}&product_id=${product_id}`;
                break;
            case "remove_customer":
                params = `action=${action}&customer_id=${product_id}`;
                break;
            case "empty":
                params = `action=${action}`;
                break;
        }
    }
    console.log(params);
    cart_post('controllers/cart/handler.php',params,"#cart-items");
}

let search_post = (action_page, params, feedback_area='.results', processing_area = '.results', processing_message=' Searching') => {
    $.ajax({
        method: 'POST',
        url: action_page,
        data: params,
        beforeSend:  () => {
            $(processing_area).html(ico + processing_message);
            $(processing_area).show();
        },
        success:  (response) => {
            $(feedback_area).html(response)
            $(processing_area).show()
        },
        complete: () => {},
        error: () => {
            $(feedback_area).html('Oops! Something went wrong...');
            $(processing_area).show();
        }
    })
}

let create_order = () => {
    let params = "create=1";
    db_post('controllers/cart/create_order.php',params)
}

let get_order = (order_id) => {
    let params = `order_id=${order_id}`;
    db_post('controllers/cart/get_order.php', params)
}
/**
 * Event Listeners & Handlers
 **/
$('.login').on('click', function () {
    let user_name = $("#username").val();
    let pass = $("#password").val();
    let params = "username="+user_name+"&password="+pass;
    console.log(params);
    db_post('controllers/action/login-process.php',params);
})

/*==================================================================
[ Show modal1 ]*/
$('.js-show-modal1').on('click',function(){
    $('.js-modal1').addClass('show-modal1');
    let params = "s=1";
    cart_post('controllers/cart/set_order.php',params, '.set_details')
});

$('.js-hide-modal1').on('click',function(){
    $('.js-modal1').removeClass('show-modal1');
    let params = "s=2";
    cart_post('controllers/cart/set_order.php',params, '.set_details')
});



$('.save_staff').on('click', function(e){
    e.stopPropagation();
    let first_name = $('#first_name').val();
    let last_name = $('#last_name').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let user_name = $("#user_name").val();
    let user_group = $("#user_group").val();
    let section = $("#section").val();
    let status = $("#status").val();
    let params = `first_name=${first_name}&last_name=${last_name}&email=${email}&phone=${phone}&user_name=${user_name}&user_group=${user_group}&section=${section}&status=${status}`;
    console.log(params);
    db_post('controllers/action/save_staff.php', params);
})

$('.save_customer').on('click', function(e){
    e.stopPropagation();
    let first_name = $('#first_name').val();
    let second_name = $('#second_name').val();
    let last_name = $('#last_name').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let section = $("#section").val();
    let status = $("#status").val();
    let params = `first_name=${first_name}&second_name=${second_name}&last_name=${last_name}&email=${email}&phone=${phone}&section=${section}&status=${status}`;
    console.log(params);
    db_post('controllers/action/save_customer.php', params);
})

$('.save_category').on('click', function (e) {
    e.stopPropagation();
    let category_name = $('#category_name').val();
    let status = $('#status').val();
    let params = `category_name=${category_name}&status=${status}`;
    console.log(params);
    db_post('controllers/action/save_category.php', params);
})

$("#item_image").on('change', function(){
    if(this.files && this.files[0]){
        reader.readAsDataURL(this.files[0]);
    }
    $('#preview').attr('style','');
})

$(".save_product").on('click', function(){
    let item_name = $("#item_name").val();
    let item_price = $("#item_price").val();
    let item_description = $("#item_description").val();
    let item_image = $('#item_image').prop('files')[0];
    let item_category = $("#item_category").val();
    let status = $("#status").val();
    let form_data = new FormData();
    form_data.append('item_name',item_name)
    form_data.append('item_price',item_price)
    form_data.append('item_description',item_description)
    form_data.append('item_image',item_image)
    form_data.append('item_category',item_category)
    form_data.append('status',status)
    console.log(form_data);
    db_post_2('controllers/action/save_product.php', form_data);
})

$(".import_products").on("click", function(e){
    let label_ = 1;
    let excel_file = $('#excel_file').prop('files')[0];
    if(excel_file !== undefined){
        let form_data = new FormData();
        form_data.append('label_', label_.toString());
        form_data.append('excel_file', excel_file);
        db_post_2('controllers/action/import_products.php',form_data,'persistent','.feedback_area_','.processing_');
    }
})

$(".import_customers").on("click", function(e){
    let label_ = 1;
    let excel_file = $('#excel_file').prop('files')[0];
    if(excel_file !== undefined){
        let form_data = new FormData();
        form_data.append('label_', label_.toString());
        form_data.append('excel_file', excel_file);
        db_post_2('controllers/action/import_customers.php',form_data,'persistent','.feedback_area_','.processing_');
    }
})

$("#cart_search_customer").bind('keyup click', function(e){
    let search_str = $(this).val();
    if(search_str.length > 3){
        let search = `search=${search_str}`;
        console.log(search);
        $(".results").show();
        $(".results").attr('style','');
        search_post('controllers/search/cart_search.php', search,'.results','.results')
    }
})
$(document).click(function(){
    $('.results').hide();
});

$(".search_link").on("click", function(){
    let customer_id = $(this).attr('cid');
    console.log(customer_id);
})
