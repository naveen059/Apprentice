@extends('layouts.admin')

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full lg:w-4/5">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-800 text-white uppercase text-lg font-bold p-4">Student Payments</div>
                <div class="p-6">
                    @if($payments->isEmpty())
                        <p class="text-gray-600">No student payments found.</p>
                    @else
                        <ul class="divide-y divide-gray-300">
                            @foreach($payments as $payment)
                                <li class="py-6 flex flex-col lg:flex-row items-start lg:items-center justify-between bg-gray-50 hover:bg-gray-100 rounded-lg p-4">
                                    <div class="flex-1">
                                        <div class="mb-2">
                                            <span class="font-semibold">Student Name:</span> {{ $payment->student->name }}
                                        </div>
                                        <div class="mb-2">
                                            <span class="font-semibold">Course:</span> {{ $payment->course->name }}
                                        </div>
                                        <div class="mb-2">
                                            <span class="font-semibold">Amount:</span> ${{ number_format($payment->amount, 2) }}
                                        </div>
                                        <div class="mb-2">
                                            <span class="font-semibold">Payment Method:</span> {{ ucfirst($payment->payment_method) }}
                                        </div>
                                        <div>
                                            @if($payment->is_partial)
                                                <span class="inline-block bg-yellow-500 text-white text-sm font-semibold px-2 py-1 rounded-full">Partial Payment</span>
                                            @else
                                                <span class="inline-block bg-green-500 text-white text-sm font-semibold px-2 py-1 rounded-full">Full Payment</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center mt-4 lg:mt-0 space-x-4">
                                        @if($payment->payment_status === 'pending')
                                            <form action="{{ route('admin.payments.updateStatus', $payment->id) }}" method="POST" class="flex items-center space-x-2">
                                                @csrf
                                                @method('PATCH')
                                                <select name="payment_status" class="form-select w-full rounded-md shadow-sm">
                                                    <option value="pending" {{ $payment->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="approved" {{ $payment->payment_status === 'approved' ? 'selected' : '' }}>Approved</option>
                                                    <option value="rejected" {{ $payment->payment_status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                </select>
                                                <button type="submit" class="bg-blue-500 text-white rounded-md py-1 px-2 hover:bg-blue-600">Update</button>
                                            </form>
                                        @else
                                            <span class="text-green-600">{{ ucfirst($payment->payment_status) }}</span>
                                        @endif
                                        @if(!$payment->is_approved)
                                            <form action="{{ route('admin.payments.approve', $payment->id) }}" method="POST" class="mr-4">
                                                @csrf
                                                <button type="submit" class="bg-blue-500 text-white rounded-md py-1 px-2 hover:bg-blue-600">Approve</button>
                                            </form>
                                            <form action="{{ route('admin.students.enableAccess', $payment->student->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-green-500 text-white rounded-md py-1 px-2 hover:bg-green-600">Grant Access</button>
                                            </form>
                                        @else
                                            <span class="text-gray-600 mx-3">Access granted</span>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
