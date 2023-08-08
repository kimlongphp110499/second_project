<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stepanenko3\LaravelPagination\Pagination;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Lấy dữ liệu từ database hoặc bất kỳ nguồn nào khác
        $data = User::get();
    
        // Sử dụng lớp Pagination để phân trang dữ liệu
        $perPage = 10; // Số mục hiển thị trên mỗi trang
        $currentPage = request('page', 1); // Trang hiện tại, mặc định là 1
    
        $events = new Pagination($data, $perPage, 2, 10);
    
        // Lấy dữ liệu phân trang cho trang hiện tại
        $paginatedData = $events->getCollection();
    
        // Lấy các thông tin phân trang khác
        $total = $events->total();
        $lastPage = $events->lastPage();
        
        // ... Các thông tin khác
        // Trả về view với dữ liệu đã phân trang
        return view('welcome', compact('events', 'paginatedData', 'total', 'lastPage'));
    }
//     public function index()
// {   $paginatedData =
//     new Pagination(
//         User::paginate(10),
//         User::count(),
//         10,
//         1,
//     );
//     dd($paginatedData->data());
//     return view('welcome', compact('paginatedData'));
// }
}
