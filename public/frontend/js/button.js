$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.addToCartBtn').click(function(e){
            e.preventDefault();

                var user_id = $(this).closest('.product_data').find('.user_id').val();
                var prod_id = $(this).closest('.product_data').find('.prod_id').val();
                var seller_id = $(this).closest('.product_data').find('.seller_id').val();
                var prod_qty = $(this).closest('.product_data').find('.qty-input').val();

                $.ajax({
                    method:"POST",
                    url: "/add-cart",
                    data: {
                        'user_id': user_id,
                        'prod_id' : prod_id,
                        'seller_id' : seller_id,
                        'prod_qty' : prod_qty,
                    },
                    success: function(response){
                        swal(response.status);
                        loadcart();
                    }
                });
            });
});
