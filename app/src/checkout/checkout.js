
function confirmCheckout() {
    // $('#btn-confirm').css('visibility', 'hidden')
    // $('#virtual-acc-num').val('3333 4444 5555 6666')
    var dict = {
        payment_id: $('#agen-bank').val(),
        gross_amount: (($('#gross_amount').html()).split(' ')[1]).replaceAll('.',''),
        order_id: 'order-' + Math.floor(Date.now() * Math.random())
    };

    fetch('https://hitech-payment.nafishandoko.repl.co/payment', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
        },
        crossDomain:true,
        body: JSON.stringify(dict),
    })
    .then(response => response.json())
    .then(resp => {
        console.log('Success:', resp);
        var order_data = {
            amount: (($('#gross_amount').html()).split(' ')[1]).replaceAll('.',''),
            order_id: resp.data.order_id,
            payment_details: {
                payment_id: $('#agen-bank').val(),
                payment_code: resp.data.payment_code || '',
                va_number: resp.data.va_numbers === undefined ? '' : resp.data.va_numbers[0].va_number
            },
            shipper_id: $('#shipper_id').val(),
            cart_id: "3"
        }
        fetch('http://127.0.0.1:3000/order', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
            },
            crossDomain:true,
            body: JSON.stringify(order_data),
        })
        .then(response => response.json())
        .then(resp => {
            console.log('Success:', resp);
            alert(resp.message+"\nPayment Code/VA Number: "+(resp.data.payment_details.payment_code||resp.data.payment_details.va_number)+"\nJumlah Tagihan: "+resp.data.amount)
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}