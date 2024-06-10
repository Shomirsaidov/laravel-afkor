@extends('layout.app')

@section('page-title') Оформление заказа @endsection

@section('content')
    <div class="orderStep1">
        <div class="my-8 font-bold">
            <h1 class="text-xl">Корзина</h1>
        </div>

        <!-- Container to display the products -->
        <div id="products-container"></div>

        <!-- Container to display the total price -->
        <h1 id="total-price" class="text-2xl my-4"></h1>

        <div class="mt-6">
            <button type="submit" class="my-4 next w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Далее
            </button>
        </div>


    </div>

    <div class="orderStep2 hidden">
        <div class="my-8 font-bold">
            <h1 class="text-xl">Ваши данные</h1>
        </div>

        
            
            <!-- Section -->
            <div class="mb-4">
                <label for="section" class="block text-sm font-medium text-gray-700">ФИО</label>
                <input type="text" name="name" id="section" class="name mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Адрес</label>
                <input type="text" name="address" id="type" class="address mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <!-- Brand -->
            <div class="mb-4">
                <label for="brand" class="block text-sm font-medium text-gray-700">Телефон</label>
                <input type="text" name="tel" id="brand" class="tel mt-1 border-2 outline-none p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>



            <!-- Submit Button -->
            <div class="mt-6">
                <button id="makeOrder" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Заказать
                </button>
            </div>



    </div>

    <script src="/js/jquery.js"></script>
    <script>
        let order;

        $(document).ready(function() {
            // Assuming products_list is an array of product IDs stored in localStorage
            var products_list = JSON.parse(localStorage.getItem('sewingTJ'));

            $.ajax({
                url: '{{ route('basket') }}',
                type: 'POST',
                data: {
                    products: products_list,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Clear the container
                    $('#products-container').empty();
                    var totalPrice = 0;

                    // Check if there are any products in the response
                    if (response.length > 0) {
                        // Iterate over each product and append to the container
                        $.each(response, function(index, product) {
                            // Initialize the quantity property for each product
                            product.quantity = 1;
                            
                            var productHtml = '<div class="product border-2 p-2 my-4" data-product-id="' + product.id + '">' +
                                              '<h2>' + product.name + '</h2>' +
                                              '<img src="' + JSON.parse(product.images)[0] + '" width="100">' +
                                              '<p>Price: <span class="product-price">' + product.price + '</span></p>' +
                                              '<div class="quantity-controls">' +
                                                  '<button class="decrease-quantity">-</button>' +
                                                  '<span class="product-quantity">1</span>' +
                                                  '<button class="increase-quantity">+</button>' +
                                              '</div>' +
                                              '</div>';
                            $('#products-container').append(productHtml);
                            totalPrice += parseFloat(product.price);
                        });

                        order = {
                            total_price: totalPrice,
                            products: response
                        };

                        console.log(order);

                        // Update the total price
                        $('#total-price').text('Total Price: ' + totalPrice.toFixed(2));
                    } else {
                        // If no products, display a message
                        $('#products-container').append('<p>No products found.</p>');
                        $('#total-price').text('Total Price: 0.00');
                    }
                },
                error: function(xhr) {
                    $('#products-container').append('<p>Пока пусто.</p>');
                    $('#total-price').text('Total Price: 0.00');
                }
            });

            // Increase quantity event
            $(document).on('click', '.increase-quantity', function() {
                var productDiv = $(this).closest('.product');
                var productId = productDiv.data('product-id');
                var quantitySpan = productDiv.find('.product-quantity');
                var newQuantity = parseInt(quantitySpan.text()) + 1;
                quantitySpan.text(newQuantity);

                var price = parseFloat(productDiv.find('.product-price').text());
                updateTotalPrice(price);

                // Update the quantity in the order object
                updateProductQuantity(productId, newQuantity);
            });

            // Decrease quantity event
            $(document).on('click', '.decrease-quantity', function() {
                var productDiv = $(this).closest('.product');
                var productId = productDiv.data('product-id');
                var quantitySpan = productDiv.find('.product-quantity');
                var newQuantity = parseInt(quantitySpan.text()) - 1;

                if (newQuantity > 0) {
                    quantitySpan.text(newQuantity);

                    var price = parseFloat(productDiv.find('.product-price').text());
                    updateTotalPrice(-price);

                    // Update the quantity in the order object
                    updateProductQuantity(productId, newQuantity);
                }
            });

            function updateTotalPrice(amount) {
                var currentTotal = parseFloat($('#total-price').text().replace('Total Price: ', ''));
                var newTotal = currentTotal + amount;
                $('#total-price').text('Total Price: ' + newTotal.toFixed(2));

                order.total_price = newTotal;
                console.log(order);
            }

            function updateProductQuantity(productId, newQuantity) {
                // Find the product in the order object and update its quantity
                $.each(order.products, function(index, product) {
                    if (product.id === productId) {
                        product.quantity = newQuantity;
                        return false; // Break the loop
                    }
                });

                console.log(order);
            }



            $(document).on('click', '.next', function() {
                $('.orderStep2').show()
                $('.orderStep1').hide()
            })

            $(document).on('click', '#makeOrder', function() {

                let personal_data = {
                    name: $('.name').val(),
                    address: $('.address').val(),
                    tel: $('.tel').val()
                }

                order.personal_data = personal_data

                $.ajax({
                    url: '{{ route('order') }}',
                    type: 'POST',
                    data: {
                        data: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        localStorage.removeItem('sewingTJ')
                        location.href = '/thankyou'
                        console.log(response.message)
                    },
                    error: function(xhr) {
                        alert('Error occurred');
                        alert(xhr.responseJSON.message);
                    }
                });


                console.log(order)
                



            })

        });



    </script>
@endsection
