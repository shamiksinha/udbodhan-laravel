<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Model\PaymentRequest::class,10)->create()->each(function($paymentRequest){
		  $groupId=$paymentRequest->group_id;
		  $userId=$paymentRequest->user_id;
		  $userEmail=$paymentRequest->user_email;
		  $udbBookGroup=UdbBookGroup::where('group_id','=',$groupId)->with('startBook')->with('endBook')->firstOrFail();
		  $startBook=$udbBookGroup->startBook->book_id;
		  $endBook=$udbBookGroup->endBook->book_id;
		  $udbBooksSubscribedTo=UdbBookDetail::where('deleted_at','=',null)->where('book_id','>=',$startBook)->where('book_id','<=',$endBook)->get();
		  foreach ($udbBooksSubscribedTo as $key=>$udbBookSubscribedTo){
					$userBook=new UserBook();
					$userBook->user_id=$userId;
					$userBook->user_email=$userEmail;
					Log::info($udbBookSubscribedTo);
					$userBook->book_id=$udbBookSubscribedTo->book_id;
					$userBook->book_name=$udbBookSubscribedTo->book_name;
					$userBook->book_month=$udbBookSubscribedTo->book_month;
					$userBook->book_year=$udbBookSubscribedTo->book_year;
					$userBook->book_number=$udbBookSubscribedTo->book_number;
					$userBook->save();
		}
		UserGroup::create([
					'user_id'=>$userId,
					'user_email'=>$userEmail,
					'group_id'=>$groupId,
					'books_in_group'=>$udbBookGroup->books_in_group,
					'start_book_id'=>$startBook,
					'end_book_id'=>$endBook,
				]);
	  });
	 
    }
}
