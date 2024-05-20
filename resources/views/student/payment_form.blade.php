@extends('layouts.student')

@section('content')


<div class="w-3/4 mx-auto mt-8">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Make Payment</h2>
            
            <form id="payment-form" action="{{ route('student.makePayment') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount:</label>
                    <input type="number" name="amount" id="amount" class="form-input mt-1 block w-full rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="course_id" class="block text-sm font-medium text-gray-700">Select Course:</label>
                    <select name="course_id" id="course_id_select" class="form-select mt-1 block w-full rounded-md shadow-sm">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="is_partial" id="is_partial" value="">
                <input type="hidden" name="payment_type" id="payment_type" value="full">

                <div class="mb-4">
                    <label class="block text-gray-700">Payment Type:</label>
                    <div class="flex items-center">
                        <button type="button" id="full-payment-btn" class="py-2 px-4 rounded-l-full bg-blue-500 text-white" data-is-partial="0">Full</button>
                        <button type="button" id="partial-payment-btn" class="py-2 px-4 rounded-r-full bg-gray-200 text-gray-700" data-is-partial="1">Partial</button>
                    </div>
                </div>


                <div class="mb-4">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method:</label>
                    <select name="payment_method" id="payment_method" class="form-select mt-1 block w-full rounded-md shadow-sm">
                        <option value="upi">UPI</option>
                        <option value="cash">Cash</option>
                        <option value="net_banking">Net Banking</option>
                    </select>
                </div>

                <div class="mb-4 payment-fields" id="payment_fields_upi" style="display: none;">
                    <label for="upi_id" class="block text-sm font-medium text-gray-700">UPI ID:</label>
                    <input type="text" name="upi_id" id="upi_id" class="form-input mt-1 block w-full rounded-md shadow-sm">
                </div>

                <div class="mb-4 payment-fields" id="payment_fields_cash" style="display: none;">
                    <label for="cash_receipt_number" class="block text-sm font-medium text-gray-700">Cash Receipt Number:</label>
                    <input type="text" name="cash_receipt_number" id="cash_receipt_number" class="form-input mt-1 block w-full rounded-md shadow-sm">
                </div>

                <div class="mb-4 payment-fields" id="payment_fields_net_banking" style="display: none;">
                    <label for="bank_name" class="block text-sm font-medium text-gray-700">Bank Name:</label>
                    <input type="text" name="bank_name" id="bank_name" class="form-input mt-1 block w-full rounded-md shadow-sm">
                </div>




                <div class="mb-4">
                    <label for="transaction_type" class="block text-sm font-medium text-gray-700">Transaction Type:</label>
                    <select name="transaction_type" id="transaction_type" class="form-select mt-1 block w-full rounded-md shadow-sm">
                        <option value="purchase">Purchase Course</option>
                        <option value="exam">Exam Fee</option>
                        <option value="tuition">Tuition Fee</option>
                        <option value="uniform">Uniform Fee</option>
                        <option value="transport">Transportation Fee</option>
                        <option value="stationery">Stationery Purchase</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                    <input type="text" name="description" id="description" class="form-input mt-1 block w-full rounded-md shadow-sm">
                </div>


                <button type="submit" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Pay Now</button>
            </form>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>


    document.addEventListener('DOMContentLoaded', function() {
    const fullPaymentBtn = document.getElementById('full-payment-btn');
    const partialPaymentBtn = document.getElementById('partial-payment-btn');
    const paymentFields = document.querySelectorAll('.payment-fields');
    const isPartialInput = document.getElementById('is_partial');

    function togglePaymentType(paymentType) {
        fullPaymentBtn.classList.toggle('bg-blue-500', paymentType === 'full');
        fullPaymentBtn.classList.toggle('text-white', paymentType === 'full');
        partialPaymentBtn.classList.toggle('bg-gray-500', paymentType === 'partial');
        partialPaymentBtn.classList.toggle('text-white', paymentType === 'partial');

        paymentFields.forEach(function(field) {
            field.style.display = field.id === `${paymentType}_fields` ? 'block' : 'none';
        });

        document.getElementById('payment_type').value = paymentType;
        isPartialInput.value = paymentType === 'partial';
        console.log('Payment Type:', paymentType);
        console.log('Is Partial:', paymentType === 'partial');
    }

    fullPaymentBtn.addEventListener('click', function() {
        togglePaymentType('full');
        isPartialInput.value = '0';
    });

    partialPaymentBtn.addEventListener('click', function() {
        togglePaymentType('partial');
        isPartialInput.value = '1';
    });

    const initialPaymentType = document.getElementById('payment_type').value;
    togglePaymentType(initialPaymentType);

    const paymentMethodSelect = document.getElementById('payment_method');

    function togglePaymentFields(paymentMethod) {
        paymentFields.forEach(function(field) {
            field.classList.toggle('hidden', !field.classList.contains(paymentMethod));
        });
    }

    paymentMethodSelect.addEventListener('change', function() {
        const selectedPaymentMethod = paymentMethodSelect.value;
        togglePaymentFields(selectedPaymentMethod);
    });

    const initialPaymentMethod = paymentMethodSelect.value;
    togglePaymentFields(initialPaymentMethod);


    document.getElementById('payment_method').addEventListener('change', function() {
        const selectedPaymentMethod = this.value;
        console.log('Selected Payment Method:', selectedPaymentMethod);

        const paymentFields = document.querySelectorAll('.payment-fields');
        console.log('All Payment Fields:', paymentFields);

        paymentFields.forEach(function(field) {
            console.log('Current Payment Field:', field.id);
            if (field.id === `payment_fields_${selectedPaymentMethod}`) {
                console.log('Displaying:', field.id);
                field.style.display = 'block';
            } else {
                console.log('Hiding:', field.id);
                field.style.display = 'none';
            }
        });
    });
});








</script>

@endsection
