import './bootstrap';


let paymentBtn = document.getElementById('paymentBtn');

paymentBtn.onclick = (e) => payWithPaystack(e);
function payWithPaystack(e) {
    e.preventDefault();

    let handler = PaystackPop.setup({
        key: 'pk_test_57104082aaa74faf3153e0fd92cf8d2e4705b31b',
        email: 'baba@test.com',
        amount: 1000 * 100,
        currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
        ref: 'DFY-' + Math.random(), // Replace with a reference you generated
        callback: function(response) {
            //this happens after the payment is completed successfully
            var reference = response.reference;
            console.log('Payment complete! Reference: ' + reference, reference.amount);
            // Make an AJAX call to your server with the reference to verify the transaction
        },
        onClose: function() {
            alert('Transaction was not completed, window closed.');
        },
    });

    handler.openIframe();
}
