<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Shop;
use App\Models\Book;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;

class NotifyBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:NotifyBook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約お知らせ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $from = Carbon::today();
        $to = Carbon::tomorrow();

        $book_times = Book::select('book_date','book_time','email','users.name as user_name','shops.name as shop_name')
                        ->join('users','books.user_id','=','users.id')
                        ->join('shops','books.shop_id','=','shops.id')
                        ->where('book_date', '>=', $from)
                        ->where('book_date', '<', $to)
                        ->get();

        foreach($book_times as $book_time){
            Mail::to($book_time->email)->send(new NotifyMail($book_time));
        }
    }
}
