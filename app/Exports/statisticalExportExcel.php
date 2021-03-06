<?php

namespace App\Exports;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
class statisticalExportExcel implements FromCollection, WithHeadings
{
    use Exportable;
        private $transactions;
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }
    

    public function collection()
    {
        $transactions = $this->transactions;
        $formatTransactions = [];

        foreach ($transactions as $key => $item) {
            $formatTransactions[] = [
                'id'      => $item->id,
                'total'   => number_format($item->totalMoney,0,',','.'),
                'name'    => $item->tst_name,
                'email'   => $item->tst_email,
                'phone'   => $item->tst_phone,
                'address' => $item->tst_address,
                'status'  => $item->getStatus($item->tst_status)['name'],
                //'type'    => $item->tst_user_id ? "Thành viên" : "Khách",
                'create'  => $item->created_at
            ];
        }

        return collect($formatTransactions);
    }

    public function headings(): array
    {
        return [
            'Mã',
            'Tổng tiền',
            "Tên",
            'Email',
            'Số điện thoại',
            'Địa chỉ',
            'Trạng thái',
            //'Loại',
            'Ngày ',
        ];
    }
}
