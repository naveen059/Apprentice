@extends('layouts.admin')

@section('content')

<div class="container px-1">
    <div class="flex justify-center">
        <div class="w-full lg:w-5/6">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-200 text-gray-700 uppercase text-lg font-bold p-4">Enquiries</div>

                <div class="p-4">
                    @if($inquiries->isEmpty())
                        <p class="text-gray-600">No inquiries found.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-2">Student</th>
                                        <th class="px-4 py-2">Parent's name</th>
                                        <th class="px-4 py-2">Subject</th>
                                        <th class="px-4 py-2">Description</th>
                                        <th class="px-4 py-2">Date</th>
                                        <th class="px-4 py-2" colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-gray-700 dark:text-gray-400">
                                    @foreach($inquiries as $inquiry)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="border px-4 py-2">
                                                <div class="text-slate-800">
                                                    <div class="font-semibold tracking-tight">{{ $inquiry->name }}</div>
                                                    <div class="text-slate-400">{{ $inquiry->email }}</div>
                                                    <div class="text-slate-400">{{ $inquiry->contact_number }}</div>
                                                </div>
                                            </td>
                                            <td class="border px-4 py-2">{{ $inquiry->parent_name }}</td>
                                            <td class="border px-4 py-2">{{ $inquiry->subject }}</td>
                                            <td class="border px-4 py-2">{{ $inquiry->description }}</td>
                                            <td class="border px-4 py-2">{{ $inquiry->created_at->format('M d, Y') }}</td>
                                            <td class="border px-4 py-2" id="editButton{{ $inquiry->id }}">
                                                <form action="{{ route('admin.editInquiry', ['id' => $inquiry->id]) }}" method="GET" class="inline-block">
                                                    @csrf
                                                    <button type="submit" class="text-blue-600 font-bold rounded-md edit-button">Edit</button>
                                                </form>
                                            </td>
                                            <td class="border px-4 py-2">
                                                <form action="{{ route('admin.delete.inquiry', ['id' => $inquiry->id]) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <button type="submit" class="text-red-600 font-bold" onclick="return confirm('Are you sure you want to delete this inquiry?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
