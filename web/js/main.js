/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});


    //ajax
    var xhr = new XMLHttpRequest();

	function addProductIntroModal(url) {


        xhr.open('GET', url);

        xhr.send();


        xhr.onload = function() {
            if (xhr.status != 200) { // analyze HTTP status of the response
                console.log(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
            } else { // show the result
                console.log(`Done, got ${xhr.response.length} bytes`); // responseText is the server\

                var obj = JSON.parse(xhr.responseText);


                var parentProducts = document.getElementById('modalProducts');
                var tmpl = document.getElementById('modalProductsTemplate').content.cloneNode(true);

                tmpl.querySelector('img').setAttribute('src', obj[0]['img']);
                tmpl.querySelector('.title').innerText += obj[0]['title'];

                document.getElementById('count')
                tmpl.querySelector('.price').innerText += obj[0]['price'];
                tmpl.querySelector('.count').innerText += document.getElementById('count').value;

                tmpl.querySelector('.deleteProduct').href += '&prod_id=' + obj[0]['id'];


                parentProducts.appendChild(tmpl);

                delBtnInit();
            }
        };



    }


    //add product
    var addCartBtn = document.querySelectorAll('.add-to-cart');
    if(addCartBtn) {

        addCartBtn.forEach(function(v,i) {
            v.addEventListener('click', function (e) {
                e.preventDefault();
                var ajaxUrl = e.target.getAttribute('href')
                var productIdLink = e.target.getAttribute('product-id-link')

				var form = document.getElementById('addToCartForm')
				if(form) {
                    //clear status block
                    form.querySelector('#status').innerHTML = '';

                	//add +- functionality
					form.querySelector('#decrement').addEventListener('click', function(){
						if(form.querySelector('#count').value > 1) {
                            form.querySelector('#count').value --
						}
					})
                    form.querySelector('#increment').addEventListener('click', function(){
                        form.querySelector('#count').value ++
                    })

                    //add to cart
                    form.querySelector('#submit').addEventListener('click', function (e) {
                        e.preventDefault();


                        ajaxUrl = ajaxUrl + "&count=" + form.querySelector('#count').value;

                        console.log(ajaxUrl)

                        xhr.open('GET', ajaxUrl);

                        xhr.send();

                        xhr.onload = function() {
                            if (xhr.status != 200) { // analyze HTTP status of the response
                                console.log(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
                            } else { // show the result
                                console.log(`Done, got ${xhr.response.length} bytes`); // responseText is the server\
                                var url = e.target.getAttribute('ajax-get-prodct')+ '&id=' + productIdLink;
                                addProductIntroModal(url);
                            }
                        };

                        xhr.onprogress = function(event) {
                            if (event.lengthComputable) {
                                console.log(`Received ${event.loaded} of ${event.total} bytes`);
                            } else {
                                console.log(`Received ${event.loaded} bytes`); // no Content-Length
                            }
                        };

                        xhr.onerror = function() {
                            alert("Request failed");
                        };

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 3) {

                            }
                            if (xhr.readyState == 4) {
                                // request finished
                                form.querySelector('#status').innerHTML = xhr.status != 200 ? "Error" : "done";
                            }
                        };
                    })

				}


                $('#addToCartAjax').modal('show')
            })
		});
	};


    function delBtnInit() {
        //delete product
        var delProduct = document.querySelectorAll('.deleteProduct');
        if (delProduct) {
            delProduct.forEach(function (v, i) {
                v.addEventListener('click', function (e) {
                    e.preventDefault();
                    var ajaxUrl = v.getAttribute('href')


                    console.log(ajaxUrl)

                    xhr.open('GET', ajaxUrl);

                    xhr.send();

                    xhr.onload = function () {
                        if (xhr.status != 200) { // analyze HTTP status of the response
                            console.log(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
                        } else { // show the result
                            console.log(`Done, got ${xhr.response.length} bytes`); // responseText is the server
                            if (document.querySelector('[product-id-container="' + v.getAttribute('id-product') + '"]')) {
                                document.querySelector('[product-id-container="' + v.getAttribute('id-product') + '"]').remove()
                            }
                        }
                    };

                })
            });
        }
        ;
    }


    delBtnInit()







    // quick view modal AJAX

   $('.quickView').click(function (e) {
       'use strict';
       e.preventDefault()

       console.log(e)



        let ajaxUrl = document.getElementById('ajaxProductInfo');
        let idProduct = e.target.getAttribute('product-id');


       document.querySelector('#productsContent .add-to-cart').setAttribute('product-id-link', idProduct)


        console.log(idProduct)
        if(ajaxUrl) {

            let xhr = new XMLHttpRequest();
            ajaxUrl = ajaxUrl.value + '&id=' + idProduct;

           xhr.open('GET', ajaxUrl);
           xhr.send();

            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let returnedItem = JSON.parse(this.responseText)[0];
                    document.getElementById('ajaxTitle').innerHTML = returnedItem.title
                    document.getElementById('ajaxImg').setAttribute('src', returnedItem.img)
                    document.getElementById('ajaxDscpr').innerHTML = returnedItem.description
                    document.getElementById('ajaxPrice').innerHTML = returnedItem.price +="$"

                    $('#quickView').modal('show')
                    console.log(xhr.responseText)

                }
            };
        };
    }); //click


    $('#quickView').on('hidden.bs.modal', function (e) {
        document.getElementById('ajaxTitle').innerHTML = ''
        document.getElementById('ajaxImg').setAttribute('src', '')
        document.getElementById('ajaxDscpr').innerHTML = ''
        document.getElementById('ajaxPrice').innerHTML = ''

    })


    $('.closeAllModal').click(function () {
        $('#quickView').modal('hide')
    })
	
	
});
