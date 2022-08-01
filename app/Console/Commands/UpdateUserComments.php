<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:comments 
                                {id: The ID of the user} 
                                {comments: The new user comment}';

    /**
     * The console command description. 
     *
     * @var string
     */
    protected $description = 'Command to update user comments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Retrieve all arguments
        $id = $this->arguments()["id: The ID of the user"];
        $comments = $this->arguments()["comments: The new user comment"];
        
        // Validate arguments
        $validator = Validator::make(['id' => $id, 'comments' => $comments], [
            'id' => 'required|integer|exists:users,id',
            'comments' => 'required'
        ]);

        if($validator->fails()){
            $this->error('Something went wrong!');
            print_r($validator->errors());
            return 1;
        }

        $user = User::find($validator->validated()['id']);
        
        $user->updateOrFail([
            'comments' => $user->comments != '' ? $user->comments . '\n' . $validator->validated()['comments'] : $validator->validated()['comments']
        ]);

        $this->info('User comments updated sucessfully!');
        print_r($user);
        
        return 0;
    }
}
